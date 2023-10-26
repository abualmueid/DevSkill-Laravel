<?php

namespace DevSkill\Supports;

class Route
{
    private static array $routes = [];

    public static function __callStatic($method, $args)
    {
        if($method === 'getRoutes')
        {
            return self::getRoutes();
        }

        else
        {
            // self::$routes[] = [
            //     "path" => $args[0],
            //     "callback" => $args[1]
            // ];

            // self::$routes[$args[0]] = $args[1]; // path = $args[0], callback = $args[1]

            self::$routes[$args[0]] = [
                "method" => $method,
                "callback" => $args[1]
            ];
        }

        //print_r(self::$routes);

        // $callback = $args[1];
        // $controller = new $callback[0]();
        // $controller->{$callback[1]}();
    }

    private static function getRoutes(): array 
    {
        return self::$routes;
    }

    public function __call($method, $args): void
    {
        $callback = $args[1];
        $controller = new $callback[0]();
        $controller->{$callback[1]}();

        echo $method;
    }
}