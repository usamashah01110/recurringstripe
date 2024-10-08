<?php

return [
    'currencies' => [
        'usd' => [
            'stripe_key' => env('STRIPE_SECRET_USD'),
            'symbol' => '$',
        ],
        'eur' => [
            'stripe_key' => env('STRIPE_SECRET_USD'),
            'symbol' => '€',
        ],
        'gbp' => [
            'stripe_key' => env('STRIPE_SECRET_USD'),
            'symbol' => '£',
        ],

    ],
];
