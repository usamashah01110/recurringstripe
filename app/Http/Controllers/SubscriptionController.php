<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Customer;
use Stripe\PaymentMethod;
use Stripe\Stripe;
use Stripe\Subscription;

class SubscriptionController extends Controller
{
    public function showSubscriptionForm()
    {
        return view('subscribe');
    }

    public function processSubscription(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'payment_method' => 'required|string',
        ]);

        \Stripe\Stripe::setApiKey(config('services.stripe.secret')); // Set your secret key

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $paymentMethodId = $request->input('payment_method');

        $customer = Customer::create([
            'email' => $request->input('email'),
            'payment_method' => $paymentMethodId,
            'invoice_settings' => [
                'default_payment_method' => $paymentMethodId,
            ],
        ]);
        $priceId = 'price_1Q7NBiBM5xKzBdxGtoTQdUfT';
        try {
            $subscription = Subscription::create([
                'customer' => $customer->id,
                'items' => [
                    ['price' => $priceId],
                ],
                'expand' => ['latest_invoice.payment_intent'],
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

        if ($subscription) {
            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['error' => 'Subscription failed.'], 400);
        }
    }

    public function handleWebhook(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $endpointSecret = env('STRIPE_WEBHOOK_SECRET');

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sigHeader, $endpointSecret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response('Invalid payload', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response('Invalid signature', 400);
        }

        // Handle subscription events like successful payments, failed payments
        if ($event->type === 'invoice.payment_succeeded') {
            // Payment succeeded
        } elseif ($event->type === 'invoice.payment_failed') {
            // Payment failed
        }

        return response('Webhook handled', 200);
    }
}
