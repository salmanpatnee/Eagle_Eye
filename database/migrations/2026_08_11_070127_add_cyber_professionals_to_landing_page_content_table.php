<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('landing_page_content', function (Blueprint $table) {
            $table->text('cyber_professionals_title')->nullable();
            $table->longText('cyber_professionals_content')->nullable();
            $table->string('cyber_professionals_image_path')->nullable();
            $table->text('cyber_professionals_notice_title')->nullable();
            $table->longText('cyber_professionals_notice_content')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('landing_page_content', function (Blueprint $table) {
            $table->dropColumn([
                'cyber_professionals_title',
                'cyber_professionals_content',
                'cyber_professionals_image_path',
                'cyber_professionals_notice_title',
                'cyber_professionals_notice_content',
            ]);
        });
    }
};
