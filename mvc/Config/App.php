<?php 

namespace MVC\Config;

use App\Controller\TestMiddleware;
use System\Provider\RouteServiceProvider;

return [
    "app_name" => "mvc",
    "version" => "1.0.0",
    "providers" => [
        RouteServiceProvider::class
    ],
    "middlewares" => [
        "test" => TestMiddleware::class
    ]
];