<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('landing_sections')->insert([
            [
                'section_key' => 'how',
                'eyebrow' => 'Simple Process',
                'title' => 'How It Works',
                'body' => 'Three clear steps from risk exposure to board-level confidence.',
                'meta' => json_encode([
                    'items' => [
                        ['title' => 'Assess', 'body' => 'Identify assets, threats, and vulnerabilities. Score risks using quantitative and qualitative methods.'],
                        ['title' => 'Control', 'body' => 'Map controls to risks and frameworks. Collect evidence, assign owners, and track implementation.'],
                        ['title' => 'Report', 'body' => 'Generate compliance reports, executive dashboards, and audit-ready documentation in seconds.'],
                    ],
                ]),
            ],
            [
                'section_key' => 'stats',
                'eyebrow' => null,
                'title' => null,
                'body' => null,
                'meta' => json_encode([
                    'items' => [
                        ['value' => '500+', 'label' => 'Controls Mapped'],
                        ['value' => '10+', 'label' => 'Standards Covered'],
                        ['value' => '6', 'label' => 'GRC Modules'],
                        ['value' => '2', 'label' => 'Languages (AR + EN)'],
                    ],
                ]),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('landing_sections')->whereIn('section_key', ['how', 'stats'])->delete();
    }
};
