<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class RiskStatusController extends Controller
{
    private function getRiskStatus($owner = null, $status = null)
    {
        $latestAssessments = DB::table('risk_assessment_details_table as rad1')
            ->select('rad1.*')
            ->whereRaw('rad1.id = (SELECT MAX(id) FROM risk_assessment_details_table WHERE risk_id = rad1.risk_id)');

        $latestControlAssessments = DB::table('control_assessment_details_table as cad1')
            ->select('cad1.control_id', 'cad1.control_implementation_status')
            ->whereRaw('cad1.id = (SELECT MAX(id) FROM control_assessment_details_table WHERE control_id = cad1.control_id)');

        return DB::table('risk_master_table as r')
            ->selectRaw("
                r.id as rid,
                r.risk_id,
                CONCAT(r.risk_id, ' - ', r.risk_name) AS risk,
                o.owner_name AS risk_owner,
                COALESCE(CONCAT(ra.risk_assessment_id, ' - ', ra.risk_assessment_name), 'Not Assessed') AS risk_assessment,
                ra.risk_assessment_start_date,
                COALESCE(CONCAT(rad.risk_finding_id, ' - ', rad.risk_finding_name), 'Not Assessed') AS findings,
                rad.implementation_status,
                GROUP_CONCAT(DISTINCT CONCAT(c.control_id, ' - ', c.control_name) ORDER BY c.control_id SEPARATOR '<br><br>') AS controls,
                GROUP_CONCAT(DISTINCT COALESCE(latest_cad.control_implementation_status, 'Not Implemented') ORDER BY c.control_id SEPARATOR '<br>') AS control_status,
                GROUP_CONCAT(DISTINCT CONCAT(c.control_id, ' - ', ow.owner_name) ORDER BY c.control_id SEPARATOR '<br><br>') AS control_owner
            ")
            ->join('owner_table as o', 'r.owner_id', '=', 'o.owner_role_id')
            ->leftJoinSub($latestAssessments, 'rad', function ($join) {
                $join->on('r.risk_id', '=', 'rad.risk_id');
            })
            ->leftJoin('risk_assessment_master_table as ra', 'rad.risk_assessment_id', '=', 'ra.risk_assessment_id')
            ->leftJoin('risk_vs_control_table as rvc', 'r.risk_id', '=', 'rvc.risk_id')
            ->leftJoin('control_master_table as c', 'rvc.control_id', '=', 'c.control_id')
            ->leftJoinSub($latestControlAssessments, 'latest_cad', function ($join) {
                $join->on('c.control_id', '=', 'latest_cad.control_id');
            })
            ->leftJoin('owner_table as ow', 'c.owner_id', '=', 'ow.owner_role_id')
            ->when($owner, fn ($q, $v) => $q->where('r.owner_id', $v))
            ->when($status, fn ($q, $v) => $q->where('rad.implementation_status', $v))
            ->groupBy([
                'r.id',
                'r.risk_id',
                'r.risk_name',
                'o.owner_name',
                'ra.risk_assessment_id',
                'ra.risk_assessment_name',
                'ra.risk_assessment_start_date',
                'rad.risk_finding_id',
                'rad.risk_finding_name',
                'rad.implementation_status',
            ])
            ->get();
    }

    public function index(Request $request)
    {
        $owner = $request->input('owner');
        $status = $request->input('status');

        $riskStatus = $this->getRiskStatus($owner, $status);

        $owners = DB::table('owner_table')->select('owner_role_id', 'owner_name')->orderBy('owner_name')->get();

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
                SUM(CASE WHEN rad.latest_status = "Close" THEN 1 ELSE 0 END) as closed_risks,
                SUM(CASE WHEN rad.latest_status = "Open" OR rad.latest_status IS NULL THEN 1 ELSE 0 END) as open_risks
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
                SUM(CASE WHEN cad.control_implementation_status = "Implemented" THEN 1 ELSE 0 END) as implemented_controls,
                SUM(CASE WHEN cad.control_implementation_status = "Partially Implemented" THEN 1 ELSE 0 END) as partially_implemented_controls,
                SUM(CASE WHEN cad.control_implementation_status = "Not Applicable" THEN 1 ELSE 0 END) as not_applicable_controls,
                SUM(CASE WHEN cad.control_implementation_status IS NULL OR cad.control_implementation_status = "Not Implemented" THEN 1 ELSE 0 END) as not_implemented_controls
            ')
            ->first();

        return view('process/risk-identification/risk-status/index', compact('riskStatus', 'controlsCount', 'risksCount', 'owners', 'owner', 'status'));
    }

    public function getRiskStatusExcel(Request $request)
    {
        $owner = $request->input('owner');
        $status = $request->input('status');
        $data = $this->getRiskStatus($owner, $status);

        $spreadsheet = new Spreadsheet;
        $sheet = $spreadsheet->getActiveSheet();

        $headers = [
            'A' => 'Risk ID',
            'B' => 'Risk Name',
            'C' => 'Owner',
            'D' => 'Assessment',
            'E' => 'Assessment Date',
            'F' => 'Finding',
            'G' => 'Status',
            'H' => 'Controls',
            'I' => 'Control Status',
        ];

        foreach ($headers as $col => $label) {
            $sheet->setCellValue("{$col}1", $label);
            $sheet->getStyle("{$col}1")->getFont()->setBold(true)->setName('DIN Next LT Arabic Light')->setSize(12);
            $sheet->getStyle("{$col}1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $row = 2;
        foreach ($data as $rowData) {
            $rowValues = [
                'A' => $rowData->risk_id,
                'B' => $rowData->risk,
                'C' => $rowData->risk_owner,
                'D' => $rowData->risk_assessment,
                'E' => $rowData->risk_assessment_start_date,
                'F' => $rowData->findings,
                'G' => $rowData->implementation_status,
                'H' => strip_tags(preg_replace('/<br\s*\/?>/i', "\n", $rowData->controls ?? '')),
                'I' => strip_tags(preg_replace('/<br\s*\/?>/i', "\n", $rowData->control_status ?? '')),
            ];

            foreach ($rowValues as $col => $value) {
                $cell = "{$col}{$row}";
                $sheet->setCellValue($cell, $value);
                $sheet->getStyle($cell)->getFont()->setName('DIN Next LT Arabic Light')->setSize(12);
                $sheet->getStyle($cell)->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                    ->setVertical(Alignment::VERTICAL_CENTER)
                    ->setWrapText(true);
                $sheet->getStyle($cell)->getBorders()->getAllBorders()
                    ->setBorderStyle(Border::BORDER_THIN)
                    ->setColor(new Color(Color::COLOR_BLACK));
                $sheet->getColumnDimension($col)->setAutoSize(true);
                $sheet->getRowDimension($row)->setRowHeight(-1);
            }
            $row++;
        }

        $outputPath = storage_path('app/public/reports/Risk-Status-Export.xlsx');
        $writer = new Xlsx($spreadsheet);
        $writer->save($outputPath);

        return response()->download($outputPath, 'Risk-Status.xlsx')->deleteFileAfterSend(true);
    }
}
