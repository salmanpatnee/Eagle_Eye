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
        Schema::create('sub_category_table', function (Blueprint $table) {
            $table->id();
            $table->string('sub_category_id', 40)->unique();
            $table->string('category_id', 40);

            $table->foreign('category_id')
                ->references('category_id')
                ->on('category_table')
                ->onDelete('restrict');

            $table->string('sub_category_name', 120);
            $table->text('sub_category_description', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::table('sub_category_table', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });

        
        Schema::dropIfExists('sub_category_table');
    }
};
