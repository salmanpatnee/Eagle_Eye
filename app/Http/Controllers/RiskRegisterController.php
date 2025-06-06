<?php

namespace App\Http\Controllers;

use App\Models\Risk;
use App\Models\RiskTreatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class RiskRegisterController extends Controller
{
    // Reusable function definition
    private function getRiskRegister($riskId = null, $riskTreatment = null, $evalutionDate = null)
    {
        return DB::table('risk_master_table as r')
            ->join('risk_master_table_vs_category_table as rvc', 'r.risk_id', '=', 'rvc.risk_id')
            ->join('category_table as c', 'rvc.category_id', '=', 'c.category_id')
            ->join('owner_table as o', 'r.owner_id', '=', 'o.owner_role_id')
            ->join('risk_master_table_vs_threat_agent_table as rvt', 'r.risk_id', '=', 'rvt.risk_id')
            ->join('threat_agent_table as t', 'rvt.threat_agent_id', '=', 't.threat_agent_id')
            ->leftJoin('risk_assessment_details_table as rad', 'r.risk_id', '=', 'rad.risk_id')
            ->leftJoin('risk_assessment_master_table as ra', 'rad.risk_assessment_id', '=', 'ra.risk_assessment_id')
            ->join('risk_inherent_table as ri', 'r.risk_inherent_id', '=', 'ri.risk_inherent_id')
            ->join('risk_appetite_table as app', 'ri.risk_appetite_id', '=', 'app.risk_appetite_id')
            ->leftJoin('risk_treatment_options_table as rt', 'rad.risk_treatment_id', '=', 'rt.risk_treatment_id')
            ->join('risk_vs_control_table as rvco', 'r.risk_id', '=', 'rvco.risk_id')
            ->join('control_master_table as co', 'rvco.control_id', '=', 'co.control_id')
            ->join('owner_table as ow', 'co.owner_id', '=', 'ow.owner_role_id')
            ->leftJoin(DB::raw('(
                SELECT 
                    control_id, 
                    control_implementation_status
                FROM 
                    control_assessment_details_table as cad1
                WHERE 
                    id IN (
                        SELECT MAX(id)
                        FROM control_assessment_details_table
                        GROUP BY control_id
                    )
            ) as latest_status'), 'co.control_id', '=', 'latest_status.control_id')
            ->select(
                'r.risk_id',
                'r.risk_description',
                DB::raw('GROUP_CONCAT(DISTINCT CONCAT("<span>", c.category_name, "</span><br>") SEPARATOR "") as categories'),
                'o.owner_name',
                DB::raw('GROUP_CONCAT(DISTINCT CONCAT("<span>", t.threat_agent_name, "</span><br>") SEPARATOR "") as agents'),
                'ra.risk_assessment_description',
                'ra.risk_assessment_start_date',
                'ri.risk_inherent_likelihood',
                'ri.risk_inherent_impact',
                'ri.risk_inherent_score',
                'rt.risk_treatment_name',
                'rt.risk_treatment_description',
                'app.risk_appetite_name',
                'app.risk_appetite_color as appetite_color',
                DB::raw("GROUP_CONCAT(DISTINCT CONCAT('<a href=\"/control-identification-table/', co.control_id, '\"><span>', co.control_id, ' - ', ow.owner_name, '</span></a><br>') SEPARATOR '') as control_owner"),
                DB::raw('GROUP_CONCAT(
                    DISTINCT CONCAT("<span>", 
                        IF(
                            latest_status.control_implementation_status IS NOT NULL, 
                            CONCAT(co.control_id, " - ", latest_status.control_implementation_status), 
                            CONCAT(co.control_id, " - ", "not implemented")
                        ), 
                        "</span><br>"
                    ) SEPARATOR "") as status'),
                'rad.corrective_action_due_date',
                'rad.risk_finding_description',
                'rad.risk_likelihood',
                'rad.risk_impact',
                'rad.risk_score',
                'rad.risk_appetite',
                'rad.risk_appetite_color',
                'rad.preventive_action',
                'rad.lesson_learned',
                'rad.remarks',
                DB::raw('(
                    SELECT MIN(ra1.risk_assessment_start_date) 
                    FROM risk_assessment_master_table as ra1
                    LEFT JOIN risk_assessment_details_table as rad1 ON ra1.risk_assessment_id = rad1.risk_assessment_id
                    WHERE rad1.risk_id = r.risk_id
                ) as date_of_risk_analysis'),
                DB::raw('(
                    SELECT MAX(ra2.risk_assessment_start_date) 
                    FROM risk_assessment_master_table as ra2
                    LEFT JOIN risk_assessment_details_table as rad2 ON ra2.risk_assessment_id = rad2.risk_assessment_id
                    WHERE rad2.risk_id = r.risk_id
                ) as last_evaluation_date')
            )
            ->where(function ($query) {
                $query->where('ra.risk_assessment_start_date', function ($query) {
                    $query->select(DB::raw('MAX(ra3.risk_assessment_start_date)'))
                        ->from('risk_assessment_master_table as ra3')
                        ->leftJoin('risk_assessment_details_table as rad3', 'ra3.risk_assessment_id', '=', 'rad3.risk_assessment_id')
                        ->whereColumn('rad3.risk_id', 'r.risk_id');
                })
                    ->orWhereNull('ra.risk_assessment_start_date');
            })
            ->when($riskId, function ($query, $riskId) {
                $query->where('r.risk_id', $riskId);
            })
            ->when($riskTreatment, function ($query, $riskTreatment) {
                $query->where('rt.risk_treatment_id', $riskTreatment);
            })
            ->when($evalutionDate, function ($query) use ($evalutionDate) {
                return $query->WhereDate('risk_assessment_start_date', '<=', $evalutionDate);
            })
            ->groupBy(
                'r.risk_id',
                'o.owner_name',
                'r.risk_description',
                'ra.risk_assessment_description',
                'ra.risk_assessment_start_date',
                'ri.risk_inherent_likelihood',
                'ri.risk_inherent_impact',
                'ri.risk_inherent_score',
                'app.risk_appetite_name',
                'app.risk_appetite_color',
                'rt.risk_treatment_name',
                'rt.risk_treatment_description',
                'rad.corrective_action_due_date',
                'rad.risk_finding_description',
                'rad.risk_appetite',
                'rad.risk_appetite_color',
                'rad.risk_likelihood',
                'rad.risk_impact',
                'rad.risk_score',
                'rad.preventive_action',
                'rad.lesson_learned', 
                'rad.remarks'
                
            )
            ->get();
    }

    public function riskregister(Request $request)
    {

        $riskId = $request->input('risk') ?? null;
        $riskTreatment = $request->input('riskTreatment') ?? null;
        $evalutionDate = $request->input('evalutionDate') ?? null;

        $riskRegister = $this->getRiskRegister($riskId, $riskTreatment, $evalutionDate);
        


        $riskTreatments = RiskTreatment::select('risk_treatment_id', 'risk_treatment_name')
            ->get();

        $risks = Risk::select('risk_id', 'risk_name')
            ->get();

        $path = "4-Process/18-Reporting/2-MISReporting";

        if (request()->has('pdf')) {
            // Increase PCRE backtrack limit
            ini_set("pcre.backtrack_limit", "5000000");

            $mpdf = new Mpdf(['orientation' => 'L']);

            // Get the HTML content
            $html = view("{$path}/11-RiskRegisterPDF", compact('riskRegister'))->render();

            // Split HTML into smaller chunks (e.g. 500KB each)
            $chunks = str_split($html, 500000);

            // Write HTML chunks separately
            foreach ($chunks as $chunk) {
                $mpdf->WriteHTML($chunk);
            }

            // Set the headers to prompt the file download
            return response($mpdf->Output("Risk-Register.pdf", 'D'))
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'attachment; filename="' . "Risk-Register.pdf" . '"');
        } else {
            // return $riskRegister;
            return view("4-Process/18-Reporting/2-MISReporting/11-RiskRegisterTwo", compact('riskRegister', 'risks', 'riskTreatments'));
        }
    }

    public function getRiskRegisterExcel(Request $request)
    {
        // return $request;
        $riskId = request('risk');
        $riskTreatment = request('riskTreatment');
        $evalutionDate = request('evalutionDate');

        $data = $this->getRiskRegister($riskId, $riskTreatment, $evalutionDate);

        $filePath = storage_path('app/public/reports/Cybersecurity-Risk-Register.xlsx');
        $outputFilePath = storage_path('app/public/reports/Cybersecurity-Risk-Register-Updated.xlsx');

        // Copy the template file to a new file for output
        copy($filePath, $outputFilePath);

        // Load the spreadsheet from the output file
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($outputFilePath);
        $sheet = $spreadsheet->getActiveSheet();

        // Define the headers and their corresponding data keys
        $headers = [
            'B' => 'risk_id',
            'C' => 'categories',
            'D' => 'owner_name',
            'E' => 'risk_assessment_start_date', // Empty column Date of risk identification = Risk Assessment Date Master
            'F' => 'risk_description',
            'G' => 'remarks', // Empty column Risk Assessment Remarks from finding
            'H' => 'agents',
            'I' => 'risk_assessment_description',
            'J' => 'date_of_risk_analysis',
            'K' => 'risk_inherent_likelihood',
            'L' => 'risk_inherent_impact',
            'M' => 'risk_appetite_name',
            'N' => '', // Empty column Risk Score from finding
            'O' => 'risk_treatment_name',
            'P' => 'risk_treatment_description',
            'Q' => 'control_owner',
            'R' => 'status',
            'S' => 'corrective_action_due_date',
            'T' => 'risk_finding_description',
            'U' => 'risk_likelihood',
            'V' => 'risk_impact',
            'W' => 'risk_appetite
            ',
            'X' => 'preventive_action',
            'Y' => 'last_evaluation_date',
            'Z' => 'lesson_learned',
        ];

        $startingRow = 11;

        // Loop through each data row and fill the spreadsheet
        foreach ($data as $rowData) {
            foreach ($headers as $column => $key) {
                $cellCoordinate = "{$column}{$startingRow}";

                // If the key is empty, leave the cell blank
                if ($key === '') {
                    $sheet->setCellValue($cellCoordinate, '');
                } else {
                    // Some fields may contain HTML, so strip tags for Excel output
                    $value = $rowData->$key ?? '';
                    if (in_array($key, ['categories', 'agents', 'control_owner', 'status'])) {
                        // Replace <br> and <br/> tags with newlines for Excel, then strip other tags
                        $value = preg_replace('/<br\s*\/?>/i', "\n", $value);
                        $value = strip_tags($value);
                    }
                    $sheet->setCellValue($cellCoordinate, $value);
                }

                // Set font and alignment
                $sheet->getStyle($cellCoordinate)
                    ->getFont()->setName('DIN Next LT Arabic Light')->setSize(12);

                $horizontalAlign = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;
                $verticalAlign = \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER;

                $sheet->getStyle($cellCoordinate)
                    ->getAlignment()
                    ->setHorizontal($horizontalAlign)
                    ->setVertical($verticalAlign)
                    ->setWrapText(true);

                // Add black border to the cell
                $sheet->getStyle($cellCoordinate)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN)
                    ->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));

                // Set column to auto width according to content
                $sheet->getColumnDimension($column)->setAutoSize(true);

                // Set row height to auto (0) so it adjusts to content
                $sheet->getRowDimension($startingRow)->setRowHeight(-1);
            }
            $startingRow++;
        }

        // Save the updated spreadsheet
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save($outputFilePath);

        // Return the file as a download and delete after sending
        return response()->download($outputFilePath)->deleteFileAfterSend(true);
    }
}
