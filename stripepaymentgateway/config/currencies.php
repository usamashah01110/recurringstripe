<?php

return [
    'currencies' => [
        'usd' => [
            'stripe_key' => env('STRIPE_SECRET_USD'),
        ],
        'eur' => [
            'stripe_key' => env('STRIPE_SECRET_EUR'),
        ],
        'gbp' => [
            'stripe_key' => env('STRIPE_SECRET_GBP'),
        ],

    ],
];
