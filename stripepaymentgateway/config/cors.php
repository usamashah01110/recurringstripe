<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */


    'paths' => ['api/*', 'sanctum/csrf-cookie'],  // Define the paths where CORS is applied (adjust for your API)
    'allowed_methods' => ['*'],                   // Allow all HTTP methods (GET, POST, etc.)
    'allowed_origins' => ['http://127.0.0.1:8082'], // Allow requests from your frontend origin
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],                   // Allow all headers
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];
