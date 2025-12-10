<?php

namespace App\Jobs;

use App\Models\ImportMapping;
use App\Models\ImportJob;
use App\Services\SpreadsheetParserService;
use App\Services\ImportValidatorService;
use App\Services\RelationshipImporterService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProcessImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 600;

    protected string $filePath;
    protected int $mappingId;
    protected int $userId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $filePath, int $mappingId, int $userId)
    {
        $this->filePath = $filePath;
        $this->mappingId = $mappingId;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(
        SpreadsheetParserService $parser,
        ImportValidatorService $validator,
        RelationshipImporterService $importer
    ) {
        $fileName = basename($this->filePath);

        $importJob = ImportJob::create([
            'import_mapping_id' => $this->mappingId,
            'user_id' => $this->userId,
            'file_path' => $this->filePath,
            'file_name' => $fileName,
            'status' => 'processing',
            'started_at' => now(),
        ]);

        Log::channel('import')->info('Import job started', [
            'job_id' => $importJob->id,
            'file' => $this->filePath,
            'mapping_id' => $this->mappingId,
            'user_id' => $this->userId
        ]);

        try {
            $mapping = ImportMapping::findOrFail($this->mappingId);

            DB::beginTransaction();

            $rows = $parser->parse($this->filePath);

            $validRows = $validator->validate(
                $rows,
                $mapping->left_entity_table,
                $mapping->left_entity_column,
                $mapping->right_entity_table,
                $mapping->right_entity_column
            );

            $result = $importer->import(
                $validRows,
                $mapping->pivot_table_name,
                $mapping->left_entity_column,
                $mapping->right_entity_column
            );

            $allErrors = array_merge($validator->getErrors(), $result['errors']);

            $importJob->update([
                'status' => 'completed',
                'total_rows' => count($rows),
                'valid_rows' => count($validRows),
                'inserted_rows' => $result['inserted'],
                'skipped_rows' => $result['skipped'],
                'error_rows' => count($allErrors),
                'errors' => $allErrors,
                'summary' => [
                    'total_rows' => count($rows),
                    'valid_rows' => count($validRows),
                    'inserted' => $result['inserted'],
                    'skipped' => $result['skipped'],
                    'validation_errors' => count($validator->getErrors()),
                    'import_errors' => count($result['errors']),
                ],
                'completed_at' => now(),
            ]);

            DB::commit();

            Log::channel('import')->info('Import job completed successfully', [
                'job_id' => $importJob->id,
                'summary' => $importJob->summary
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            $importJob->update([
                'status' => 'failed',
                'errors' => [[
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]],
                'completed_at' => now(),
            ]);

            Log::channel('import')->error('Import job failed', [
                'job_id' => $importJob->id,
                'file' => $this->filePath,
                'mapping_id' => $this->mappingId,
                'error' => $e->getMessage()
            ]);

            $this->fail($e);
        }
    }
}
