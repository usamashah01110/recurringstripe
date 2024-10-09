<?php

namespace App\Http\Controllers;

use App\Traits\ValidatesStripePayments;
use App\Traits\HandlesStripeCurrency;
use Illuminate\Http\Request;

class StripePaymentController extends Controller
{
    use ValidatesStripePayments, HandlesStripeCurrency;

    public function processOneTimeDonation(Request $request)
    {
        $validationResponse = $this->validateOneTimeDonation($request);
        if ($validationResponse) {
            return $validationResponse;
        }

        $stripeSecretKey = $this->getStripeKeyForCurrency($request->currency);
        \Stripe\Stripe::setApiKey($stripeSecretKey);
        $amount =  $request->donation_amount - $request->tipsgiven;
        try {
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $amount * 100,
                'currency' => $request->currency,
                'payment_method' => $request->payment_method,
                'confirmation_method' => 'automatic',
                'confirm' => true,
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
            $customer = \Stripe\Customer::create([
                'email' => $request->email,
            ]);

            $paymentMethod = \Stripe\PaymentMethod::retrieve($request->payment_method);
            $paymentMethod->attach(['customer' => $customer->id]);

            \Stripe\Customer::update($customer->id, [
                'invoice_settings' => [
                    'default_payment_method' => $request->payment_method,
                ],
            ]);

            $subscription = \Stripe\Subscription::create([
                'customer' => $customer->id,
                'items' => [['plan' => $request->plan]],
                'currency' => $request->currency,
            ]);

//            $user = auth()->user();
//            $user->stripe_customer_id = $customer->id;
//            $user->subscription_id = $subscription->id;
//            $user->plan_id = $request->plan;
//            $user->subscription_status = $subscription->status;
//            $user->currency = $request->currency;
//            $user->save();

            return response()->json(['message' => 'Your Donation has made sucessfully!', 'subscription' => $subscription], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
