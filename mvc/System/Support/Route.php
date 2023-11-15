<?php

namespace System\Support;

/** @method static Route get($path, $name, $middleware) */

class Route 
{
    private static array $routes;

    /*
    protected static function __callStatic($name, $arguments)
    {
        if($name === 'getRoutes'){
            return self::getRoutes();
        } else {
            $routes[$arguments[0]] = [
                "method" => $name,
                "callback" => $arguments[1]
            ];
        }
    }
    */

    // Middleware Part //

    protected static function __callStatic($name, $arguments)
    {
        if($name === 'getRoutes'){
            return self::getRoutes();
        } else {
            $middleware = $arguments[2];

            $routes[$arguments[0]][$name] = [
                "middleware" => $middleware,
                "callback" => $arguments[1]
            ];
        }
    }

    private static function getRoutes(): array 
    {
        return self::$routes;
    }
}
