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
        Schema::create('sub_department_table', function (Blueprint $table) {
            $table->id();
            $table->string('sub_department_id', 40)->unique();
            $table->string('department_id', 40);
            
            $table->foreign('department_id')
                ->references('department_id')
                ->on('department_table')
                ->onDelete('restrict');
            
                $table->string('sub_department_name', 120);
            $table->string('sub_department_description', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::table('sub_department_table', function (Blueprint $table) {
            $table->dropForeign(['department_id']);
        });

        Schema::dropIfExists('sub_department_table');
    }
};
