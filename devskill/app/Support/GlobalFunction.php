<?php

use DevSkill\Application;

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
    // print_r($array);
    foreach ($array as $key)
    {
        if($value)
        {
            $value = $value[$key] ?? null;
            // echo "Not empty";
            //print_r("value: " . $value);   
        }

        else if(!$value)
        {
            $newPath .= '/' . $key;
            // print_r("newpath: " . $newPath . ", key: " . $key . "\n");

            if(is_file(path('config'.$newPath.'.php')))
            {
                $value = loadConfig($newPath.'.php');
                // echo "path value: "; print_r($value);
            }
        }
    }

    return $value ?? $default;
}