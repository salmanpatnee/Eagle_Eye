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
        Schema::create('import_mappings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->string('pivot_table_name');
            $table->string('left_entity_table');
            $table->string('left_entity_column');
            $table->string('right_entity_table');
            $table->string('right_entity_column');
            $table->string('left_entity_label')->comment('Human-readable label for left entity');
            $table->string('right_entity_label')->comment('Human-readable label for right entity');
            $table->json('column_mappings')->nullable()->comment('Additional column mappings if needed');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('import_mappings');
    }
};
