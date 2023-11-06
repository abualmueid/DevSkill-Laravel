<?php

use App\Middleware\TestMiddleware;

return [
    "app_name" => "DevSkill",
    "version" => "1.1.0",
    "providers" => [
        // \DevSkill\Providers\RouteServiceProvider::class,
        \App\Providers\UserServiceProvider::class,
    ],
    "middlewares" => [
        'test' => TestMiddleware::class
    ]
];