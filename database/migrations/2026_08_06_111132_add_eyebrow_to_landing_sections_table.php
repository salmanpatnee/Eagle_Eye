<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('landing_sections', function (Blueprint $table) {
            $table->string('eyebrow')->nullable()->after('section_key');
        });

        DB::table('landing_sections')->insert([
            [
                'section_key' => 'showcase',
                'eyebrow' => 'Product Preview',
                'title' => 'Every Insight. One Command Center.',
                'body' => 'Live compliance scores, risk distribution, and control status — all in one view, designed for CISOs and auditors who act on data, not guesswork.',
                'meta' => null,
            ],
            [
                'section_key' => 'infographics',
                'eyebrow' => 'GRC Intelligence',
                'title' => 'Data That Drives Decisions',
                'body' => 'Real-time visibility across your entire risk and compliance landscape — all from one unified platform.',
                'meta' => null,
            ],
            [
                'section_key' => 'features',
                'eyebrow' => 'Platform Capabilities',
                'title' => 'Everything You Need',
                'body' => 'One platform, every framework — purpose-built for Saudi Arabia\'s complete compliance needs and beyond.',
                'meta' => null,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('landing_sections')->whereIn('section_key', ['showcase', 'infographics', 'features'])->delete();

        Schema::table('landing_sections', function (Blueprint $table) {
            $table->dropColumn('eyebrow');
        });
    }
};
