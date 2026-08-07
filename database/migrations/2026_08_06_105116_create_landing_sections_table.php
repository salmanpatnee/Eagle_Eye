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
        Schema::create('landing_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_key')->unique();
            $table->text('title')->nullable();
            $table->text('body')->nullable();
            $table->json('meta')->nullable();
        });

        DB::table('landing_sections')->insert([
            'section_key' => 'hero',
            'title' => 'Out-of-the-Box Regulatory Compliance, <span class="blue-text">Beyond GRC.</span>',
            'body' => 'Eagle Eye is a Saudi product focused on Saudi Arabia, providing complete regulatory compliance in the shortest possible time. Designed, developed, and rolled out under the strict supervision of experienced GRC consultants.',
            'meta' => null,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_sections');
    }
};
