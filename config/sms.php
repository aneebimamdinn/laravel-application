<?php


return [

    'default' => env('SMS_PROVIDER', 'custom_provider'),

    'providers' => [

        'custom_provider' => [
            'base_url' => env('SMS_URL'),
            'username' => env('SMS_USER'),
            'pwd' => env('SMS_PWD'),
            'from' => env('SMS_FROM'),
        ],

        'nexmo' => [
            'from' => env('NEXMO_FROM'),
            'key' => env('NEXMO_KEY'),
            'secret' => env('NEXMO_SECRET')
        ],

        'twilio' => [
            'account_sid' => env('TWILIO_SID'),
            'auth_token' => env('TWILIO_AUTH_TOKEN'),
            'twilio_number' => env('TWILIO_NUMBER')
        ]

    ],


];
