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
        Schema::create('location_table', function (Blueprint $table) {
            $table->id();
            $table->string('location_id', 40)->unique();
            $table->string('location_name', 120);
            $table->string('location_description', 255)->nullable();
            $table->string('location_address', 255)->nullable();
            $table->string('location_area', 120)->nullable();
            $table->string('location_city', 120)->nullable();
            $table->string('location_country', 40)->nullable();
            $table->string('location_contact_name', 80)->nullable();
            $table->string('location_contact_number', 40)->nullable();
            $table->string('location_contact_email', 80)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_table');
    }
};
