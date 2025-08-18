<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;
use PhpOffice\PhpPresentation\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExceptionReportsController extends Controller
{
    public function exceptions_report(Request $request)
    {
        $assetTypes = $request->input('asset_type') ?? null;

        $types = [
            "control_critical_asset" => "Critical Controls",
            "control_cloud" => "Cloud Controls",
            "control_telework" => "Telework Controls",
            "control_social_media" => "PCI DSS Controls",
            "control_data_privicy" => "Data Privacy Controls",
            "control_pii" => "Data PII Controls",
            "control_pci_dss" => "PCI DSS Controls",
            "control_e_commerce" => "E-Commerce Controls",
            "control_infrastructure" => "Infrastructure Controls",
            "control_application" => "Application Controls",
            "control_hr" => "HR Controls",
            "control_physical_security" => "Physical Controls",
            "control_third_party" => "Third Party Controls",
            "control_operational" => "Operational Controls",
            "control_e_banking" => "E-banking Controls",
            "control_payment" => "Payment Asset"
        ];

        $report = DB::table('control_master_table AS c')
            ->distinct()
            ->join('control_master_table_vs_best_practice_table AS cv', 'c.control_id', '=', 'cv.control_id')
            ->join('best_practice_table AS bp', 'cv.best_practice_id', '=', 'bp.best_practices_id')
            ->leftJoin(DB::raw('(
            SELECT cad.control_id,
                   cad.control_implementation_status,
                   cad.remarks,
                   cad.corrective_action_due_date,
                   cad.corrective_action
            FROM control_assessment_details_table AS cad
            INNER JOIN (
                SELECT control_id, MAX(id) AS max_id
                FROM control_assessment_details_table
                GROUP BY control_id
            ) AS latest_assessment ON cad.control_id = latest_assessment.control_id
                                       AND cad.id = latest_assessment.max_id
            ) AS latest_cad'), 'c.control_id', '=', 'latest_cad.control_id')
            // Join with owner_table to get owner_name
            ->join('owner_table AS o', 'c.owner_id', '=', 'o.owner_role_id')
            // Join with risk_vs_control_table to get risk_id and risk_name
            ->join('risk_vs_control_table AS rvct', 'c.control_id', '=', 'rvct.control_id')
            // Join with risk_master_table to get risk_id and risk_name
            ->join('risk_master_table AS rm', 'rvct.risk_id', '=', 'rm.risk_id')
            // Join with risk_master_table_vs_custodian_role_table to link custodians
            ->join('control_master_table_vs_custodian_role_table AS cmvc', 'c.control_id', '=', 'cmvc.control_id')
            // Join with custodian_name_table to get custodian names
            ->join('custodian_name_table AS cnt', 'cmvc.custodian_id', '=', 'cnt.custodian_role_id')
            // Removed 'bp.best_practices_id' condition and replaced it with control implementation status check
            ->where(function ($query) {
                $query->whereNull('latest_cad.control_implementation_status')
                    ->orWhere('latest_cad.control_implementation_status', '=', 'Not Implemented');
            })


            ->when($assetTypes, function ($query, $assetTypes) {
                foreach ($assetTypes as $type) {
                    $query->where($type, "Yes");
                }
            })
            ->select(
                'c.id as cid',
                'c.control_id',
                'c.control_name',
                'bp.sort_order',  // Added sort_order to SELECT list to allow ordering
                DB::raw("COALESCE(latest_cad.control_implementation_status, 'Not Implemented') AS status"),
                'o.id as oid',
                'o.owner_name',
                'o.owner_id', // Adding owner_name to the SELECT list
                DB::raw("GROUP_CONCAT(DISTINCT CONCAT('<a href=\"/custodians/', cnt.id, '\">', cnt.custodian_name_name, '</a>') SEPARATOR '<br>') AS custodian_links"),
                DB::raw("GROUP_CONCAT(DISTINCT CONCAT('<a href=\"/risks/', rm.id, '\">', rm.risk_name, '</a>') SEPARATOR '<br>') AS risks")
                // Wrap risks in anchor tags with <br> separation
            )
            // Grouping by necessary columns to work with aggregation
            ->groupBy(
                'c.id',
                'c.control_id',
                'c.control_name',
                'bp.sort_order',
                'o.id',
                'o.owner_name',
                'o.owner_id',  // Including owner_name in the GROUP BY
                DB::raw("COALESCE(latest_cad.control_implementation_status, 'Not Implemented')")  // Include status for consistency
            )
            // Ordering by sort_order from best_practice_table
            ->orderBy('bp.sort_order', 'asc')  // Ascending order (change to 'desc' if you want descending)
            ->orderByRaw("
            CAST(SUBSTRING_INDEX(c.control_id, '-', 1) AS UNSIGNED),
            CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 3), '-', -1) AS UNSIGNED),
            COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 4), '-', -1) AS UNSIGNED), 0),
            COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 5), '-', -1) AS UNSIGNED), 0),
            COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 6), '-', -1) AS UNSIGNED), 0)
        ")->get();

        $pdfUrl = $this->_getPdfUrl();
        $excelUrl = $this->_getExcelUrl();

        // return $report;
        if (request()->has('pdf')) {
            $this->_downloadPdf($report, 'mbe-control-report.pdf', 'management-pdf', "Control Status");
        } else if (request()->has('excel')) {
            return $this->_downloadControlExcel($report);
        } else {
            return view(
                'process/reporting/exception-reports/management',
                compact('report', 'types', 'pdfUrl', 'excelUrl')
            );
        }
    }

    public function risk_exceptions_report(Request $request)
    {
        $assetTypes = $request->input('asset_type') ?? null;

        $types = [
            "risk_critical_asset" => "Critical Risks",
            "risk_cloud" => "Cloud Risks",
            "risk_telework" => "Telework Risks",
            "risk_social_media" => "Social Media Risks",
            "risk_data_privicy" => "Data Privacy Risks",
            "risk_pii" => "Data PII Risks",
            "risk_pci_dss" => "PCI DSS Risks",
            "risk_e_commerce" => "E-Commerce Risks",
            "risk_infrastructure" => "Infrastructure Risks",
            "risk_infrastructure" => "Application Risks",
            "risk_hr" => "HR Risks",
            "risk_physical_security" => "Physical Risks",
            "risk_third_party" => "Third Party Risks",
            "operational_asset" => "Operational Risks",
            "risk_e_banking" => "E-banking Risks",
            "risk_payment" => "Payment Risks"
        ];

        $report = DB::table('risk_master_table AS rm')
            ->distinct()
            // Join with risk_vs_control_table to link risks with controls
            ->join('risk_vs_control_table AS rvct', 'rm.risk_id', '=', 'rvct.risk_id')
            // Join with control_master_table to get control details
            ->join('control_master_table AS c', 'rvct.control_id', '=', 'c.control_id')
            // Join with risk_assessment_details_table to get risk assessment status
            ->leftJoin('risk_assessment_details_table AS rad', 'rm.risk_id', '=', 'rad.risk_id')
            // Join with owner_table to get risk owner details
            ->join('owner_table AS o', 'rm.owner_id', '=', 'o.owner_role_id')
            // Join with risk_master_table_vs_custodian_role_table to get risk custodians
            ->join('risk_master_table_vs_custodian_role_table AS rmvc', 'rm.risk_id', '=', 'rmvc.risk_id')
            // Join with custodian_name_table to get custodian names
            ->join('custodian_name_table AS cnt', 'rmvc.custodian_id', '=', 'cnt.custodian_role_id')
            // Filter risks with implementation status "Open" or null
            ->where(function ($query) {
                $query->whereNull('rad.implementation_status')
                    ->orWhere('rad.implementation_status', '=', 'Open');
            })
            ->select(
                'rm.id as rid',
                'rm.risk_id',
                'rm.risk_name',
                'o.id as oid',
                'o.owner_name',
                'o.owner_id',  // Risk owner name
                DB::raw("COALESCE(rad.implementation_status, 'Open') as status"),
                DB::raw("GROUP_CONCAT(DISTINCT CONCAT('<a href=\"/custodians/', cnt.id, '\">', cnt.custodian_name_name, '</a>') SEPARATOR '<br>') AS custodian_links"), // Distinct custodian names with links
                DB::raw("GROUP_CONCAT(DISTINCT CONCAT('<a href=\"/controls/', c.id, '\">', c.control_id, ' - ', c.control_name, '</a>') SEPARATOR '<br>') AS control_links")
                // Distinct concatenation of control_id and control_name with links
            )
            // Group by necessary columns for aggregation
            ->groupBy(
                'rm.id',
                'rm.risk_id',
                'rm.risk_name',
                'o.id',
                'o.owner_name',
                'o.owner_id',
                'rad.implementation_status'
            )
            // Ordering by risk_id (adjust if necessary)
            ->orderBy('rm.risk_id', 'asc')
            ->when($assetTypes, function ($query, $assetTypes) {
                foreach ($assetTypes as $type) {
                    $query->where($type, "Yes");
                }
            })
            ->get();

        $pdfUrl = $this->_getPdfUrl();
        $excelUrl = $this->_getExcelUrl();

        if (request()->has('pdf')) {

            $this->_downloadPdf($report, 'mbe-risk-report.pdf', 'risk-pdf', 'Risk Status');
        } else if (request()->has('excel')) {
            return $this->_downloadRiskExcel($report);
        } else {

            return view(
                'process/reporting/exception-reports/risk',
                compact('report', 'types', 'pdfUrl', 'excelUrl')
            );
        }
    }

    public function asset_exceptions_report(Request $request)
    {
        $assetTypes = $request->input('asset_type') ?? null;

        $types = [
            "critical_asset" => "Critical Assets",
            "cloud_asset" => "Cloud Assets",
            "telework_asset" => "Telework Assets",
            "social_media_asset" => "Social Media Assets",
            "data_privacy_asset" => "Data Privacy Assets",
            "data_pii_asset" => "Data PII Assets",
            "pci_dss_asset" => "PCI DSS Assets",
            "e_commerce_asset" => "E-Commerce Assets",
            "infrastructure_assets" => "Infrastructure Assets",
            "application_assets" => "Application Assets",
            "hr_asset" => "HR Assets",
            "physical_assets" => "Physical Assets",
            "third_party_asset" => "Third Party Assets",
            "operational_asset" => "Operational Assets",
            "e_banking_asset" => "E-banking Assets",
            "payment_asset" => "Payment Asset"
        ];

        $report =  DB::table('asset_register_table as a')
            ->join('asset_group_table as ag', 'a.asset_group_id', '=', 'ag.asset_group_id')
            ->join('owner_table as o', 'ag.owner_id', '=', 'o.owner_role_id')
            ->join('custodian_name_table_vs_asset_group_table as cvag', 'ag.asset_group_id', '=', 'cvag.asset_group_id')
            ->join('custodian_table as c', 'cvag.custodian_id', '=', 'c.custodian_role_id')
            ->join('risk_vs_asset_group_table as rvag', 'ag.asset_group_id', '=', 'rvag.asset_group_id')
            ->join('risk_master_table as r', 'rvag.risk_id', '=', 'r.risk_id')
            ->join('risk_vs_control_table as rvc', 'r.risk_id', '=', 'rvc.risk_id')
            ->join('control_master_table as cm', 'rvc.control_id', '=', 'cm.control_id')
            ->leftJoin('control_assessment_details_table as cad', 'cm.control_id', '=', 'cad.control_id')
            ->where(function ($query) {
                $query->whereNull('cad.control_implementation_status')
                    ->orWhere('cad.control_implementation_status', '=', 'Not Implemented');
            })
            ->select(
                'a.id as aid',
                'a.asset_id',
                'a.asset_name',
                'ag.asset_group_name',
                'o.id as oid',
                'o.owner_id',
                'o.owner_name',
                DB::raw('GROUP_CONCAT(DISTINCT CONCAT("<a href=\'/custodians/", c.id, "-", c.custodian_role_title, "\'>", c.custodian_role_title, "</a>") SEPARATOR "<br>") as custodians'),
                DB::raw('GROUP_CONCAT(DISTINCT CONCAT("<a href=\'/risks/", r.id, "\'>",  r.risk_name, "</a>") SEPARATOR "<br>") as risks'),
                DB::raw("GROUP_CONCAT(DISTINCT CONCAT('<a href=\"/controls/', cm.id, '\">', cm.control_id, ' - ', cm.control_name, '</a>') SEPARATOR '<br>') AS controls")




            )
            ->groupBy('a.id', 'a.asset_id', 'a.asset_name', 'ag.asset_group_name', 'o.id', 'o.owner_id', 'o.owner_name')
            ->when($assetTypes, function ($query, $assetTypes) {
                foreach ($assetTypes as $type) {
                    $query->where($type, "Yes");
                }
            })
            ->get();

        $pdfUrl = $this->_getPdfUrl();
        $excelUrl = $this->_getExcelUrl();

        if (request()->has('pdf')) {

            $this->_downloadPdf($report, 'mbe-asset-report.pdf', 'asset-pdf', 'Asset Status');
            // $this->_downloadPdf($report, 'mbe-risk-report.pdf', 'mbe-risk-pdf');
        } else if (request()->has('excel')) {
            return $this->_downloadAssetExcel($report);
        } else {


            return view(
                'process/reporting/exception-reports/asset',
                compact('report', 'types', 'pdfUrl', 'excelUrl')
            );
        }
    }

    private function _downloadPdf($report, $filename, $template, $title = "")
    {
        $mpdf = new Mpdf([
            'orientation' => 'L'
        ]);

        ini_set("pcre.backtrack_limit", "5000000");

        $html = view("process/reporting/exception-reports/{$template}", compact('report', 'title'))->render();

        $mpdf->WriteHTML($html);

        // Set the headers to prompt the file download
        return response($mpdf->Output($filename, 'D'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }

    private function _getPdfUrl()
    {
        $currentUrl = request()->fullUrl();

        // Check if the current URL already contains query parameters
        if (strpos($currentUrl, '?') !== false) {
            // If query string exists, append with '&'
            $updatedUrl = $currentUrl . '&pdf=1';
        } else {
            // If no query string exists, append with '?'
            $updatedUrl = $currentUrl . '?pdf=1';
        }

        return $updatedUrl;
    }

    private function _getExcelUrl()
    {
        $currentUrl = request()->fullUrl();

        // Check if the current URL already contains query parameters
        if (strpos($currentUrl, '?') !== false) {
            // If query string exists, append with '&'
            $updatedUrl = $currentUrl . '&excel=1';
        } else {
            // If no query string exists, append with '?'
            $updatedUrl = $currentUrl . '?excel=1';
        }

        return $updatedUrl;
    }

    private function _downloadControlExcel($report)
    {
        $filePath = storage_path('app/public/reports/MBE-Controls-Template.xlsx');
        $outputFilePath = storage_path('app/public/reports/MBE-Controls.xlsx');

        copy($filePath, $outputFilePath);

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();

        $headers = [
            'A' => 'sno',
            'B' => 'control_id',
            'C' => 'control_name',
            'D' => 'status',
            'E' => 'owner_name',
            'F' => 'custodian_links',
            'G' => 'risks',
        ];

        $startingRow = 3;
        $sNo = 1;


        foreach ($report as $rowData) {

            foreach ($headers as $column => $key) {
                $cellCoordinate = "{$column}{$startingRow}";
                $custodians = str_replace("<br>", ", \n", strip_tags($rowData->custodian_links, "<br>"));
                $risks = str_replace("<br>", ", \n", strip_tags($rowData->risks, "<br>"));

                $sheet->setCellValue("A{$startingRow}", $sNo);
                $sheet->setCellValue("B{$startingRow}", $rowData->control_id);
                $sheet->setCellValue("C{$startingRow}", $rowData->control_name);
                $sheet->setCellValue("D{$startingRow}", $rowData->status);
                $sheet->setCellValue("E{$startingRow}", $rowData->owner_name);
                $sheet->setCellValue("F{$startingRow}", $custodians);
                $sheet->setCellValue("G{$startingRow}", $risks);

                $horizontalAlign = Alignment::HORIZONTAL_LEFT;
                $verticalAlign = Alignment::VERTICAL_TOP;

                $sheet->getStyle($cellCoordinate)
                    ->getAlignment()
                    ->setHorizontal($horizontalAlign)
                    ->setVertical($verticalAlign)
                    ->setWrapText(true);
            }
            $sNo++;
            $startingRow++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($outputFilePath);
        return response()->download($outputFilePath)->deleteFileAfterSend(true);

        return response()->json(['message' => 'File updated successfully.']);
    }

    private function _downloadRiskExcel($report)
    {
        $filePath = storage_path('app/public/reports/MBE-Risks-Template.xlsx');
        $outputFilePath = storage_path('app/public/reports/MBE-Risks.xlsx');

        copy($filePath, $outputFilePath);

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();

        $headers = [
            'A' => 'sno',
            'B' => 'risk_id',
            'C' => 'risk_name',
            'D' => 'status',
            'E' => 'owner_name',
            'F' => 'custodian_links',
            'G' => 'control_links',
        ];

        $startingRow = 3;
        $sNo = 1;

        foreach ($report as $rowData) {

            foreach ($headers as $column => $key) {
                $cellCoordinate = "{$column}{$startingRow}";
                $custodians = str_replace("<br>", ", \n", strip_tags($rowData->custodian_links, "<br>"));
                $controls = str_replace("<br>", ", \n", strip_tags($rowData->control_links, "<br>"));

                $sheet->setCellValue("A{$startingRow}", $sNo);
                $sheet->setCellValue("B{$startingRow}", $rowData->risk_id);
                $sheet->setCellValue("C{$startingRow}", $rowData->risk_name);
                $sheet->setCellValue("D{$startingRow}", $rowData->status);
                $sheet->setCellValue("E{$startingRow}", $rowData->owner_name);
                $sheet->setCellValue("F{$startingRow}", $custodians);
                $sheet->setCellValue("G{$startingRow}", $controls);

                $horizontalAlign = Alignment::HORIZONTAL_LEFT;
                $verticalAlign = Alignment::VERTICAL_TOP;

                $sheet->getStyle($cellCoordinate)
                    ->getAlignment()
                    ->setHorizontal($horizontalAlign)
                    ->setVertical($verticalAlign)
                    ->setWrapText(true);
                $sheet->getColumnDimension('F')->setAutoSize(true);
                $sheet->getColumnDimension('G')->setAutoSize(true);
            }

            $sNo++;
            $startingRow++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($outputFilePath);
        return response()->download($outputFilePath)->deleteFileAfterSend(true);

        return response()->json(['message' => 'File updated successfully.']);
    }

    private function _downloadAssetExcel($report)
    {
        $filePath = storage_path('app/public/reports/MBE-Assets-Template.xlsx');
        $outputFilePath = storage_path('app/public/reports/MBE-Assets.xlsx');

        copy($filePath, $outputFilePath);

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();


        $headers = [
            'A' => 'sno',
            'B' => 'asset_id',
            'C' => 'asset_name',
            'D' => 'asset_group_name',
            'E' => 'owner_name',
            'F' => 'custodians',
            'G' => 'risks',
            'H' => 'controls',
        ];

        $startingRow = 3;
        $sNo = 1;

        foreach ($report as $rowData) {

            foreach ($headers as $column => $key) {
                $cellCoordinate = "{$column}{$startingRow}";
                $custodians = str_replace("<br>", ", \n", strip_tags($rowData->custodians, "<br>"));
                $controls = str_replace("<br>", ", \n", strip_tags($rowData->controls, "<br>"));
                $risks = str_replace("<br>", ", \n", strip_tags($rowData->risks, "<br>"));

                $sheet->setCellValue("A{$startingRow}", $sNo);
                $sheet->setCellValue("B{$startingRow}", $rowData->asset_id);
                $sheet->setCellValue("C{$startingRow}", $rowData->asset_name);
                $sheet->setCellValue("D{$startingRow}", $rowData->asset_group_name);
                $sheet->setCellValue("E{$startingRow}", $rowData->owner_name);
                $sheet->setCellValue("F{$startingRow}", $custodians);
                $sheet->setCellValue("G{$startingRow}", $risks);
                $sheet->setCellValue("H{$startingRow}", $controls);

                $horizontalAlign = Alignment::HORIZONTAL_LEFT;
                $verticalAlign = Alignment::VERTICAL_TOP;

                $sheet->getStyle($cellCoordinate)
                    ->getAlignment()
                    ->setHorizontal($horizontalAlign)
                    ->setVertical($verticalAlign)
                    ->setWrapText(true);
                $sheet->getColumnDimension('F')->setAutoSize(true);
                $sheet->getColumnDimension('G')->setAutoSize(true);
            }

            $sNo++;
            $startingRow++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($outputFilePath);
        return response()->download($outputFilePath)->deleteFileAfterSend(true);

        return response()->json(['message' => 'File updated successfully.']);
    }
}
