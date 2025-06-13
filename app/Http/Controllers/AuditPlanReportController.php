<?php

namespace App\Http\Controllers;

use App\Models\AuditPlan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Mpdf\Mpdf;

class AuditPlanReportController extends Controller
{
    public function index()
    {
        $path = '4-Process/AuditPlanReport';
        $auditPlans = $this->getAuditPlanData();

        if (request()->has('pdf')) {
            $this->generatePdf($path, $auditPlans, 'Audit-Plan.pdf');
        } else {
            return view("{$path}/index", compact('auditPlans'));
        }
    }
    
    public function generateExcelReport(Request $request)
    {

        $auditPlans = $this->getAuditPlanData();

        $filePath = storage_path('app/public/reports/Audit-Plan-Template.xlsx');
        $outputFilePath = storage_path('app/public/reports/Audit-Plan-Template-Updated.xlsx');

        // Copy the template file to a new file for output
        copy($filePath, $outputFilePath);

        // Load the spreadsheet from the output file
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($outputFilePath);
        $sheet = $spreadsheet->getActiveSheet();

        // Define the headers and their corresponding data keys
        $headers = [
            'B' => 'type',
            'C' => 'audit_id',
            'D' => 'audit_name',
            'E' => 'auditor_organization', // Empty column Date of risk identification = Risk Assessment Date Master
            'F' => 'auditor',
            'G' => 'audit_type', // Empty column Risk Assessment Remarks from finding
            'H' => 'audit_scope',
            'I' => 'audit_methodology',
            'J' => 'audit_criteria',
            'K' => 'sampling',
            'L' => 'evidence_needed',
            'M' => 'duration_in_days',
            'N' => 'schedule',
            'O' => 'audit_plan_start_date',
            'P' => 'audit_plan_end_date',
            'Q' => 'cost',
            'R' => 'comment',
        ];

        $startingRow = 11;

        // Loop through each data row and fill the spreadsheet
        foreach ($auditPlans as $rowData) {

            foreach ($headers as $column => $key) {
                $cellCoordinate = "{$column}{$startingRow}";

                if ($key === 'type') {
                    $value = 'Audit';
                } else if ($key === 'duration_in_days') {
                    $value = "{$rowData[$key]} days";
                } else {
                    // For other keys, get the value from the row data
                    $value = $rowData[$key] ?? '';
                }

                $sheet->setCellValue($cellCoordinate, $value);

                // Set font and alignment
                $sheet->getStyle($cellCoordinate)
                    ->getFont()
                    ->setName('DIN Next LT Arabic Light')
                    ->setSize(12)
                    ->getColor()
                    ->setRGB('000000'); // Set text color to black

                $horizontalAlign = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;
                $verticalAlign = \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP;

                $sheet->getStyle($cellCoordinate)
                    ->getAlignment()
                    ->setHorizontal($horizontalAlign)
                    ->setVertical($verticalAlign)
                    ->setWrapText(true);

                // Add black border to the cell
                $sheet->getStyle($cellCoordinate)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN)
                    ->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));

                // Set column width to approx 300px (Excel column width is not in pixels, but roughly 1 unit = 7 pixels)
                // 300px / 7 = ~43
                $sheet->getColumnDimension($column)->setWidth(21);

                // Set row height to auto (0) so it adjusts to content
                // $sheet->getRowDimension($startingRow)->setRowHeight(-1);
            }
            $startingRow++;
        }

        // Save the updated spreadsheet
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save($outputFilePath);

        // Return the file as a download and delete after sending
        return response()->download($outputFilePath)->deleteFileAfterSend(true);
    }

    private function getAuditPlanData()
    {
        return AuditPlan::with('auditor')->get()->map(function ($plan) {
            return [
                'audit_id' => $plan->audit_id,
                'audit_name' => $plan->audit_name,
                'auditor_id' => optional($plan->auditor)->auditor_id,
                'auditor_organization' => optional($plan->auditor)->auditor_organization,
                'auditor' => trim(optional($plan->auditor)->auditor_first_name . ' ' . optional($plan->auditor)->auditor_last_name),
                'audit_type' => $plan->audit_type,
                'audit_scope' => $plan->audit_scope,
                'audit_methodology' => $plan->audit_methodology,
                'audit_criteria' => $plan->audit_criteria,
                'sampling' => $plan->sampling,
                'evidence_needed' => $plan->evidence_needed,
                'schedule' => $plan->schedule,
                'audit_plan_start_date' => $plan->audit_plan_start_date,
                'audit_plan_end_date' => $plan->audit_plan_end_date,
                'cost' => $plan->cost,
                'comment' => $plan->comment,
                'duration_in_days' => Carbon::parse($plan->audit_plan_end_date)->diffInDays(Carbon::parse($plan->audit_plan_start_date)),
            ];
        });
    }

    private function generatePdf(string $path, Collection $report, string $reportName)
    {
        // Increase PCRE backtrack limit
        ini_set("pcre.backtrack_limit", "5000000");

        $mpdf = new Mpdf([
            'orientation' => 'L',
            'margin_top' => 0,
            'margin_bottom' => 0,
            'margin_left' => 0,
            'margin_right' => 0,
        ]);

        // Get the HTML content
        $html = view("{$path}/pdf", compact('report'))->render();

        // Split HTML into smaller chunks (e.g. 500KB each)
        $chunks = str_split($html, 500000);

        // Write HTML chunks separately
        foreach ($chunks as $chunk) {
            $mpdf->WriteHTML($chunk);
        }

        // Set the headers to prompt the file download
        return response($mpdf->Output($reportName, 'D'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="' . $reportName . '"');
    }
}
