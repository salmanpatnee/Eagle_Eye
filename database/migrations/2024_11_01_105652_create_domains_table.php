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
        Schema::create('domain_table', function (Blueprint $table) {
            $table->id();
            $table->string('main_domain_id', 40)->unique();
            $table->string('classification_id', 40)->nullable();

            $table->foreign('classification_id')
                ->references('classification_id')
                ->on('classification_table')
                ->onDelete('restrict');

            $table->string('main_domain_name', 120);
            $table->string('main_domain_description', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::table('domain_table', function (Blueprint $table) {
            $table->dropForeign(['classification_id']);
        });

        Schema::dropIfExists('domain_table');
    }
};
