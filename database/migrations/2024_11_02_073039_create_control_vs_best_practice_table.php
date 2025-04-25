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
        Schema::create('control_master_table_vs_best_practice_table', function (Blueprint $table) {
            $table->id();
            $table->string('best_practices_id', 40);
            $table->string('control_id', 40);
        
            // Specify shorter foreign key constraint names
            $table->foreign('best_practices_id', 'fk_bp_id')
                ->references('best_practices_id')
                ->on('best_practice_table')
                ->onDelete('cascade');
        
            $table->foreign('control_id', 'fk_control_id')
                ->references('control_id')
                ->on('control_master_table')
                ->onDelete('cascade');
        
            // Specify a shorter name for the unique constraint
            $table->unique(['best_practices_id', 'control_id'], 'bp_vs_cid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('control_master_table_vs_best_practice_table');
    }
};
