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
        Schema::create('article_category_process', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('article_category_id');
            $table->unsignedInteger('process_id');

            $table->foreign('article_category_id')->references('id')->on('article_categories')->onDelete('cascade');
            $table->foreign('process_id')->references('id')->on('cms_process')->onDelete('cascade');

            $table->unique(['article_category_id', 'process_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_category_process');
    }
};
