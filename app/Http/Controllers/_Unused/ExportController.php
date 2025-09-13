<?php

namespace App\Http\Controllers;

use App\Exports\ControlsExport;
use App\Models\ControlMaster;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportController extends Controller
{
    private function adjustRowHeights(Worksheet $sheet, int $startRow, int $numColumns)
    {
        for ($row = $startRow; $row <= $startRow; $row++) {
            $maxHeight = 0;
            for ($col = 'A'; $col < chr(ord('A') + $numColumns); $col++) {
                $cellCoordinate = "{$col}{$row}";
                $sheet->getStyle($cellCoordinate)->getAlignment()->setWrapText(true);

                // Set row height to auto-size based on content
                $sheet->getRowDimension($row)->setRowHeight(-1); // -1 means auto size
            }
        }
    }
    public function export()
    {
        $filePath = storage_path('app/public/reports/NCA-ECC-Report-Template.xlsx');
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();

        $data = [
            [
                'complaince_level_main' => 'مطبق جزئيًا - Partially Implemented',
                'complaince_level_sub' => '_',
                'remarks' => 'Remarks goes here',
                'correction' => 'correction goes here',
                'expected_date' => '12-09-2024'
            ],
            [
                'complaince_level_main' => 'مطبق جزئيًا - Partially Implemented',
                'complaince_level_sub' => '_',
                'remarks' => 'Remarks goes here',
                'correction' => 'correction goes here',
                'expected_date' => '12-09-2024'
            ],
            [
                'complaince_level_main' => 'مطبق جزئيًا - Partially Implemented',
                'complaince_level_sub' => '_',
                'remarks' => 'Remarks goes here',
                'correction' => 'correction goes here',
                'expected_date' => '12-09-2024'
            ]
        ];

        $headers = [
            'D' => 'complaince_level_main',
            'F' => 'complaince_level_sub',
            'G' => 'remarks',
            'H' => 'correction',
            'I' => 'expected_date'
        ];

        $startingRow = 8;

        // Loop through each data row
        foreach ($data as $rowData) {
            $row = $startingRow;

            // Loop through headers and set values dynamically for each column
            foreach ($headers as $column => $key) {

                $cellCoordinate = "{$column}{$startingRow}"; // D8, F8, G8

                if (isset($rowData[$key])) {

                    $sheet->setCellValue($cellCoordinate, $rowData[$key]);

                    // Apply styles
                    $sheet->getStyle($cellCoordinate)
                        ->getFont()->setName('DIN Next LT Arabic Light')->setSize(12);
                    $horizontalAlign = Alignment::HORIZONTAL_CENTER;
                    $verticalAlign = Alignment::VERTICAL_CENTER;

                    // if ($key == "remarks" || $key == "correction") {
                    //     $horizontalAlign = Alignment::HORIZONTAL_LEFT;
                    //     $verticalAlign = Alignment::VERTICAL_TOP;
                    // }

                    $sheet->getStyle($cellCoordinate)
                        ->getAlignment()
                        ->setHorizontal($horizontalAlign)
                        ->setVertical($verticalAlign)
                        ->setWrapText(true);
                }
            }

            // Move to the next row
            $startingRow++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        return response()->json(['message' => 'File updated successfully.']);
    }
}
