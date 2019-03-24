<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => MiniSchool\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
    'client_id' => '1084506488314265',
    'client_secret' => 'c706a63d90f10ed5e345459440754ee1',
    'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],
    'twitter' => [
    'client_id' => 'so93FjFJKmrUcNLxo9GGUMMHZ',
    'client_secret' => 'gwlUbUioVRoE1CBHSRHLjVPMgZoal9LERUEk3rz3wIwn0eDjKq',
    'redirect' => 'http://localhost:8000/auth/twitter/callback',
    ],
    'google' => [
    'client_id' => '370366314641-quep55gr9p21d7iqq505ercnb02eknug.apps.googleusercontent.com',
    'client_secret' => 'I5IpEitwN0urotX11R7GF479',
    'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

];
