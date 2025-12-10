<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ImportValidatorService
{
    protected array $errors = [];

    public function validate(array $rows, string $leftTable, string $leftColumn, string $rightTable, string $rightColumn): array
    {
        Log::channel('import')->info('Starting validation', [
            'rows' => count($rows),
            'leftTable' => $leftTable,
            'rightTable' => $rightTable
        ]);

        $this->errors = [];
        $validRows = [];

        foreach ($rows as $index => $row) {
            $rowNumber = $index + 2;

            if (!isset($row['left_id']) || !isset($row['right_id'])) {
                $this->errors[] = [
                    'row' => $rowNumber,
                    'error' => 'Missing required columns',
                    'data' => $row
                ];
                continue;
            }

            $leftId = $row['left_id'];
            $rightId = $row['right_id'];

            $leftExists = $this->recordExists($leftTable, $leftColumn, $leftId);
            $rightExists = $this->recordExists($rightTable, $rightColumn, $rightId);

            if (!$leftExists) {
                $this->errors[] = [
                    'row' => $rowNumber,
                    'error' => "Left entity not found: {$leftId} in {$leftTable}.{$leftColumn}",
                    'data' => $row
                ];
            }

            if (!$rightExists) {
                $this->errors[] = [
                    'row' => $rowNumber,
                    'error' => "Right entity not found: {$rightId} in {$rightTable}.{$rightColumn}",
                    'data' => $row
                ];
            }

            if ($leftExists && $rightExists) {
                $validRows[] = [
                    'left_id' => $leftId,
                    'right_id' => $rightId,
                    'row_number' => $rowNumber
                ];
            }
        }

        Log::channel('import')->info('Validation complete', [
            'valid' => count($validRows),
            'errors' => count($this->errors)
        ]);

        return $validRows;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    protected function recordExists(string $table, string $column, $value): bool
    {
        return DB::table($table)->where($column, $value)->exists();
    }
}
