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
        Schema::create('category_table_vs_sub_domain_table', function (Blueprint $table) {
            $table->id();
            $table->string('category_id', 40);
            $table->string('sub_domain_id', 40);
        
            $table->foreign('category_id')
                ->references('category_id')
                ->on('category_table')
                ->onDelete('cascade');
        
            $table->foreign('sub_domain_id')
                ->references('sub_domain_id')
                ->on('sub_domain_table')
                ->onDelete('cascade');
        
            $table->unique(['category_id', 'sub_domain_id'], 'bp_sub_category_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_table_vs_sub_domain_table');
    }
};
