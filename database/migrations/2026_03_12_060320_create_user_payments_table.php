<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('paypal_order_id');
            $table->string('paypal_capture_id')->nullable();
            $table->string('payer_email');
            $table->decimal('amount', 10, 2);
            $table->string('currency', 10)->default('USD');
            $table->string('status');
            $table->dateTime('paid_at');
            $table->dateTime('expires_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_payments');
    }
};
