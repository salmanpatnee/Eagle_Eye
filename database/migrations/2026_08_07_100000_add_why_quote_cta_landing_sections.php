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
                'section_key' => 'why',
                'eyebrow' => 'Since 2023',
                'title' => 'Built for the Saudi<br><span>Regulatory Landscape</span>',
                'body' => 'Eagle Eye was designed from the ground up for organizations operating in Saudi Arabia, covering their GRC needs and beyond. For boards and C-level executives, regulatory compliance is a top priority.',
                'meta' => null,
            ],
            [
                'section_key' => 'quote',
                'eyebrow' => null,
                'title' => null,
                'body' => '"Eagle Eye transformed how we demonstrate Regulatory Compliance to our board. What used to take weeks of spreadsheet work now takes hours."',
                'meta' => null,
            ],
            [
                'section_key' => 'cta',
                'eyebrow' => null,
                'title' => 'Ready to Go Beyond GRC?',
                'body' => 'Join organizations across the Kingdom managing compliance the smart way.',
                'meta' => null,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('landing_sections')->whereIn('section_key', ['why', 'quote', 'cta'])->delete();
    }
};
