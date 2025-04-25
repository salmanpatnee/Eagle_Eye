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
        Schema::create('best_practice_vs_domain_table', function (Blueprint $table) {
            $table->id();
            $table->string('best_practices_id', 40);
            $table->string('main_domain_id', 40);

            $table->foreign('best_practices_id')
                ->references('best_practices_id')
                ->on('best_practice_table')
                ->onDelete('cascade');

            $table->foreign('main_domain_id')
                ->references('main_domain_id')
                ->on('domain_table')
                ->onDelete('cascade');

            $table->unique(['best_practices_id', 'main_domain_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('best_practice_vs_domain_table');
    }
};
