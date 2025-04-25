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
        Schema::create('organization_table', function (Blueprint $table) {
            $table->id();
            $table->string('organization_id', 255)->unique();  
            $table->string('organization_name_english', 255);
            $table->string('organization_name_arabic', 255)->nullable();
            $table->string('organization_address', 255)->nullable();
            $table->string('initiative_owner_name', 255)->nullable();
            $table->string('initiative_owner_title', 255)->nullable();
            $table->string('initiative_owner_contact_number', 255)->nullable();
            $table->string('initiative_owner_email', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organization_table');
    }
};
