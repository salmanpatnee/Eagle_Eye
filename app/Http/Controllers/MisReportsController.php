<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class MisReportsController extends Controller
{
    public function mbe(Request $request)
    {

        $assetTypes = $request->input('asset_type') ?? null;

        $types = [
            "control_critical_asset" => "Critical Controls",
            "control_cloud" => "Cloud Controls",
            "control_telework" => "Telework Controls",
            "control_social_media" => "Social Media Controls",
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
                'c.control_id',
                'c.control_name',
                'bp.sort_order',  // Added sort_order to SELECT list to allow ordering
                DB::raw("COALESCE(latest_cad.control_implementation_status, 'Not Implemented') AS status"),
                'o.owner_name',
                'o.owner_id', // Adding owner_name to the SELECT list
                DB::raw("GROUP_CONCAT(DISTINCT CONCAT('<a href=\"/custodian-table/', cnt.custodian_name_id, '\" style=\"color: black;\">', cnt.custodian_name_name, '</a>') SEPARATOR '<br>') AS custodian_links"),
                DB::raw("GROUP_CONCAT(DISTINCT CONCAT('<a href=\"/risk-identification-table/', rm.risk_id, '\" style=\"color: black;\">', rm.risk_name, '</a>') SEPARATOR '<br>') AS risks")
                // Wrap risks in anchor tags with <br> separation
            )
            // Grouping by necessary columns to work with aggregation
            ->groupBy(
                'c.control_id',
                'c.control_name',
                'bp.sort_order',
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


        if (request()->has('pdf')) {
            $this->_downloadPdf($report, 'mbe-control-report.pdf', 'mbe-pdf', "Control Status");
        } else if (request()->has('excel')) {
            return $this->_downloadControlExcel($report);
        } else {
            return view(
                '4-Process/18-Reporting/2-MISReporting/mbe',
                compact('report', 'types', 'pdfUrl', 'excelUrl')
            );
        }
    }

    public function mbe_risks(Request $request)
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
                'rm.risk_id',
                'rm.risk_name',
                'o.owner_name',
                'o.owner_id',  // Risk owner name
                DB::raw("COALESCE(rad.implementation_status, 'Open') as status"),
                DB::raw("GROUP_CONCAT(DISTINCT CONCAT('<a href=\"/custodian-table/', cnt.custodian_name_id, '\" style=\"color: black;\">', cnt.custodian_name_name, '</a>') SEPARATOR '<br>') AS custodian_links"), // Distinct custodian names with links
                DB::raw("GROUP_CONCAT(DISTINCT CONCAT('<a href=\"/control-identification-table/', c.control_id, '\" >', c.control_id, ' - ', c.control_name, '</a>') SEPARATOR '<br>') AS control_links")
                // Distinct concatenation of control_id and control_name with links
            )
            // Group by necessary columns for aggregation
            ->groupBy(
                'rm.risk_id',
                'rm.risk_name',
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

            $this->_downloadPdf($report, 'mbe-risk-report.pdf', 'mbe-risk-pdf', 'Risk Status');
        } else if (request()->has('excel')) {
            return $this->_downloadRiskExcel($report);
        } else {

            return view(
                '4-Process/18-Reporting/2-MISReporting/mbe-risk',
                compact('report', 'types', 'pdfUrl', 'excelUrl')
            );
        }
    }

    public function mbe_assets(Request $request)
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
                'a.asset_id',
                'a.asset_name',
                'ag.asset_group_name',
                'o.owner_id',
                'o.owner_name',
                DB::raw('GROUP_CONCAT(DISTINCT CONCAT("<a href=\'/custodian-table/", c.custodian_role_id, "-", c.custodian_role_title, "\' style=\"color: black;\">", c.custodian_role_title, "</a>") SEPARATOR "<br>") as custodians'),
                DB::raw('GROUP_CONCAT(DISTINCT CONCAT("<a href=\'/risk-identification-table/", r.risk_id, "\' style=\"color: black;\">",  r.risk_name, "</a>") SEPARATOR "<br>") as risks'),
                DB::raw("GROUP_CONCAT(DISTINCT CONCAT('<a href=\"/control-identification-table/', cm.control_id, '\" >', cm.control_id, ' - ', cm.control_name, '</a>') SEPARATOR '<br>') AS controls")
                // DB::raw('GROUP_CONCAT(DISTINCT CONCAT("<a href=\'/control-identification-table/", cm.control_id, "\' >",  cm.control_name, "</a>") SEPARATOR "<br>") as controls')
                // DB::raw('GROUP_CONCAT(DISTINCT CONCAT(cm.control_name) SEPARATOR "") as controls'),



            )
            ->groupBy('a.asset_id', 'a.asset_name', 'ag.asset_group_name', 'o.owner_id', 'o.owner_name')
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
                '4-Process/18-Reporting/2-MISReporting/mbe-asset',
                compact('report', 'types', 'pdfUrl', 'excelUrl')
            );
        }
    }

    // 2.Controller - SHOW DATA INTO THE LIST

    // -------Report of Critical Assets-------
    public function listcritical()
    {
        $criticalAssets = Asset::select('asset_id', 'asset_name', 'asset_group_id', 'asset_type_id', 'location_id')
            ->where('critical_asset', 'Yes')
            ->whereHas('assetGroup')
            ->whereHas('assetType')
            ->whereHas('location')
            ->with([
                'assetGroup' => function ($query) {
                    $query->select('asset_group_id', 'asset_group_name');
                },
                'assetType' => function ($query) {
                    $query->select('asset_type_id', 'asset_type_name');
                },
                'location' => function ($query) {
                    $query->select('location_id', 'location_name');
                },
            ])
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($criticalAssets, 'critical-asset-report.pdf', 'pdf/critical-asset-pdf', 'Critical Asset');
        } else {
            return view('4-Process/18-Reporting/2-MISReporting/1-list-critical-assets', compact('criticalAssets'));
        }
    }


    // -------Risk Related Critical Assets-------
    public function riskcritical()
    {
        $assetregister = DB::table('risk_master_table as riskmaster')
            ->join('risk_group_table as riskgroup', 'riskgroup.risk_group_id', '=', 'riskmaster.risk_group_id')
            ->join('risk_inherent_table as riskinherent', 'riskinherent.risk_inherent_id', '=', 'riskmaster.risk_inherent_id')
            ->where('risk_critical_asset', 'Yes')
            ->get();


        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'Risks-Related-to-Critical-Assets.pdf', 'pdf/risks-related-to-critical-assets-pdf', 'Risks Related to Critical Assets');
        } else {
            return view('4-Process/18-Reporting/2-MISReporting/1-risk-critical-assets', ['assetregister' => $assetregister]);
        }
    }


    // -------Control Related Critical Assets-------
    public function controlcritical()
    {
        $assetregister = DB::table('control_master_table')
            ->where('control_critical_asset', 'Yes')
            ->get();

            if (request()->has('pdf')) {
                $this->_downloadPdf($assetregister, 'Controls-Related-to-Critical-Assets.pdf', 'pdf/controls-related-to-critical-assets-pdf', 'Controls Related to Critical Assets');
            } else {
                
                return view('4-Process/18-Reporting/2-MISReporting/1-control-critical-assets', ['assetregister' => $assetregister]);
            }
            
    }


    // -------Report of Cloud Assets-------
    public function listcloud()
    {
        $assetregister = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'assetgroup.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'assettype.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('cloud_asset', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/2-list-cloud-assets', ['assetregister' => $assetregister]);
    }


    // -------Risk Related Cloud Assets-------
    public function riskcloud()
    {
        $assetregister = DB::table('risk_master_table as riskmaster')
            ->join('risk_group_table as riskgroup', 'riskgroup.risk_group_id', '=', 'riskmaster.risk_group_id')
            ->join('risk_inherent_table as riskinherent', 'riskinherent.risk_inherent_id', '=', 'riskmaster.risk_inherent_id')
            ->where('risk_cloud', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/2-risk-cloud-assets', ['assetregister' => $assetregister]);
    }


    // -------Control Related Cloud Assets-------
    public function controlcloud()
    {
        $assetregister = DB::table('control_master_table')
            ->where('control_cloud', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/2-control-cloud-assets', ['assetregister' => $assetregister]);
    }

    // -------Report of Telework Assets-------
    public function listtelework()
    {
        $assetregister = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'assetgroup.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'assettype.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('telework_asset', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/3-list-telework-assets', ['assetregister' => $assetregister]);
    }


    // -------Risk Related Telework Assets-------
    public function risktelework()
    {
        $assetregister = DB::table('risk_master_table as riskmaster')
            ->join('risk_group_table as riskgroup', 'riskgroup.risk_group_id', '=', 'riskmaster.risk_group_id')
            ->join('risk_inherent_table as riskinherent', 'riskinherent.risk_inherent_id', '=', 'riskmaster.risk_inherent_id')
            ->where('risk_telework', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/3-risk-telework-assets', ['assetregister' => $assetregister]);
    }


    // -------Control Related Telework Assets-------
    public function controltelework()
    {
        $assetregister = DB::table('control_master_table')
            ->where('control_telework', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/3-control-telework-assets', ['assetregister' => $assetregister]);
    }

    // -------Report of Social Media Assets-------
    public function listSocialMedia()
    {
        $assetregister = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'assetgroup.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'assettype.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('social_media_asset', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/4-list-social-media-assets', ['assetregister' => $assetregister]);
    }


    // -------Risk Related Social Media Assets-------
    public function riskSocialMedia()
    {
        $assetregister = DB::table('risk_master_table as riskmaster')
            ->join('risk_group_table as riskgroup', 'riskgroup.risk_group_id', '=', 'riskmaster.risk_group_id')
            ->join('risk_inherent_table as riskinherent', 'riskinherent.risk_inherent_id', '=', 'riskmaster.risk_inherent_id')
            ->where('risk_social_media', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/4-risk-social-media-assets', ['assetregister' => $assetregister]);
    }


    // -------Control Related Social Media Assets-------
    public function controlSocialMedia()
    {
        $assetregister = DB::table('control_master_table')
            ->where('control_social_media', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/4-control-social-media-assets', ['assetregister' => $assetregister]);
    }

    // -------Report of Data Privacy Assets-------
    public function listDataPrivacy()
    {
        $assetregister = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'assetgroup.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'assettype.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('data_privacy_asset', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/5-list-data-privacy-assets', ['assetregister' => $assetregister]);
    }


    // -------Risk Related Data Privacy Assets-------
    public function riskDataPrivacy()
    {
        $assetregister = DB::table('risk_master_table as riskmaster')
            ->join('risk_group_table as riskgroup', 'riskgroup.risk_group_id', '=', 'riskmaster.risk_group_id')
            ->join('risk_inherent_table as riskinherent', 'riskinherent.risk_inherent_id', '=', 'riskmaster.risk_inherent_id')
            ->where('risk_data_privicy', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/5-risk-data-privacy-assets', ['assetregister' => $assetregister]);
    }


    // -------Control Related Data Privacy Assets-------
    public function controlDataPrivacy()
    {
        $assetregister = DB::table('control_master_table')
            ->where('control_data_privicy', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/5-control-data-privacy-assets', ['assetregister' => $assetregister]);
    }

    // -------Report of PII Assets-------
    public function listPii()
    {
        $assetregister = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'assetgroup.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'assettype.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('data_pii_asset', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/6-list-pii-assets', ['assetregister' => $assetregister]);
    }


    // -------Risk Related PII Assets-------
    public function riskPii()
    {
        $assetregister = DB::table('risk_master_table as riskmaster')
            ->join('risk_group_table as riskgroup', 'riskgroup.risk_group_id', '=', 'riskmaster.risk_group_id')
            ->join('risk_inherent_table as riskinherent', 'riskinherent.risk_inherent_id', '=', 'riskmaster.risk_inherent_id')
            ->where('risk_pii', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/6-risk-pii-assets', ['assetregister' => $assetregister]);
    }


    // -------Control Related PII Assets-------
    public function controlPii()
    {
        $assetregister = DB::table('control_master_table')
            ->where('control_pii', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/6-control-pii-assets', ['assetregister' => $assetregister]);
    }


    // -------Report of Payment Assets-------
    public function listPayment()
    {
        $assetregister = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'assetgroup.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'assettype.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('payment_asset', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/7-list-payment-assets', ['assetregister' => $assetregister]);
    }


    // -------Risk Related Payment Assets-------
    public function riskPayment()
    {
        $assetregister = DB::table('risk_master_table as riskmaster')
            ->join('risk_group_table as riskgroup', 'riskgroup.risk_group_id', '=', 'riskmaster.risk_group_id')
            ->join('risk_inherent_table as riskinherent', 'riskinherent.risk_inherent_id', '=', 'riskmaster.risk_inherent_id')
            ->where('risk_payment', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/7-risk-payment-assets', ['assetregister' => $assetregister]);
    }


    // -------Control Related Payment Assets-------
    public function controlPayment()
    {
        $assetregister = DB::table('control_master_table')
            ->where('control_payment', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/7-control-payment-assets', ['assetregister' => $assetregister]);
    }


    // -------Report of PCI-DSS Assets-------
    public function listPci()
    {
        $assetregister = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'assetgroup.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'assettype.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('pci_dss_asset', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/8-list-pci-assets', ['assetregister' => $assetregister]);
    }


    // -------Risk Related PCI-DSS Assets-------
    public function riskPci()
    {
        $assetregister = DB::table('risk_master_table as riskmaster')
            ->join('risk_group_table as riskgroup', 'riskgroup.risk_group_id', '=', 'riskmaster.risk_group_id')
            ->join('risk_inherent_table as riskinherent', 'riskinherent.risk_inherent_id', '=', 'riskmaster.risk_inherent_id')
            ->where('risk_pci_dss', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/8-risk-pci-assets', ['assetregister' => $assetregister]);
    }


    // -------Control Related PCI-DSS Assets-------
    public function controlPci()
    {
        $assetregister = DB::table('control_master_table')
            ->where('control_pci_dss', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/8-control-pci-assets', ['assetregister' => $assetregister]);
    }


    // -------Report of E-Banking Assets-------
    public function listEcom()
    {
        $assetregister = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'assetgroup.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'assettype.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('e_commerce_asset', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/9-list-e-commerce-assets', ['assetregister' => $assetregister]);
    }


    // -------Risk Related E-Commerce Assets-------
    public function riskEcom()
    {
        $assetregister = DB::table('risk_master_table as riskmaster')
            ->join('risk_group_table as riskgroup', 'riskgroup.risk_group_id', '=', 'riskmaster.risk_group_id')
            ->join('risk_inherent_table as riskinherent', 'riskinherent.risk_inherent_id', '=', 'riskmaster.risk_inherent_id')
            ->where('risk_e_commerce', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/9-risk-e-commerce-assets', ['assetregister' => $assetregister]);
    }


    // -------Control Related E-Commerce Assets-------
    public function controlEcom()
    {
        $assetregister = DB::table('control_master_table')
            ->where('control_e_commerce', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/9-control-e-commerce-assets', ['assetregister' => $assetregister]);
    }


    // -------Report of E-Banking Assets-------
    public function listEbank()
    {
        $assetregister = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'assetgroup.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'assettype.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('e_banking_asset', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/10-list-e-banking-assets', ['assetregister' => $assetregister]);
    }


    // -------Risk Related E-Banking Assets-------
    public function riskEbank()
    {
        $assetregister = DB::table('risk_master_table as riskmaster')
            ->join('risk_group_table as riskgroup', 'riskgroup.risk_group_id', '=', 'riskmaster.risk_group_id')
            ->join('risk_inherent_table as riskinherent', 'riskinherent.risk_inherent_id', '=', 'riskmaster.risk_inherent_id')
            ->where('risk_e_banking', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/10-risk-e-banking-assets', ['assetregister' => $assetregister]);
    }


    // -------Control Related E-Banking Assets-------
    public function controlEbank()
    {
        $assetregister = DB::table('control_master_table')
            ->where('control_e_banking', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/10-control-e-banking-assets', ['assetregister' => $assetregister]);
    }



    // -------Risk Register-------
    public function riskReg()
    {
        // Subquery for the latest assessment of each risk
        $latestAssessments = DB::table('risk_assessment_details_table as rad1')
            ->select('rad1.*')
            ->whereRaw('rad1.id = (SELECT MAX(id) FROM risk_assessment_details_table WHERE risk_id = rad1.risk_id)');

        // Subquery for the latest control assessment details
        $latestControlAssessments = DB::table('control_assessment_details_table as cad1')
            ->select('cad1.control_id', 'cad1.control_implementation_status')
            ->whereRaw('cad1.id = (SELECT MAX(id) FROM control_assessment_details_table WHERE control_id = cad1.control_id)');

        // Main query
        $riskStatus = DB::table('risk_master_table as r')
            ->selectRaw("
                r.risk_id,
                        CONCAT(r.risk_id, ' - ', r.risk_name) AS risk,
                o.owner_name AS risk_owner,
                COALESCE(CONCAT(ra.risk_assessment_id, ' - ', ra.risk_assessment_name), 'Not Assessed') AS risk_assessment,
                ra.risk_assessment_start_date,
                COALESCE(CONCAT(rad.risk_finding_id, ' - ', rad.risk_finding_name), 'Not Assessed') AS findings,
                rad.implementation_status,
                GROUP_CONCAT(DISTINCT CONCAT(c.control_id, ' - ', c.control_name) ORDER BY c.control_id SEPARATOR '<br>') AS controls,
                GROUP_CONCAT(DISTINCT CONCAT(c.control_id, ' - ', COALESCE(latest_cad.control_implementation_status, 'Not Implemented')) ORDER BY c.control_id SEPARATOR '<br>') AS control_status,
                GROUP_CONCAT(DISTINCT CONCAT(c.control_id, ' - ', ow.owner_name) ORDER BY c.control_id SEPARATOR '<br>') AS control_owner
            ")
            ->join('owner_table as o', 'r.owner_id', '=', 'o.owner_role_id')
            ->leftJoinSub($latestAssessments, 'rad', function ($join) {
                $join->on('r.risk_id', '=', 'rad.risk_id');
            })
            ->leftJoin('risk_assessment_master_table as ra', 'rad.risk_assessment_id', '=', 'ra.risk_assessment_id')
            ->join('risk_vs_control_table as rvc', 'r.risk_id', '=', 'rvc.risk_id')
            ->join('control_master_table as c', 'rvc.control_id', '=', 'c.control_id')
            ->leftJoinSub($latestControlAssessments, 'latest_cad', function ($join) {
                $join->on('c.control_id', '=', 'latest_cad.control_id');
            })
            ->join('owner_table as ow', 'c.owner_id', '=', 'ow.owner_role_id')
            ->groupBy([
                'r.risk_id',
                'r.risk_name',
                'o.owner_name',
                'ra.risk_assessment_id',
                'ra.risk_assessment_name',
                'ra.risk_assessment_start_date',
                'rad.risk_finding_id',
                'rad.risk_finding_name',
                'rad.implementation_status'
            ])
            ->get();


        $risksCount = DB::table('risk_master_table as r')
            ->leftJoin(DB::raw('(
        SELECT 
            rad.risk_id,
            rad.implementation_status as latest_status
        FROM risk_assessment_details_table as rad
        INNER JOIN (
            SELECT risk_id, MAX(id) as latest_id
            FROM risk_assessment_details_table
            GROUP BY risk_id
        ) as latest
        ON rad.id = latest.latest_id
    ) as rad'), 'r.risk_id', '=', 'rad.risk_id')
            ->selectRaw('
        COUNT(DISTINCT r.risk_id) as total_risks,
        SUM(
            CASE 
                WHEN rad.latest_status = "closed" THEN 1
                WHEN rad.latest_status IS NULL THEN 0
                ELSE 0
            END
        ) as closed_risks,
        SUM(
            CASE 
                WHEN rad.latest_status = "open" OR rad.latest_status IS NULL THEN 1
                ELSE 0
            END
        ) as open_risks
    ')
            ->first();

        $controlsCount = DB::table('control_master_table as cm')
            ->leftJoin(DB::raw('(
        SELECT 
            control_id, 
            control_implementation_status
        FROM control_assessment_details_table
        WHERE id IN (
            SELECT MAX(id)
            FROM control_assessment_details_table
            GROUP BY control_id
        )
    ) as cad'), 'cm.control_id', '=', 'cad.control_id')
            ->selectRaw('
        COUNT(DISTINCT cm.control_id) as total_controls,
        SUM(
            CASE 
                WHEN cad.control_implementation_status = "Implemented" THEN 1
                ELSE 0
            END
        ) as implemented_controls,
        SUM(
            CASE 
                WHEN cad.control_implementation_status = "Partially Implemented" THEN 1
                ELSE 0
            END
        ) as partially_implemented_controls,
        SUM(
            CASE 
                WHEN cad.control_implementation_status = "Not Applicable" THEN 1
                ELSE 0
            END
        ) as not_applicable_controls,
        SUM(
            CASE 
                WHEN cad.control_implementation_status IS NULL THEN 1  -- NULL means "Not Implemented"
                WHEN cad.control_implementation_status = "Not Implemented" THEN 1
                ELSE 0
            END
        ) as not_implemented_controls
    ')
            ->first();


        return view('4-Process/18-Reporting/2-MISReporting/11-risk-register', compact('riskStatus', 'controlsCount', 'risksCount'));
    }

    // -------Implemented Controls-------
    public function controlImple()
    {
        $assetregister = DB::table('control_master_table')
            ->where('implemented', 'Yes')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/12-list-control-implemented', ['assetregister' => $assetregister]);
    }

    // -------Implemented Controls-------
    public function controlNotImple()
    {
        $assetregister = DB::table('control_master_table')
            ->where('implemented', 'No')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/13-list-control-not-implemented', ['assetregister' => $assetregister]);
    }

    // -------Implemented Controls-------
    public function controlPending()
    {
        $assetregister = DB::table('control_master_table')
            ->where('implemented', 'Pending')
            ->get();
        return view('4-Process/18-Reporting/2-MISReporting/14-list-control-pending', ['assetregister' => $assetregister]);
    }

    private function _downloadPdf($report, $filename, $template, $title = "")
    {
        $mpdf = new Mpdf([
            'orientation' => 'L'
        ]);



        $html = view("4-Process/18-Reporting/2-MISReporting/{$template}", compact('report', 'title'))->render();

        $mpdf->WriteHTML($html);

        // Set the headers to prompt the file download
        return response($mpdf->Output($filename, 'D'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
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
}
