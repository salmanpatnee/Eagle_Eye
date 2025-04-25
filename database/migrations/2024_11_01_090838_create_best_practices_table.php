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
        Schema::create('best_practice_table', function (Blueprint $table) {
            $table->id();
            $table->string('best_practices_id', 40)->unique();
            $table->string('best_practices_name', 120);
            $table->text('best_practices_source');
            $table->string('best_practices_version', 40)->nullable();
            $table->string('best_practices_country', 80)->nullable();
            $table->string('best_practices_regulation', 120)->nullable();
            $table->enum('best_practice_iso', ['Yes', 'No'])->nullable();
            $table->string('best_practices_release_year', 40)->nullable();
            $table->text('remarks')->nullable();
            $table->enum('regulatory', ['Yes', 'No'])->nullable();
            $table->integer('sort_order')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('best_practice_table');
    }
};
