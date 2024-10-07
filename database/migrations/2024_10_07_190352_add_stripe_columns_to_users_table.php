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
        Schema::table('users', function (Blueprint $table) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('stripe_id')->nullable(); // To store Stripe customer ID
                $table->string('payment_method_id')->nullable(); // To store Stripe Payment Method ID
                $table->timestamp('trial_ends_at')->nullable(); // For handling trial periods
                $table->boolean('is_subscribed')->default(false); // Subscription status
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['stripe_id', 'payment_method_id', 'trial_ends_at', 'is_subscribed']);
        });
    }
};
