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
        Schema::create('category_table_vs_best_practice_table', function (Blueprint $table) {
            $table->id();
            $table->string('best_practices_id', 40);
            $table->string('category_id', 40);

            $table->foreign('best_practices_id')
                ->references('best_practices_id')
                ->on('best_practice_table')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('category_id')
                ->on('category_table')
                ->onDelete('cascade');

            $table->unique(['best_practices_id', 'category_id'], 'bp_category_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_table_vs_best_practice_table');
    }
};
