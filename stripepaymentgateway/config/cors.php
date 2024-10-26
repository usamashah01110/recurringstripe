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

       'paths' => ['api/*'],

       'allowed_methods' => ['*'],

       'allowed_origins' => ['http://localhost:8082', 'http://127.0.0.1:8082'],

       'allowed_origins_patterns' => [],

       'allowed_headers' => ['*'],  // Allow all headers

       'exposed_headers' => [],

       'max_age' => 0,

       'supports_credentials' => false,
];
