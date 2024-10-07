<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'stripe_id',
        'payment_method_id',
        'trial_ends_at',
        'is_subscribed',
    ];

    protected $dates = [
        'trial_ends_at',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function isSubscribed()
    {
        return $this->is_subscribed;
    }

    public function stripeCustomer()
    {
        return \Stripe\Customer::retrieve($this->stripe_id);
    }

    public function updateStripeCustomer($paymentMethodId)
    {
        $this->update(['payment_method_id' => $paymentMethodId]);
    }
}
