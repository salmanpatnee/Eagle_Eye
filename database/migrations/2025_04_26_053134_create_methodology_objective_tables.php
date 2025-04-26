<?php

use App\Models\Objective;
use App\Models\RiskMethodology;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Mockery\Generator\Method;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('methodology_objective_tables', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('methodology_id')->unsigned();
            $table->bigInteger('objective_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('methodology_objective_tables');
    }
};
