<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;

class Customer extends Model
{
    use HasFactory;
    use Billable;


    protected $fillable = [
        'stripe_id', // Stripe customer ID
        'email',     // Customer email
        'name',      // Customer name
    ];
}
