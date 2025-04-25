<?php

use App\Models\Location;
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
        Schema::create('department_table', function (Blueprint $table) {
            $table->id();
            $table->string('department_id', 40)->unique();
            $table->string('location_id', 40)->nullable();;
            $table->foreign('location_id')
                ->references('location_id')
                ->on('location_table')
                ->onDelete('restrict');
            $table->string('department_name', 120);
            $table->string('department_description', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('department_table', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign(['location_id']);
        });

        Schema::dropIfExists('department_table');
    }
};
