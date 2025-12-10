<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;

class SpreadsheetParserService
{
    public function parse(string $filePath): array
    {
        Log::channel('import')->info('Starting file parse', ['file' => $filePath]);

        $fullPath = Storage::disk('public')->path($filePath);

        if (!file_exists($fullPath)) {
            throw new \Exception("File not found: {$fullPath}");
        }

        $extension = pathinfo($fullPath, PATHINFO_EXTENSION);
        $data = [];

        try {
            if (in_array(strtolower($extension), ['csv'])) {
                $data = $this->parseCsv($fullPath);
            } else {
                $data = $this->parseExcel($fullPath);
            }

            Log::channel('import')->info('File parsed successfully', [
                'file' => $filePath,
                'rows' => count($data)
            ]);

            return $data;
        } catch (\Exception $e) {
            Log::channel('import')->error('File parse failed', [
                'file' => $filePath,
                'error' => $e->getMessage()
            ]);
            throw $e;
        }
    }

    protected function parseCsv(string $filePath): array
    {
        $rows = [];
        $handle = fopen($filePath, 'r');

        if ($handle === false) {
            throw new \Exception("Could not open CSV file: {$filePath}");
        }

        $headerRow = fgetcsv($handle);

        if ($headerRow === false || count($headerRow) < 2) {
            fclose($handle);
            throw new \Exception("Invalid CSV format: Missing or invalid header row");
        }

        while (($row = fgetcsv($handle)) !== false) {
            if (count($row) >= 2 && !empty($row[0]) && !empty($row[1])) {
                $rows[] = [
                    'left_id' => trim($row[0]),
                    'right_id' => trim($row[1]),
                ];
            }
        }

        fclose($handle);
        return $rows;
    }

    protected function parseExcel(string $filePath): array
    {
        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = [];

        $rowIndex = 1;
        foreach ($worksheet->getRowIterator() as $row) {
            if ($rowIndex == 1) {
                $rowIndex++;
                continue;
            }

            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            $rowData = [];
            foreach ($cellIterator as $cell) {
                $rowData[] = $cell->getValue();
            }

            if (count($rowData) >= 2 && !empty($rowData[0]) && !empty($rowData[1])) {
                $rows[] = [
                    'left_id' => trim($rowData[0]),
                    'right_id' => trim($rowData[1]),
                ];
            }

            $rowIndex++;
        }

        return $rows;
    }
}
