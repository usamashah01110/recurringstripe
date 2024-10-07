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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('stripe_subscription_id'); // Stripe subscription ID
            $table->string('stripe_price_id'); // Plan price ID
            $table->timestamp('starts_at'); // Subscription start date
            $table->timestamp('ends_at')->nullable(); // Subscription end date
            $table->timestamp('next_billing_date')->nullable(); // Next payment date
            $table->string('status')->default('active'); // Subscription status (active, canceled, etc.)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
