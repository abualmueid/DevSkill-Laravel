<?php

namespace DevSkill\Supports;

class Route
{
    public static function __callStatic($method, $args): void
    {
        $callback = $args[1];
        $controller = new $callback[0]();
        $controller->{$callback[1]}();
    }

    public function __call($method, $args): void
    {
        $callback = $args[1];
        $controller = new $callback[0]();
        $controller->{$callback[1]}();

        echo $method;
    }
}