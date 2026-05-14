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
        Schema::table('audit_master_table', function (Blueprint $table) {
            $table->string('status', 40)->default('In-Progress')->after('best_practice');
        });
    }

    public function down(): void
    {
        Schema::table('audit_master_table', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
