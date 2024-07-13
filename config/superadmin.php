<?php

return [
    'auth' => [
        'name' => env('SUPER_ADMIN_NAME', 'Super Admin'),
        'email' => env('SUPER_ADMIN_EMAIL', 'admin@gmail.com'),
        'password' => env('SUPER_ADMIN_PASSWORD', 'password'),

        'route_prefix' => env('SUPER_ADMIN_ROUTE_PREFIX', 'admin'),
    ],
];
