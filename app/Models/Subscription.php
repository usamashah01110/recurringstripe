<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'stripe_subscription_id',
        'stripe_price_id',
        'starts_at',
        'ends_at',
        'next_billing_date',
        'status',
    ];

    protected $dates = [
        'starts_at',
        'ends_at',
        'next_billing_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isActive()
    {
        return $this->status === 'active';
    }

    public function isCanceled()
    {
        return $this->status === 'canceled';
    }
}
