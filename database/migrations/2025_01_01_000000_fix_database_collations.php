<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Get the database name
        $databaseName = DB::connection()->getDatabaseName();
        
        // Update collation for all tables involved in the query
        $tables = [
            'control_master_table',
            'control_master_table_vs_category_table',
            'category_table',
            'control_master_table_vs_best_practice_table',
            'best_practice_table',
            'control_master_table_vs_domain_table',
            'domain_table',
            'control_master_table_vs_sub_domain_table',
            'sub_domain_table',
            'control_type_table',
            'classification_table'
        ];
        
        foreach ($tables as $table) {
            // Get all columns in the table
            $columns = DB::select("SELECT COLUMN_NAME, DATA_TYPE, CHARACTER_MAXIMUM_LENGTH
                                  FROM INFORMATION_SCHEMA.COLUMNS
                                  WHERE TABLE_SCHEMA = '{$databaseName}' AND TABLE_NAME = '{$table}'
                                  AND DATA_TYPE IN ('varchar', 'char')");

            // Update collation for varchar and char columns with length
            foreach ($columns as $column) {
                $columnName = $column->COLUMN_NAME;
                $maxLength = $column->CHARACTER_MAXIMUM_LENGTH;
                DB::statement("ALTER TABLE `{$table}` MODIFY `{$columnName}`
                              VARCHAR({$maxLength}) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            }

            // For text columns (which don't have length), just update collation
            $textColumns = DB::select("SELECT COLUMN_NAME, DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS
                                      WHERE TABLE_SCHEMA = '{$databaseName}' AND TABLE_NAME = '{$table}'
                                      AND DATA_TYPE IN ('text', 'tinytext', 'mediumtext', 'longtext')");

            foreach ($textColumns as $column) {
                $columnName = $column->COLUMN_NAME;
                $dataType = $column->DATA_TYPE;
                DB::statement("ALTER TABLE `{$table}` MODIFY `{$columnName}`
                              {$dataType} CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            }

            // Change table collation
            DB::statement("ALTER TABLE `{$table}` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Optionally revert the changes
        $databaseName = DB::connection()->getDatabaseName();
        
        $tables = [
            'control_master_table',
            'control_master_table_vs_category_table',
            'category_table',
            'control_master_table_vs_best_practice_table',
            'best_practice_table',
            'control_master_table_vs_domain_table',
            'domain_table',
            'control_master_table_vs_sub_domain_table',
            'sub_domain_table',
            'control_type_table',
            'classification_table'
        ];
        
        foreach ($tables as $table) {
            // Get all columns in the table
            $columns = DB::select("SELECT COLUMN_NAME, DATA_TYPE, CHARACTER_MAXIMUM_LENGTH
                                  FROM INFORMATION_SCHEMA.COLUMNS
                                  WHERE TABLE_SCHEMA = '{$databaseName}' AND TABLE_NAME = '{$table}'
                                  AND DATA_TYPE IN ('varchar', 'char')");

            // Update collation for varchar and char columns with length
            foreach ($columns as $column) {
                $columnName = $column->COLUMN_NAME;
                $maxLength = $column->CHARACTER_MAXIMUM_LENGTH;
                DB::statement("ALTER TABLE `{$table}` MODIFY `{$columnName}`
                              VARCHAR({$maxLength}) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
            }

            // For text columns (which don't have length), just update collation
            $textColumns = DB::select("SELECT COLUMN_NAME, DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS
                                      WHERE TABLE_SCHEMA = '{$databaseName}' AND TABLE_NAME = '{$table}'
                                      AND DATA_TYPE IN ('text', 'tinytext', 'mediumtext', 'longtext')");

            foreach ($textColumns as $column) {
                $columnName = $column->COLUMN_NAME;
                $dataType = $column->DATA_TYPE;
                DB::statement("ALTER TABLE `{$table}` MODIFY `{$columnName}`
                              {$dataType} CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
            }

            // Change table collation
            DB::statement("ALTER TABLE `{$table}` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
        }
    }
};