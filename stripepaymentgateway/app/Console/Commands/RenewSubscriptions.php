<?php

namespace App\Console\Commands;

use App\Models\Subscription as UserSubscription;
use Illuminate\Console\Command;
use App\Jobs\RenewSubscriptionJob;
use Illuminate\Support\Facades\Log;
use Stripe\Stripe;

class RenewSubscriptions extends Command
{
    protected $signature = 'subscriptions:renew';
    protected $description = 'Renew subscriptions for users';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Log::info('Current time for subscription checks: ' . now()->subMinute());

        $subscriptions = UserSubscription::where('next_payment_date', '>', now()->subMinute())->get();

        Log::info('Subscriptions found: ' . $subscriptions->count());

        if ($subscriptions->isEmpty()) {
            $this->info('No subscriptions are due for renewal.');
            return;
        }
        foreach ($subscriptions as $subscription) {
            RenewSubscriptionJob::dispatch($subscription->subscription_id, $subscription->currency);
        }

        $this->info('Subscription renewal jobs have been dispatched.');
    }
}
