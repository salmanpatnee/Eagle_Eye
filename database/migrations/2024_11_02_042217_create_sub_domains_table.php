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
        Schema::create('sub_domain_table', function (Blueprint $table) {
            $table->id();
            $table->string('sub_domain_id', 40)->unique();

            $table->string('main_domain_id', 40);
            $table->foreign('main_domain_id')
            ->references('main_domain_id')
            ->on('domain_table')
            ->onDelete('restrict');


            $table->string('classification_id', 40)->nullable();
            $table->foreign('classification_id')
                ->references('classification_id')
                ->on('classification_table')
                ->onDelete('restrict');

                $table->string('sub_domain_name', 120);
                $table->string('sub_domain_description', 255)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::table('sub_domain_table', function (Blueprint $table) {
            $table->dropForeign(['main_domain_id']);
            $table->dropForeign(['classification_id']);
        });

        Schema::dropIfExists('sub_domain_table');
    }
};
