<?php

namespace App\Jobs;

use App\Models\Subscription as UserSubscription;
use App\Models\User;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Stripe\Stripe;
use Stripe\Subscription;
use App\Traits\HandlesStripeCurrency;

class RenewSubscriptionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, HandlesStripeCurrency;

    protected $subscriptionId;

    protected $currency;

    public function __construct($subscriptionId, $currency)
    {
        $this->subscriptionId = $subscriptionId;
        $this->currency = $currency;
    }

    public function handle()
    {
        try {

            $mysubscription = UserSubscription::where('subscription_id', $this->subscriptionId)->first();

            $stripeSecretKey = $this->getStripeKeyForCurrency($this->currency);

            \Stripe\Stripe::setApiKey($stripeSecretKey);

            $subscription = \Stripe\Subscription::retrieve($this->subscriptionId);

            $updatedSubscription = \Stripe\Subscription::update(
                $this->subscriptionId,
                [
                    'billing_cycle_anchor' => 'now',
                    'proration_behavior' => 'none',
                    'automatic_tax' => ['enabled' => false],
                    'description' => "Renewal Payment of Recurring Payment",
                ]
            );

            $invoice = \Stripe\Invoice::create([
                'customer' => $subscription->customer,
                'subscription' => $this->subscriptionId,
                'auto_advance' => true,
            ]);

            $finalizedInvoice = $invoice->finalizeInvoice();

            $mysubscription->last_processed_at = date('Y-m-d H:i:s', $updatedSubscription->current_period_end);

            $mysubscription->save();

            Log::info("Subscription successfully renewed for user: {$this->subscriptionId}");
        } catch (Exception $e) {
            Log::error("Failed to renew subscription for subscription {$this->subscriptionId}: " . $e->getMessage());
            $this->fail($e);
        }
    }
}
