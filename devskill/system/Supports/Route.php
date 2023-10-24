<?php

namespace DevSkill\Supports;

class Route
{
    public static function __callStatic($method, $args)
    {
        $callback = $args[1];
        $controller = new $callback[0]();
        $controller->{$callback[1]}();
    }
}