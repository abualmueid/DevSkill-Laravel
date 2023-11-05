<?php

use DevSkill\Application;
use DevSkill\Supports\Request;

function app(): Application
{
    //echo "\nApp from Global Function";

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

function path($path = null)
{
    return app()->path($path);
}

function config($path, $default = null)
{
    $newPath = '';
    $value = [];

    $array = explode('.', $path);
    foreach ($array as $key)
    {
        if($value)
        {
            $value = $value[$key] ?? null;  
        }

        else if(!$value)
        {
            $newPath .= '/' . $key;

            if(is_file(path('config'.$newPath.'.php')))
            {
                $value = loadConfig($newPath.'.php');
            }
        }
    }

    return $value ?? $default;
}

function request(): Request
{
    return Request::instance();
}

function view($path, $data = [])
{
    extract($data);

    return include path('resources/views/'.$path.'.php');
}