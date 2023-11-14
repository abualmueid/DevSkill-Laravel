<?php

namespace System\Support;

class Route 
{
    private static array $routes;

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

    private static function getRoutes(): array 
    {
        return self::$routes;
    }
}
