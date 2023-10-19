<?php

use DevSkill\Application;

function app(): Application
{
    echo "\nApp from Global Function";

    return Application::instance();
}

function loadConfig($path)
{
    $path = app()->path('config/' . $path);

    return file_exists($path) ? include $path : "Path does not exist!";
}

function readConfig($path)
{
    $path = explode(".", $path);
    $data = loadConfig($path[0] . '.php');
    
    return $data[$path[1]];
}