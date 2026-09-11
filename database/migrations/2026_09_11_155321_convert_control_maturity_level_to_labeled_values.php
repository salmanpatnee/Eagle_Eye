<?php

use App\Enums\ControlMaturityLevel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach (ControlMaturityLevel::cases() as $case) {
            DB::table('control_assessment_details_table')
                ->where('control_maturity_level', (string) $case->value)
                ->update(['control_maturity_level' => $case->display()]);
        }
    }

    public function down(): void
    {
        foreach (ControlMaturityLevel::cases() as $case) {
            DB::table('control_assessment_details_table')
                ->where('control_maturity_level', $case->display())
                ->update(['control_maturity_level' => (string) $case->value]);
        }
    }
};
