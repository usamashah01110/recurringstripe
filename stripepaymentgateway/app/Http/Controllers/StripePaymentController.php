<?php

namespace App\Http\Controllers;

use App\Models\Subscription as UserSubscription;
use App\Traits\ValidatesStripePayments;
use App\Traits\HandlesStripeCurrency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Invoice;
use Stripe\Stripe;
use Stripe\Subscription;
class StripePaymentController extends Controller
{
    use ValidatesStripePayments, HandlesStripeCurrency;

    public function processOneTimeDonation(Request $request)
    {
        $validationResponse = $this->validateOneTimeDonation($request);
        if ($validationResponse) {
            return $validationResponse;
        }

        // Set Stripe API key
        $stripeSecretKey = $this->getStripeKeyForCurrency($request->currency);
        \Stripe\Stripe::setApiKey($stripeSecretKey);

        // Calculate donation amount minus tips
        $amount = $request->donation_amount - $request->tipsgiven;

        try {
            // Step 1: Create a customer in Stripe
            $customer = \Stripe\Customer::create([
                'email' => $request->fundraiseremail,
                'name' => $request->fundraisername,
                'description' => 'Donor for one-time donation',
            ]);

            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $amount * 100,
                'currency' => $request->currency,
                'payment_method' => $request->payment_method,
                'confirmation_method' => 'automatic',
                'confirm' => true,
                'description' => 'Donor for one-time donation',
                'customer' => $customer->id,
                'return_url' => 'https://your-website.com/return',
            ]);

            return response()->json(['message' => 'Donation successful!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }


    public function processRecurringDonation(Request $request)
    {
        $validationResponse = $this->validateRecurringDonation($request);
        if ($validationResponse) {
            return $validationResponse;
        }

        $stripeSecretKey = $this->getStripeKeyForCurrency($request->currency);
        \Stripe\Stripe::setApiKey($stripeSecretKey);

        try {
            $customer = \Stripe\Customer::create(['email' => $request->fundraiseremail]);
            $paymentMethod = \Stripe\PaymentMethod::retrieve($request->payment_method);
            $paymentMethod->attach(['customer' => $customer->id]);

            \Stripe\Customer::update($customer->id, [
                'invoice_settings' => ['default_payment_method' => $request->payment_method],
            ]);

            $subscription = \Stripe\Subscription::create([
                'customer' => $customer->id,
                'items' => [['plan' => $request->plan]],
                'currency' => $request->currency,
                'description' => "Recurring Donation"
            ]);

            // Get the USER ID from Auth and Pass it while storing Subscription

            $subscriptionData = new UserSubscription();
            $subscriptionData->user_id = '1';
            $subscriptionData->stripe_customer_id = $customer->id;
            $subscriptionData->subscription_id = $subscription->id;
            $subscriptionData->plan_id = $request->plan;
            $subscriptionData->amount = $subscription->plan->amount;
            $subscriptionData->currency = $subscription->currency;
            $subscriptionData->payment_method_Id = $request->payment_method;
            $subscriptionData->next_payment_date = date('Y-m-d H:i:s', $subscription->current_period_end);
            $subscriptionData->save();

            return response()->json(['message' => 'Your Donation has made successfully!', 'subscription' => $subscription], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

}
