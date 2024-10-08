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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('payment_method')->nullable(); // Store the Stripe customer ID
            $table->string('email')->nullable();    // Email of the customer
            $table->string('name')->nullable();     // Name of the customer
            $table->string('invoice_settings')->nullable();     // Name of the customer
            $table->timestamps();                    // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
