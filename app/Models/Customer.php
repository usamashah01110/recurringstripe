<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'stripe_customer_id',
        'payment_method_id',
        'trial_ends_at',
        'is_subscribed',
    ];

    protected $dates = [
        'trial_ends_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hasActiveSubscription()
    {
        return $this->is_subscribed;
    }

    public function stripeCustomer()
    {
        return \Stripe\Customer::retrieve($this->stripe_customer_id);
    }
}
