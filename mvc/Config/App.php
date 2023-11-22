<?php 

use App\Middleware\TestMiddleware;
use App\Provider\UserServiceProvider;

return [
    "app_name" => "mvc",
    "version" => "1.0.0",
    "providers" => [
        UserServiceProvider::class
    ],
    "middlewares" => [
        "test" => TestMiddleware::class
    ]
];