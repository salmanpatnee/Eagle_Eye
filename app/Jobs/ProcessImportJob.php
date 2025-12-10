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

    protected ImportJob $importJob;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ImportJob $importJob)
    {
        $this->importJob = $importJob;
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
        // Update job status to 'processing' as soon as the job starts executing
        $this->importJob->update(['status' => 'processing', 'started_at' => now()]);

        Log::channel('import')->info('Import job started', [
            'job_id' => $this->importJob->id,
            'file' => $this->importJob->file_path,
            'mapping_id' => $this->importJob->import_mapping_id,
            'user_id' => $this->importJob->user_id
        ]);

        try {
            $mapping = ImportMapping::findOrFail($this->importJob->import_mapping_id);

            DB::beginTransaction();

            $rows = $parser->parse($this->importJob->file_path);

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

            $this->importJob->update([
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
                'job_id' => $this->importJob->id,
                'summary' => $this->importJob->summary
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            $this->importJob->update([
                'status' => 'failed',
                'errors' => [[
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]],
                'completed_at' => now(),
            ]);

            Log::channel('import')->error('Import job failed', [
                'job_id' => $this->importJob->id,
                'file' => $this->importJob->file_path,
                'mapping_id' => $this->importJob->import_mapping_id,
                'error' => $e->getMessage()
            ]);

            $this->fail($e);
        }
    }
}
