<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class RegulatoryExcelReportController extends Controller
{

    private function _formatStatusText(string $status)
    {

        switch ($status) {
            case 'Partially Implemented':
                return  "مطبق جزئيًا  - Partially Implemented";
            case 'Implemented':
                return  "مطبق كليًا  - Implemented";
            case 'Not Implemented':
                return  "غير مطبق  - Not Implemented";
            case 'Not Applicable':
                return  "لاينطبق - Not Applicable";
            default:
                return "_";
        }

        return $formattedText;
    }

    public function downloadPdfReport()
    {
        $controlAssessmentId = request('controlAssessmentId');
        $eccreport = $this->getReport("NCA-ECC-2018", $controlAssessmentId);
        // $eccreport = $data->toArray();
        // return $eccreport;

        $mpdf = new Mpdf();
        $html = view('4-Process/19-NCAReporting/1-NcaEccReportDownload', compact('eccreport'))->render();
        $mpdf->WriteHTML($html);
        return response($mpdf->Output('', 'S'))->header('Content-Type', 'application/pdf');
    }

    public function ccc()
    {
        $controlAssessmentId = request('controlAssessmentId');
        $cloudControlType = request('cloudControlType');
        $eccreport =  $this->getReport("NCA-CCC-2020", $controlAssessmentId, $cloudControlType);

        // View report
        // $htmlContent = view('4-Process/19-NCAReporting/1-NcaCccReportPdf', compact('eccreport', 'controlAssessmentId', 'cloudControlType'))->render();

        // PDF Template
        $report =  $this->getReport("NCA-TCC-2021", "CA006");
        // return $report;


        $htmlContent = view('pdf.tcc.index', compact('report'))->render();
        // return $htmlContent;

        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'autoScriptToLang' => true,
            'autoLangToFont' => true,
            'orientation' => 'L', // Landscape orientation
            'format' => 'A4',     // Page size (A4, A3, etc.)
            'margin_left' => 2,  // Left margin
            'margin_right' => 2, // Right margin
            'margin_top' => 2,   // Top margin
            'margin_bottom' => 2, // Bottom margin
        ]);

        $mpdf->WriteHTML($htmlContent);

        $outputFilePath = storage_path('app/NCA-CCC-Reportv2.pdf');
        $mpdf->Output($outputFilePath, \Mpdf\Output\Destination::FILE);

        return response()->download($outputFilePath)->deleteFileAfterSend(true);



        // return view('4-Process/19-NCAReporting/1-NcaCccReportUpdated', compact('eccreport', 'controlAssessmentId', 'cloudControlType'));
        return view('pdf.nca-ccc-cst-pdf', compact('report', 'controlAssessmentId', 'cloudControlType'));
    }

    public function downloadCccExcelReport()
    {
        $controlAssessmentId = request('controlAssessmentId');
        $cloudControlType = request('cloudControlType');
        $template = "NCA-CCC-CST-Report-Template.xlsx";
        $outputFileName = "NCA-CCC-CST-Report-Updated.xlsx";
        $startingRow = 8;
        $iterationCount = 0;

        $headers = [
            'I' => 'status',
            'J' => 'remarks',
            'K' => 'corrective_action',
            'L' => 'corrective_action_due_date',
        ];
        // $skipRows = [10, 14, 16, 18, 20, 26, 28, 30, 32, 35, 38, 41, 46, 50];
        $parentControlMap = [
            8 => 'NCA-CCC-1-1-T-1-',
            10 => 'NCA-CCC-1-2-T-1-',
            14 => 'NCA-CCC-1-3-T-1-',
            16 => 'NCA-CCC-1-4-T-1-',
            18 => 'NCA-CCC-2-1-T-1-',
            20 => 'NCA-CCC-2-2-T-1-',
            26 => 'NCA-CCC-2-3-T-1-',
            28 => 'NCA-CCC-2-4-T-1-',
            30 => 'NCA-CCC-2-5-T-1-',
            32 => 'NCA-CCC-2-6-T-1-',
            35 => 'NCA-CCC-2-7-T-1-',
            38 => 'NCA-CCC-2-9-T-1-',
            41 => 'NCA-CCC-2-11-T-1-',
            46 => 'NCA-CCC-2-15-T-3-',
            50 => 'NCA-CCC-3-1-T-1-',
        ];

        if ($cloudControlType == 'csp') {
            $template = "NCA-CCC-CSP-Report-Template.xlsx";
            $outputFileName = "NCA-CCC-CSP-Report-Updated.xlsx";
            $startingRow = 7;
            $headers = [
                'I' => 'status',
                'M' => 'remarks',
                'N' => 'corrective_action',
                'O' => 'corrective_action_due_date',
            ];
            $skipRows = [9, 13, 15, 19, 23, 27, 30, 43, 56, 63, 68, 74, 77, 80, 83, 85, 94, 103, 107, 111, 118, 124, 132, 135];

            $parentControlMap = [
                7 => 'NCA-CCC-1-1-P-1-',
                9 => 'NCA-CCC-1-2-P-1-',
                13 => 'NCA-CCC-1-3-P-1-',
                15 => 'NCA-CCC-1-4-P-1-',
                19 => 'NCA-CCC-1-4-P-2-',
                23 => 'NCA-CCC-1-5-P-3-',
                27 => 'NCA-CCC-2-1-P-1-',
                30 => 'NCA-CCC-2-2-P-1-',
                43 => 'NCA-CCC-2-3-P-1-',
                56 => 'NCA-CCC-2-4-P-1-',
                63 => 'NCA-CCC-2-5-P-1-',
                68 => 'NCA-CCC-2-6-P-1-',
                74 => 'NCA-CCC-2-7-P-1-',
                77 => 'NCA-CCC-2-8-P-1-',
                80 => 'NCA-CCC-2-9-P-1-',
                83 => 'NCA-CCC-2-10-P-1-',
                85 => 'NCA-CCC-2-11-P-1-',
                94 => 'NCA-CCC-2-12-P-1-',
                103 => 'NCA-CCC-2-13-P-1-',
                107 => 'NCA-CCC-2-14-P-1-',
                111 => 'NCA-CCC-2-15-P-3-',
                118 => 'NCA-CCC-2-16-P-3-',
                124 => 'NCA-CCC-2-17-P-3-',
                132 => 'NCA-CCC-3-1-P-1-',
                135 => 'NCA-CCC-4-1-P-1-',

            ];
        }

        $data = $this->getReport("NCA-CCC-2020", $controlAssessmentId, $cloudControlType);

        // return $data;

        $filePath = storage_path("app/public/reports/{$template}");
        $outputFilePath = storage_path("app/public/reports/{$outputFileName}");

        copy($filePath, $outputFilePath);

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();


        // Loop through each data row
        foreach ($data as $rowData) {


            // Set values in the appropriate cells
            foreach ($headers as $column => $key) {

                // Skiping parent control row
                // if (in_array($startingRow, $skipRows)) {
                //     $startingRow++;
                // }

                $cellCoordinate = "{$column}{$startingRow}";
                $status = $this->_formatStatusText($rowData->status);

                // return $status;

                if (array_key_exists($startingRow, $parentControlMap)) {

                    $parentControlId = $parentControlMap[$startingRow];
                    $parentStatus = getParentStatus($data, $parentControlId, false);

                    // Set parent row values
                    $sheet->setCellValue("I{$startingRow}", $parentStatus);
                    $startingRow++;

                    // Set child row values
                    $sheet->setCellValue("I{$startingRow}", $status);
                } else {
                    $sheet->setCellValue("I{$startingRow}", $status);
                }

                if ($cloudControlType == 'csp') {
                    $sheet->setCellValue("M{$startingRow}", $rowData->remarks);
                    $sheet->setCellValue("N{$startingRow}", $rowData->corrective_action);
                    $sheet->setCellValue("O{$startingRow}", $rowData->corrective_action_due_date);
                } else {

                    $sheet->setCellValue("J{$startingRow}", $rowData->remarks);
                    $sheet->setCellValue("K{$startingRow}", $rowData->corrective_action);
                    $sheet->setCellValue("L{$startingRow}", $rowData->corrective_action_due_date);
                }

                // $sheet->setCellValue($cellCoordinate, $rowData->$key);

                $sheet->getStyle($cellCoordinate)
                    ->getFont()->setName('DIN Next LT Arabic Light')->setSize(12);

                $horizontalAlign = Alignment::HORIZONTAL_CENTER;
                $verticalAlign = Alignment::VERTICAL_CENTER;

                $sheet->getStyle($cellCoordinate)
                    ->getAlignment()
                    ->setHorizontal($horizontalAlign)
                    ->setVertical($verticalAlign)
                    ->setWrapText(true);
            }

            // Move to the next row
            $startingRow++;
            $iterationCount++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($outputFilePath);
        return response()->download($outputFilePath)->deleteFileAfterSend(true);

        // return response()->json(['message' => 'File updated successfully.']);
    }

    public function ecc()
    {

        $controlAssessmentId = request('controlAssessmentId');
        $data = $this->getReport("NCA-ECC-2018", $controlAssessmentId);


        $filePath = storage_path('app/public/reports/NCA-ECC-Report-Template-Full.xlsx');
        $outputFilePath = storage_path('app/public/reports/NCA-ECC-Report-Updated.xlsx');

        copy($filePath, $outputFilePath);

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();

        $headers = [
            'D' => 'complaince_level_main',
            'F' => 'complaince_level_sub',
            'G' => 'remarks',
            'H' => 'expected_date',
            'I' => 'corrective_action_due_date'
        ];

        $startingRow = 8;
        $iterationCount = 0;


        // Loop through each data row
        foreach ($data as $rowData) {


            // Set values in the appropriate cells
            foreach ($headers as $column => $key) {

                $cellCoordinate = "{$column}{$startingRow}"; // D8, F8, G8, etc.
                $status = "_";
                switch ($rowData->status) {
                    case 'Partially Implemented':
                        $status = "مطبق جزئيًا  - Partially Implemented";
                        break;
                    case 'Implemented':
                        $status = "مطبق كليًا  - Implemented";
                        break;
                    case 'Not Implemented':
                        $status = "غير مطبق - Not Implemented";
                        break;
                }

                $parentControlMap = [
                    46 => 'NCA-ECC-1-5-3-',
                    59 => 'NCA-ECC-1-6-2-',
                    62 => 'NCA-ECC-1-6-3-',
                    94 => 'NCA-ECC-1-9-3-',
                    97 => 'NCA-ECC-1-9-4-',
                    110 => 'NCA-ECC-1-10-3-',
                    115 => 'NCA-ECC-1-10-4-',
                    142 => 'NCA-ECC-2-2-3-',
                    157 => 'NCA-ECC-2-3-3-',
                    171 => 'NCA-ECC-2-4-3-',
                    186 => 'NCA-ECC-2-5-3-',
                    204 => 'NCA-ECC-2-6-3-',
                    218 => 'NCA-ECC-2-7-3-',
                    244 => 'NCA-ECC-2-9-3-',
                    257 => 'NCA-ECC-2-10-3-',
                    272 => 'NCA-ECC-2-11-3-',
                    284 => 'NCA-ECC-2-12-3-',
                    299 => 'NCA-ECC-2-13-3-',
                    314 => 'NCA-ECC-2-14-3-',
                    329 => 'NCA-ECC-2-15-3-',
                    346 => 'NCA-ECC-3-1-3-',
                    360 => 'NCA-ECC-4-1-2-',
                    364 => 'NCA-ECC-4-1-3-',
                    376 => 'NCA-ECC-4-2-3-',
                    391 => 'NCA-ECC-5-1-3-',
                ];

                // Check if the startingRow has a corresponding parentControlId
                if (array_key_exists($startingRow, $parentControlMap)) {
                    $parentControlId = $parentControlMap[$startingRow];
                    $parentStatus = getParentStatus($data, $parentControlId, false);

                    // Set parent row values
                    $sheet->setCellValue("D{$startingRow}", $parentStatus);
                    $sheet->setCellValue("F{$startingRow}", "_");
                    $startingRow++;

                    // Set child row values
                    $sheet->setCellValue("D{$startingRow}", "_");
                    $sheet->setCellValue("F{$startingRow}", $status);
                } else {
                    // Handle rows that are not in the parentControlMap
                    if ($rowData->control_level_title == 'Main') {
                        $sheet->setCellValue("D{$startingRow}", $status);
                        $sheet->setCellValue("F{$startingRow}", "_");
                    } else {
                        $sheet->setCellValue("D{$startingRow}", "_");
                        $sheet->setCellValue("F{$startingRow}", $status);
                    }
                }

                // Common row values
                $sheet->setCellValue("G{$startingRow}", $rowData->remarks);
                $sheet->setCellValue("H{$startingRow}", $rowData->corrective_action);
                $sheet->setCellValue("I{$startingRow}", $rowData->corrective_action_due_date);


                // Set common row values
                $sheet->setCellValue("G{$startingRow}", $rowData->remarks);
                $sheet->setCellValue("H{$startingRow}", $rowData->corrective_action);
                $sheet->setCellValue("I{$startingRow}", $rowData->corrective_action_due_date);

                $sheet->getStyle($cellCoordinate)
                    ->getFont()->setName('DIN Next LT Arabic Light')->setSize(12);

                $horizontalAlign = Alignment::HORIZONTAL_CENTER;
                $verticalAlign = Alignment::VERTICAL_CENTER;

                $sheet->getStyle($cellCoordinate)
                    ->getAlignment()
                    ->setHorizontal($horizontalAlign)
                    ->setVertical($verticalAlign)
                    ->setWrapText(true);
            }

            // Move to the next row
            $startingRow++;
            $iterationCount++;

            // Tracking the number of rows to skip after each domain entry due to static headers.
            if ($iterationCount === 3) {
                $startingRow = 17;
            } elseif ($iterationCount === 6) {
                $startingRow = 26;
            } elseif ($iterationCount === 10) {
                $startingRow = 36;
            } elseif ($iterationCount === 12) {
                $startingRow = 44;
            } elseif ($iterationCount === 19) {
                $startingRow = 58;
            } elseif ($iterationCount === 28) {
                $startingRow = 75;
            } elseif ($iterationCount === 30) {
                $startingRow = 83;
            } elseif ($iterationCount === 33) {
                $startingRow = 92;
            } elseif ($iterationCount === 41) {
                $startingRow = 108;
            } elseif ($iterationCount === 51) {
                $startingRow = 128;
            } elseif ($iterationCount === 57) {
                $startingRow = 140;
            } elseif ($iterationCount === 65) {
                $startingRow = 155;
            } elseif ($iterationCount === 72) {
                $startingRow = 169;
            } elseif ($iterationCount === 80) {
                $startingRow = 184;
            } elseif ($iterationCount === 91) {
                $startingRow = 202;
            } elseif ($iterationCount === 98) {
                $startingRow = 216;
            } elseif ($iterationCount === 104) {
                $startingRow = 229;
            } elseif ($iterationCount === 110) {
                $startingRow = 242;
            } elseif ($iterationCount === 116) {
                $startingRow = 255;
            } elseif ($iterationCount === 124) {
                $startingRow = 270;
            } elseif ($iterationCount === 129) {
                $startingRow = 282;
            } elseif ($iterationCount === 137) {
                $startingRow = 297;
            } elseif ($iterationCount === 145) {
                $startingRow = 312;
            } elseif ($iterationCount === 153) {
                $startingRow = 327;
            } elseif ($iterationCount === 161) {
                $startingRow = 344;
            } elseif ($iterationCount === 167) {
                $startingRow = 359;
            } elseif ($iterationCount === 174) {
                $startingRow = 374;
            } elseif ($iterationCount === 180) {
                $startingRow = 389;
            }
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($outputFilePath);
        return response()->download($outputFilePath)->deleteFileAfterSend(true);

        return response()->json(['message' => 'File updated successfully.']);
    }

    public function downloadEcc2024ExcelReport()
    {

        $controlAssessmentId = request('controlAssessmentId');
        $data = $this->getReport("NCA-ECC-2024", $controlAssessmentId);


        $filePath = storage_path('app/public/reports/NCA-ECC-2024-Report-Template-Full.xlsx');
        $outputFilePath = storage_path('app/public/reports/NCA-ECC-2024-Report-Updated.xlsx');

        copy($filePath, $outputFilePath);

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();

        $headers = [
            'D' => 'complaince_level_main',
            'F' => 'complaince_level_sub',
            'G' => 'remarks',
            'H' => 'expected_date',
            'I' => 'corrective_action_due_date'
        ];

        $startingRow = 8;
        $iterationCount = 0;

        // return $data;

        // Loop through each data row
        foreach ($data as $rowData) {


            // Set values in the appropriate cells
            foreach ($headers as $column => $key) {

                $cellCoordinate = "{$column}{$startingRow}"; // D8, F8, G8, etc.
                $status = "_";
                switch ($rowData->status) {
                    case 'Partially Implemented':
                        $status = "مطبق جزئيًا  - Partially Implemented";
                        break;
                    case 'Implemented':
                        $status = "مطبق كليًا  - Implemented";
                        break;
                    case 'Not Implemented':
                        $status = "غير مطبق - Not Implemented";
                        break;
                }

                $parentControlMap = [
                    46 => 'NCA-ECC2-1-5-3-',
                    59 => 'NCA-ECC2-1-6-2-',
                    62 => 'NCA-ECC2-1-6-3-',
                    94 => 'NCA-ECC2-1-9-3-',
                    97 => 'NCA-ECC2-1-9-4-',
                    110 => 'NCA-ECC2-1-10-3-',
                    115 => 'NCA-ECC2-1-10-4-',
                    142 => 'NCA-ECC2-2-2-3-',
                    157 => 'NCA-ECC2-2-3-3-', //
                    171 => 'NCA-ECC2-2-4-3-',
                    186 => 'NCA-ECC2-2-5-3-',
                    205 => 'NCA-ECC2-2-6-3-',
                    229 => 'NCA-ECC2-2-8-3-',
                    242 => 'NCA-ECC2-2-9-3-',
                    255 => 'NCA-ECC2-2-10-3-',
                    270 => 'NCA-ECC2-2-11-3-',
                    282 => 'NCA-ECC2-2-12-3-',
                    297 => 'NCA-ECC2-2-13-3-',
                    312 => 'NCA-ECC2-2-14-3-',
                    327 => 'NCA-ECC2-2-15-3-',
                    344 => 'NCA-ECC2-3-1-3-',
                    358 => 'NCA-ECC2-4-1-2-',
                    362 => 'NCA-ECC2-4-1-3-',
                    374 => 'NCA-ECC2-4-2-3-',
                ];

                // Check if the startingRow has a corresponding parentControlId
                if (array_key_exists($startingRow, $parentControlMap)) {
                    $parentControlId = $parentControlMap[$startingRow];
                    $parentStatus = getParentStatus($data, $parentControlId, false);

                    // Set parent row values
                    $sheet->setCellValue("D{$startingRow}", $parentStatus);
                    $sheet->setCellValue("F{$startingRow}", "_");
                    $startingRow++;

                    // Set child row values
                    $sheet->setCellValue("D{$startingRow}", "_");
                    $sheet->setCellValue("F{$startingRow}", $status);
                } else {
                    // Handle rows that are not in the parentControlMap
                    if ($rowData->control_level_title == 'Main') {
                        $sheet->setCellValue("D{$startingRow}", $status);
                        $sheet->setCellValue("F{$startingRow}", "_");
                    } else {
                        $sheet->setCellValue("D{$startingRow}", "_");
                        $sheet->setCellValue("F{$startingRow}", $status);
                    }
                }

                // Common row values
                // $sheet->setCellValue("G{$startingRow}", $rowData->remarks);
                // $sheet->setCellValue("H{$startingRow}", $rowData->corrective_action);
                // $sheet->setCellValue("I{$startingRow}", $rowData->corrective_action_due_date);


                // Set common row values
                $sheet->setCellValue("G{$startingRow}", $rowData->remarks . ' ' . $rowData->control_id);
                $sheet->setCellValue("H{$startingRow}", $rowData->corrective_action);
                $sheet->setCellValue("I{$startingRow}", $rowData->corrective_action_due_date);

                $sheet->getStyle($cellCoordinate)
                    ->getFont()->setName('DIN Next LT Arabic Light')->setSize(12);

                $horizontalAlign = Alignment::HORIZONTAL_CENTER;
                $verticalAlign = Alignment::VERTICAL_CENTER;

                $sheet->getStyle($cellCoordinate)
                    ->getAlignment()
                    ->setHorizontal($horizontalAlign)
                    ->setVertical($verticalAlign)
                    ->setWrapText(true);
            }

            // Move to the next row
            $startingRow++;
            $iterationCount++;

            // Tracking the number of rows to skip after each domain entry due to static headers.
            if ($iterationCount === 3) {
                $startingRow = 17;
            } elseif ($iterationCount === 6) {
                $startingRow = 26;
            } elseif ($iterationCount === 10) {
                $startingRow = 36;
            } elseif ($iterationCount === 12) {
                $startingRow = 44;
            } elseif ($iterationCount === 19) {
                $startingRow = 58;
            } elseif ($iterationCount === 28) {
                $startingRow = 75;
            } elseif ($iterationCount === 30) {
                $startingRow = 83;
            } elseif ($iterationCount === 33) {
                $startingRow = 92;
            } elseif ($iterationCount === 41) {
                $startingRow = 108;
            } elseif ($iterationCount === 51) {
                $startingRow = 128;
            } elseif ($iterationCount === 57) {
                $startingRow = 140;
            } elseif ($iterationCount === 65) { // Doubt // add 3
                $startingRow = 155;
            } elseif ($iterationCount === 72) {
                $startingRow = 169;
            } elseif ($iterationCount === 80) {
                $startingRow = 184;
            } elseif ($iterationCount === 92) {
                $startingRow = 203;
            } elseif ($iterationCount === 99) {
                $startingRow = 217;
            } elseif ($iterationCount === 103) {
                $startingRow = 227;
            } elseif ($iterationCount === 109) {
                $startingRow = 240;
            } elseif ($iterationCount === 115) {
                $startingRow = 253;
            } elseif ($iterationCount === 123) {
                $startingRow = 268;
            } elseif ($iterationCount === 128) {
                $startingRow = 280;
            } elseif ($iterationCount === 136) {
                $startingRow = 295;
            } elseif ($iterationCount === 144) {
                $startingRow = 310;
            } elseif ($iterationCount === 152) {
                $startingRow = 325;
            } elseif ($iterationCount === 160) {
                $startingRow = 342; // 3-1

            } elseif ($iterationCount === 166) {
                $startingRow = 357;
            } elseif ($iterationCount === 173) {
                $startingRow = 372;
            }
            // elseif ($iterationCount === 175) {
            //     $startingRow = 389;
            // }
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($outputFilePath);
        return response()->download($outputFilePath)->deleteFileAfterSend(true);

        return response()->json(['message' => 'File updated successfully.']);
    }

    public function downloadCsccExcelReport()
    {
        $controlAssessmentId = request('controlAssessmentId');
        $data = $this->getReport("NCA-CSCC-2019", $controlAssessmentId);


        $filePath = storage_path('app/public/reports/NCA-CSCC-Report-Template-Full.xlsx');
        $outputFilePath = storage_path('app/public/reports/NCA-CSCC-Report-Updated.xlsx');

        copy($filePath, $outputFilePath);

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();

        $headers = [
            'I' => 'complaince_level',
            'K' => 'remarks',
            'L' => 'corrective_action',
            'M' => 'expected_date',
        ];

        $startingRow = 6;
        $iterationCount = 0;


        // Loop through each data row
        foreach ($data as $rowData) {


            // Set values in the appropriate cells
            foreach ($headers as $column => $key) {

                $cellCoordinate = "{$column}{$startingRow}";
                $status = $this->_formatStatusText($rowData->status);


                $parentControlMap = [
                    7 => 'NCA-CSCC-1-2-1-',
                    10 => 'NCA-CSCC-1-3-1-',
                    13 => 'NCA-CSCC-1-3-2-',
                    20 => 'NCA-CSCC-1-5-1-',
                    23 => 'NCA-CSCC-2-1-1-',
                    26 => 'NCA-CSCC-2-2-1-',
                    36 => 'NCA-CSCC-2-3-1-',
                    45 => 'NCA-CSCC-2-4-1-',
                    55 => 'NCA-CSCC-2-5-1-',
                    58 => 'NCA-CSCC-2-6-1-',
                    64 => 'NCA-CSCC-2-7-1-',
                    68 => 'NCA-CSCC-2-8-1-',
                    73 => 'NCA-CSCC-2-9-1-',
                    78 => 'NCA-CSCC-2-10-1-',
                    82 => 'NCA-CSCC-2-11-1-',
                    89 => 'NCA-CSCC-2-12-1-',
                    95 => 'NCA-CSCC-2-13-3-',
                    101 => 'NCA-CSCC-3-1-1-',
                    106 => 'NCA-CSCC-4-1-1-',
                    109 => 'NCA-CSCC-4-2-1-',
                ];

                if (array_key_exists($startingRow, $parentControlMap)) {

                    $parentControlId = $parentControlMap[$startingRow];
                    $parentStatus = getParentStatus($data, $parentControlId, false);

                    // Set parent row values
                    $sheet->setCellValue("I{$startingRow}", $parentStatus);
                    $startingRow++;

                    // Set child row values
                    $sheet->setCellValue("I{$startingRow}", $status);
                } else {
                    $sheet->setCellValue("I{$startingRow}", $status);
                }


                $sheet->setCellValue("K{$startingRow}", $rowData->remarks);
                $sheet->setCellValue("L{$startingRow}", $rowData->corrective_action);
                $sheet->setCellValue("M{$startingRow}", $rowData->corrective_action_due_date);

                $sheet->getStyle($cellCoordinate)
                    ->getFont()->setName('DIN Next LT Arabic Light')->setSize(12);

                $horizontalAlign = Alignment::HORIZONTAL_CENTER;
                $verticalAlign = Alignment::VERTICAL_CENTER;

                $sheet->getStyle($cellCoordinate)
                    ->getAlignment()
                    ->setHorizontal($horizontalAlign)
                    ->setVertical($verticalAlign)
                    ->setWrapText(true);
            }

            // Move to the next row
            $startingRow++;
            $iterationCount++;

            // Tracking the number of rows to skip after each domain entry due to static headers.
            // if ($iterationCount === 3) {
            //     $startingRow = 17;
            // } 
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($outputFilePath);
        return response()->download($outputFilePath)->deleteFileAfterSend(true);

        return response()->json(['message' => 'File updated successfully.']);
    }

    public function downloadTccExcelReport()
    {
        $controlAssessmentId = request('controlAssessmentId');
        $template = "NCA-TCC-Report-Template.xlsx";
        $outputFileName = "NCA-TCC-Report-Updated.xlsx";
        $startingRow = 5;
        $iterationCount = 0;

        $headers = [
            'H' => 'status',
            'J' => 'remarks',
            'K' => 'corrective_action',
            'L' => 'corrective_action_due_date',
        ];

        $skipRows = [7, 11, 21, 23, 28, 35, 39, 42, 45, 47, 50, 53, 56, 62, 66];

        $parentControlMap = [
            5 => 'NCA-TCC-1-1-1-',
            7 => 'NCA-TCC-1-2-1-',
            11 => 'NCA-TCC-1-3-1-',
            21 => 'NCA-TCC-2-1-1-',
            23 => 'NCA-TCC-2-2-1-',
            28 => 'NCA-TCC-2-3-1-',
            34 => 'NCA-TCC-2-4-1-',
            39 => 'NCA-TCC-2-5-1-',
            42 => 'NCA-TCC-2-6-1-',
            45 => 'NCA-TCC-2-7-1-',
            47 => 'NCA-TCC-2-8-1-',
            50 => 'NCA-TCC-2-9-1-',
            53 => 'NCA-TCC-2-10-1-',
            56 => 'NCA-TCC-2-11-1-',
            62 => 'NCA-TCC-2-12-1-',
            66 => 'NCA-TCC-3-1-1-',
        ];


        $data = $this->getReport("NCA-TCC-2021", $controlAssessmentId);

        $filePath = storage_path("app/public/reports/{$template}");
        $outputFilePath = storage_path("app/public/reports/{$outputFileName}");

        copy($filePath, $outputFilePath);

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();

        // Loop through each data row
        foreach ($data as $rowData) {


            // Set values in the appropriate cells
            foreach ($headers as $column => $key) {

                $cellCoordinate = "{$column}{$startingRow}";
                $status = $this->_formatStatusText($rowData->status);


                if (array_key_exists($startingRow, $parentControlMap)) {

                    $parentControlId = $parentControlMap[$startingRow];
                    $parentStatus = getParentStatus($data, $parentControlId, false);

                    // Set parent row values
                    $sheet->setCellValue("H{$startingRow}", $parentStatus);
                    $startingRow++;

                    // Set child row values
                    $sheet->setCellValue("H{$startingRow}", $status);
                } else {
                    $sheet->setCellValue("H{$startingRow}", $status);
                }


                $sheet->setCellValue("J{$startingRow}", $rowData->remarks);
                $sheet->setCellValue("K{$startingRow}", $rowData->corrective_action);
                $sheet->setCellValue("L{$startingRow}", $rowData->corrective_action_due_date);

                // // Skiping parent control row
                // if (in_array($startingRow, $skipRows)) {
                //     $startingRow++;
                // }

                // $cellCoordinate = "{$column}{$startingRow}";


                // if ($key == 'status') {

                //     $status = $this->_formatStatusText($rowData->$key);
                //     // return $status;
                //     $sheet->setCellValue($cellCoordinate, $status);
                // } else {

                //     $sheet->setCellValue($cellCoordinate, $rowData->$key);
                // }

                $sheet->getStyle($cellCoordinate)
                    ->getFont()->setName('DIN Next LT Arabic Light')->setSize(12);

                $horizontalAlign = Alignment::HORIZONTAL_CENTER;
                $verticalAlign = Alignment::VERTICAL_CENTER;

                $sheet->getStyle($cellCoordinate)
                    ->getAlignment()
                    ->setHorizontal($horizontalAlign)
                    ->setVertical($verticalAlign)
                    ->setWrapText(true);
            }

            // Move to the next row
            $startingRow++;
            $iterationCount++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($outputFilePath);
        return response()->download($outputFilePath)->deleteFileAfterSend(true);
    }

    public function downloadOsmaccExcelReport()
    {
        $controlAssessmentId = request('controlAssessmentId');
        $template = "NCA-OSMACC-Report-Template.xlsx";
        $outputFileName = "NCA-OSMACC-Report-Updated.xlsx";
        $startingRow = 6;
        $iterationCount = 0;

        $headers = [
            'H' => 'status',
            'J' => 'remarks',
            'K' => 'corrective_action',
            'L' => 'corrective_action_due_date',
        ];

        $skipRows = [7, 11, 14, 24, 35, 40, 44, 51];

        $parentControlMap = [
            7 => 'NCA-OSMACC-1-2-1-',
            11 => 'NCA-OSMACC-1-3-1-',
            14 => 'NCA-OSMACC-1-4-1-',
            24 => 'NCA-OSMACC-2-2-1-',
            35 => 'NCA-OSMACC-2-3-1-',
            40 => 'NCA-OSMACC-2-4-1-',
            44 => 'NCA-OSMACC-2-6-1-',
            51 => 'NCA-OSMACC-3-1-2-',
        ];

        $data = $this->getReport("NCA-OSMACC-2021", $controlAssessmentId);

        $filePath = storage_path("app/public/reports/{$template}");
        $outputFilePath = storage_path("app/public/reports/{$outputFileName}");

        copy($filePath, $outputFilePath);

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();

        // Loop through each data row
        foreach ($data as $rowData) {


            // Set values in the appropriate cells
            foreach ($headers as $column => $key) {

                $cellCoordinate = "{$column}{$startingRow}";
                $status = $this->_formatStatusText($rowData->status);

                if (array_key_exists($startingRow, $parentControlMap)) {

                    $parentControlId = $parentControlMap[$startingRow];
                    $parentStatus = getParentStatus($data, $parentControlId, false);

                    // Set parent row values
                    $sheet->setCellValue("H{$startingRow}", $parentStatus);
                    $startingRow++;

                    // Set child row values
                    $sheet->setCellValue("H{$startingRow}", $status);
                } else {
                    $sheet->setCellValue("H{$startingRow}", $status);
                }


                $sheet->setCellValue("J{$startingRow}", $rowData->remarks);
                $sheet->setCellValue("K{$startingRow}", $rowData->corrective_action);
                $sheet->setCellValue("L{$startingRow}", $rowData->corrective_action_due_date);

                // Skiping parent control row
                // if (in_array($startingRow, $skipRows)) {
                //     $startingRow++;
                // }

                // $cellCoordinate = "{$column}{$startingRow}";


                // if ($key == 'status') {

                //     $status = $this->_formatStatusText($rowData->$key);
                //     // return $status;
                //     $sheet->setCellValue($cellCoordinate, $status);
                // } else {

                //     $sheet->setCellValue($cellCoordinate, $rowData->$key);
                // }


                $sheet->getStyle($cellCoordinate)
                    ->getFont()->setName('DIN Next LT Arabic Light')->setSize(12);

                $horizontalAlign = Alignment::HORIZONTAL_CENTER;
                $verticalAlign = Alignment::VERTICAL_CENTER;

                $sheet->getStyle($cellCoordinate)
                    ->getAlignment()
                    ->setHorizontal($horizontalAlign)
                    ->setVertical($verticalAlign)
                    ->setWrapText(true);
            }

            // Move to the next row
            $startingRow++;
            $iterationCount++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($outputFilePath);
        return response()->download($outputFilePath)->deleteFileAfterSend(true);
    }

    public function downloadDccExcelReport()
    {
        $controlAssessmentId = request('controlAssessmentId');
        $template = "NCA-DCC-Report-Template.xlsx";
        $outputFileName = "NCA-DCC-Report-Updated.xlsx";
        $startingRow = 5;
        $iterationCount = 0;

        $headers = [
            'H' => 'status',
            'J' => 'remarks',
            'K' => 'corrective_action',
            'L' => 'corrective_action_due_date',
        ];

        $skipRows = [7, 10, 18, 23, 28, 31, 36, 39, 48, 55];
        $parentControlMap = [
            7 => 'NCA-DCC-1-2-1-',
            10 => 'NCA-DCC-1-3-1-',
            18 => 'NCA-DCC-2-1-1-',
            23 => 'NCA-DCC-2-2-1-',
            28 => 'NCA-DCC-2-3-1-',
            31 => 'NCA-DCC-2-4-1-',
            36 => 'NCA-DCC-2-5-1-',
            39 => 'NCA-DCC-2-6-1-',
            48 => 'NCA-DCC-2-7-3-',
            55 => 'NCA-DCC-3-1-1-',
            62 => 'NCA-DCC-3-1-2-',
        ];

        $data = $this->getReport("NCA-DCC-2022", $controlAssessmentId);


        $filePath = storage_path("app/public/reports/{$template}");
        $outputFilePath = storage_path("app/public/reports/{$outputFileName}");

        copy($filePath, $outputFilePath);

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();

        foreach ($data as $rowData) {

            foreach ($headers as $column => $key) {

                $cellCoordinate = "{$column}{$startingRow}";
                $status = $this->_formatStatusText($rowData->status);

                if (array_key_exists($startingRow, $parentControlMap)) {

                    $parentControlId = $parentControlMap[$startingRow];
                    $parentStatus = getParentStatus($data, $parentControlId, false);

                    // Set parent row values
                    $sheet->setCellValue("H{$startingRow}", $parentStatus);
                    $startingRow++;

                    // Set child row values
                    $sheet->setCellValue("H{$startingRow}", $status);
                } else {
                    $sheet->setCellValue("H{$startingRow}", $status);
                }


                $sheet->setCellValue("J{$startingRow}", $rowData->remarks);
                $sheet->setCellValue("K{$startingRow}", $rowData->corrective_action);
                $sheet->setCellValue("L{$startingRow}", $rowData->corrective_action_due_date);

                // Skiping parent control row
                // if (in_array($startingRow, $skipRows)) {
                //     $startingRow++;
                // }

                // $cellCoordinate = "{$column}{$startingRow}";


                // if ($key == 'status') {

                //     $status = $this->_formatStatusText($rowData->$key);
                //     // return $status;
                //     $sheet->setCellValue($cellCoordinate, $status);
                // } else {

                //     $sheet->setCellValue($cellCoordinate, $rowData->$key);
                // }

                $sheet->getStyle($cellCoordinate)
                    ->getFont()->setName('DIN Next LT Arabic Light')->setSize(12);

                $horizontalAlign = Alignment::HORIZONTAL_CENTER;
                $verticalAlign = Alignment::VERTICAL_CENTER;

                $sheet->getStyle($cellCoordinate)
                    ->getAlignment()
                    ->setHorizontal($horizontalAlign)
                    ->setVertical($verticalAlign)
                    ->setWrapText(true);
            }

            // Move to the next row
            $startingRow++;
            $iterationCount++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($outputFilePath);
        return response()->download($outputFilePath)->deleteFileAfterSend(true);
    }

    public function sama()
    {

        $controlAssessmentId = request('controlAssessmentId');
        $data = $this->getReport("SAMA-CSF-2017", $controlAssessmentId);


        $filePath = storage_path('app/public/reports/SAMA-CSF-Report-Template-Full.xlsx');
        $outputFilePath = storage_path('app/public/reports/SAMA-CSF-Report-Updated.xlsx');

        copy($filePath, $outputFilePath);

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();

        $headers = [
            'D' => 'complaince_level_main',
            'F' => 'complaince_level_sub',
            'G' => 'remarks',
            'H' => 'expected_date',
            'I' => 'corrective_action_due_date'
        ];

        $startingRow = 9;
        $iterationCount = 0;


        // Loop through each data row
        foreach ($data as $rowData) {


            // Set values in the appropriate cells
            foreach ($headers as $column => $key) {

                $cellCoordinate = "{$column}{$startingRow}"; // D8, F8, G8, etc.
                $status = "_";

                switch ($rowData->status) {
                    case 'Partially Implemented':
                        $status = "Partially Implemented";
                        break;
                    case 'Implemented':
                        $status = "Implemented";
                        break;
                    case 'Not Implemented':
                        $status = "Not Implemented";
                        break;
                }

                $parentControlMap = [
                    11 => 'SAMA-CSF-3.1.1.3.',
                ];

                // Check if the startingRow has a corresponding parentControlId
                if (array_key_exists($startingRow, $parentControlMap)) {
                    $parentControlId = $parentControlMap[$startingRow];
                    $parentStatus = getParentStatus($data, $parentControlId, false);

                    // Set parent row values
                    $sheet->setCellValue("D{$startingRow}", $parentStatus);
                    $sheet->setCellValue("F{$startingRow}", "_");
                    $startingRow++;

                    // Set child row values
                    $sheet->setCellValue("D{$startingRow}", "_");
                    $sheet->setCellValue("F{$startingRow}", $status);
                } else {
                    // Handle rows that are not in the parentControlMap
                    if ($rowData->control_level_title == 'Main') {
                        $sheet->setCellValue("D{$startingRow}", $status);
                        $sheet->setCellValue("F{$startingRow}", "_");
                    } else {
                        $sheet->setCellValue("D{$startingRow}", "_");
                        $sheet->setCellValue("F{$startingRow}", $status);
                    }
                }

                // Common row values
                // $sheet->setCellValue("G{$startingRow}", $rowData->remarks);
                // $sheet->setCellValue("H{$startingRow}", $rowData->corrective_action);
                // $sheet->setCellValue("I{$startingRow}", $rowData->corrective_action_due_date);


                // Set common row values
                $sheet->setCellValue("G{$startingRow}", $rowData->remarks);
                $sheet->setCellValue("H{$startingRow}", $rowData->corrective_action);
                $sheet->setCellValue("I{$startingRow}", $rowData->corrective_action_due_date);

                $sheet->getStyle($cellCoordinate)
                    ->getFont()->setName('DIN Next LT Arabic Light')->setSize(12);

                $horizontalAlign = Alignment::HORIZONTAL_CENTER;
                $verticalAlign = Alignment::VERTICAL_CENTER;

                $sheet->getStyle($cellCoordinate)
                    ->getAlignment()
                    ->setHorizontal($horizontalAlign)
                    ->setVertical($verticalAlign)
                    ->setWrapText(true);
            }

            // Move to the next row
            $startingRow++;
            $iterationCount++;

            // Tracking the number of rows to skip after each domain entry due to static headers.
            if ($iterationCount === 17) {
                $startingRow = 36;
            } 
            // elseif ($iterationCount === 6) {
            //     $startingRow = 26;
            // } elseif ($iterationCount === 10) {
            //     $startingRow = 36;
            // } elseif ($iterationCount === 12) {
            //     $startingRow = 44;
            // } elseif ($iterationCount === 19) {
            //     $startingRow = 58;
            // } elseif ($iterationCount === 28) {
            //     $startingRow = 75;
            // } elseif ($iterationCount === 30) {
            //     $startingRow = 83;
            // } elseif ($iterationCount === 33) {
            //     $startingRow = 92;
            // } elseif ($iterationCount === 41) {
            //     $startingRow = 108;
            // } elseif ($iterationCount === 51) {
            //     $startingRow = 128;
            // } elseif ($iterationCount === 57) {
            //     $startingRow = 140;
            // } elseif ($iterationCount === 65) {
            //     $startingRow = 155;
            // } elseif ($iterationCount === 72) {
            //     $startingRow = 169;
            // } elseif ($iterationCount === 80) {
            //     $startingRow = 184;
            // } elseif ($iterationCount === 91) {
            //     $startingRow = 202;
            // } elseif ($iterationCount === 98) {
            //     $startingRow = 216;
            // } elseif ($iterationCount === 104) {
            //     $startingRow = 229;
            // } elseif ($iterationCount === 110) {
            //     $startingRow = 242;
            // } elseif ($iterationCount === 116) {
            //     $startingRow = 255;
            // } elseif ($iterationCount === 124) {
            //     $startingRow = 270;
            // } elseif ($iterationCount === 129) {
            //     $startingRow = 282;
            // } elseif ($iterationCount === 137) {
            //     $startingRow = 297;
            // } elseif ($iterationCount === 145) {
            //     $startingRow = 312;
            // } elseif ($iterationCount === 153) {
            //     $startingRow = 327;
            // } elseif ($iterationCount === 161) {
            //     $startingRow = 344;
            // } elseif ($iterationCount === 167) {
            //     $startingRow = 359;
            // } elseif ($iterationCount === 174) {
            //     $startingRow = 374;
            // } elseif ($iterationCount === 180) {
            //     $startingRow = 389;
            // }
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($outputFilePath);
        return response()->download($outputFilePath)->deleteFileAfterSend(true);

        return response()->json(['message' => 'File updated successfully.']);
    }

    private function getReport($bestPracticeId, $controlAssessmentId, string $cloudControlType = null)
    {

        $report = DB::table('control_master_table AS c')
            ->distinct()
            ->join('control_master_table_vs_best_practice_table AS cv', 'c.control_id', '=', 'cv.control_id')
            ->join('best_practice_table AS bp', 'cv.best_practice_id', '=', 'bp.best_practices_id')
            ->join('control_master_table_vs_domain_table AS cvd', 'c.control_id', '=', 'cvd.control_id')
            ->join('domain_table AS d', 'cvd.main_domain_id', '=', 'd.main_domain_id')
            ->join('control_master_table_vs_sub_domain_table AS cvsd', 'c.control_id', '=', 'cvsd.control_id')
            ->join('sub_domain_table AS sd', 'cvsd.sub_domain_id', '=', 'sd.sub_domain_id')
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
            ->where('bp.best_practices_id', '=', $bestPracticeId)
            ->when($cloudControlType, function ($query, $cloudControlType) {
                $query->where('c.control_cloud', $cloudControlType);
            })

            ->select(
                'c.control_id',
                'c.control_name',
                'c.control_description',
                'c.control_description_ar',
                'c.control_level_title',
                'bp.best_practices_id',
                'bp.best_practices_name',
                'd.main_domain_id',
                'd.main_domain_name',
                'sd.sub_domain_id',
                'sd.sub_domain_name',
                DB::raw("COALESCE(latest_cad.control_implementation_status, 'Not Implemented') AS status"),
                DB::raw("COALESCE(latest_cad.remarks, '') AS remarks"),
                DB::raw("COALESCE(latest_cad.corrective_action_due_date, '') AS corrective_action_due_date"),
                DB::raw("COALESCE(latest_cad.corrective_action, '') AS corrective_action"),
                DB::raw(
                    "
                    CASE 
                        WHEN COALESCE(latest_cad.control_implementation_status, 'Not Implemented') = 'Partially Implemented' THEN 'مطبق جزئيًا'
                        WHEN COALESCE(latest_cad.control_implementation_status, 'Not Implemented') = 'Implemented' THEN 'مطبق كليًا'
                        WHEN COALESCE(latest_cad.control_implementation_status, 'Not Implemented') = 'Not Implemented' THEN 'غير مطبق'
                        WHEN COALESCE(latest_cad.control_implementation_status, 'Not Implemented') = 'Not Applicable' THEN 'لاينطبق'
                        ELSE 'غير مطبق'
                    END AS status_ar"
                )
            )
            ->orderByRaw("
                CAST(SUBSTRING_INDEX(c.control_id, '-', 1) AS UNSIGNED),
                CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 3), '-', -1) AS UNSIGNED),
                COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 4), '-', -1) AS UNSIGNED), 0),
                COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 5), '-', -1) AS UNSIGNED), 0),
                COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 6), '-', -1) AS UNSIGNED), 0)
            ")
            ->get();





        return $report;
    }
}
