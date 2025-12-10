<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RelationshipImporterService
{
    protected int $inserted = 0;
    protected int $skipped = 0;
    protected array $errors = [];

    public function import(array $validRows, string $pivotTable, string $leftColumn, string $rightColumn): array
    {
        Log::channel('import')->info('Starting relationship import', [
            'rows' => count($validRows),
            'pivotTable' => $pivotTable
        ]);

        $this->inserted = 0;
        $this->skipped = 0;
        $this->errors = [];

        foreach ($validRows as $row) {
            try {
                $this->insertRelationship(
                    $pivotTable,
                    $leftColumn,
                    $rightColumn,
                    $row['left_id'],
                    $row['right_id'],
                    $row['row_number']
                );
            } catch (\Exception $e) {
                $this->errors[] = [
                    'row' => $row['row_number'],
                    'error' => $e->getMessage(),
                    'data' => $row
                ];
            }
        }

        Log::channel('import')->info('Relationship import complete', [
            'inserted' => $this->inserted,
            'skipped' => $this->skipped,
            'errors' => count($this->errors)
        ]);

        return [
            'inserted' => $this->inserted,
            'skipped' => $this->skipped,
            'errors' => $this->errors
        ];
    }

    protected function insertRelationship(
        string $pivotTable,
        string $leftColumn,
        string $rightColumn,
        $leftId,
        $rightId,
        int $rowNumber
    ): void {
        $existing = DB::table($pivotTable)
            ->where($leftColumn, $leftId)
            ->where($rightColumn, $rightId)
            ->exists();

        if ($existing) {
            $this->skipped++;
            Log::channel('import')->debug('Relationship already exists', [
                'row' => $rowNumber,
                'left' => $leftId,
                'right' => $rightId
            ]);
            return;
        }

        DB::table($pivotTable)->insert([
            $leftColumn => $leftId,
            $rightColumn => $rightId,
        ]);

        $this->inserted++;
    }

    public function getStats(): array
    {
        return [
            'inserted' => $this->inserted,
            'skipped' => $this->skipped,
            'errors' => count($this->errors)
        ];
    }
}
