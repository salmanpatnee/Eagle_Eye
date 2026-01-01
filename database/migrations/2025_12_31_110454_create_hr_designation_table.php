<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr_designation_table', function (Blueprint $table) {
            $table->id();
            $table->string('designation_id')->unique();
            $table->string('designation_name');
            $table->softDeletes();
            // No timestamps as per data model requirements
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hr_designation_table');
    }
};
