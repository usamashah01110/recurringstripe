<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Reference to the users table
            $table->string('stripe_customer_id'); // Stripe customer ID
            $table->string('payment_method_id')->nullable(); // Stripe Payment Method ID
            $table->timestamp('trial_ends_at')->nullable(); // Optional trial end time
            $table->boolean('is_subscribed')->default(false); // Flag for subscription status
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
