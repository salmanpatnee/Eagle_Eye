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
        Schema::create('category_table', function (Blueprint $table) {
            $table->id();
            $table->string('category_id', 40)->unique();
            $table->string('category_name', 120);
            $table->text('category_description')->nullable();
            $table->text('category_source')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_table');
    }
};
