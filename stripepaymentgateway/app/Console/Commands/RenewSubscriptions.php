<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User; // Assuming you have a User model
use Stripe\Stripe;
use Stripe\Subscription;

class RenewSubscriptions extends Command
{
    protected $signature = 'subscriptions:renew';
    protected $description = 'Renew subscriptions for users';

    public function handle()
    {
        // Fetch users with active subscriptions
        $users = User::whereNotNull('subscription_id')
            ->where('subscription_status', 'active') // Check for active subscriptions
            ->get();

        foreach ($users as $user) {
            try {
                // Set the Stripe API key
                Stripe::setApiKey($this->getStripeKeyForCurrency($user->currency)); // Make sure you have currency in your user table

                // Retrieve the existing subscription
                $subscription = Subscription::retrieve($user->subscription_id);

                // Attempt to renew the subscription
                $subscription->status = 'active'; // Update status if necessary

                // Optionally, you might want to check for payment method issues here
                // If no payment method is attached, we might need to take further actions

                // Save the subscription status in the database
                $user->subscription_status = $subscription->status;
                $user->save();

                $this->info("Successfully renewed subscription for user: {$user->id}");
            } catch (\Exception $e) {
                $this->error("Failed to renew subscription for user: {$user->id} - " . $e->getMessage());
            }
        }

        return 0; // Indicates success
    }

    private function getStripeKeyForCurrency($currency)
    {
        $currencies = config('currencies.currencies'); // Make sure your currencies config exists

        if (array_key_exists($currency, $currencies)) {
            return $currencies[$currency]['stripe_key'];
        }

        throw new \InvalidArgumentException("Invalid currency: $currency");
    }
}
