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
        Schema::create('classification_table', function (Blueprint $table) {
            $table->id();
            $table->string('classification_id', 40)->unique();
            $table->string('classification_name', 120);
            $table->text('classification_description')->nullable();
            $table->text('classification_source')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classification_table');
    }
};
