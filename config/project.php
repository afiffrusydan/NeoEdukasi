<?php

return [
    'seed' => [
        'dev_first_name' => env('DEV_FIRST_NAME', 'test'),
        'dev_last_name' => env('DEV_LAST_NAME', 'tast'),
        'dev_email' => env('DEV_EMAIL', 'test@gmail.com'),
        'dev_password' => env('DEV_PASSWORD', '123123'),
    ],

    'tentor' => [
        'prefix' => env('TENTOR_PREFIX', 'tentor'),
    ],

    'admin' => [
        'prefix' => env('ADMIN_PREFIX', 'admin'),
        'roles' => [
            'administrator' => 'administrator',
            'academic' => 'academic',
            'cs' => 'customerservice',
        ],
    ],
];