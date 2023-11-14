<?php 

namespace App\Support;

use System\Application;

function app(): Application 
{
    return Application::instance();
}

function path(string $path = null): string 
{
    return app()->path($path);   
}

function loadConfig(string $path): string
{
    $path = app()->path('Config/'.$path);

    return file_exists($path) ? include $path : 'Path does not exist!';
}

function config(string $pathParam): mixed
{
    $array = explode(".", $pathParam);

    $value = [];
    $path = '';
    
    foreach($array as $key)
    {
        if($value)
        {
            $value = $value[$key] ?? null;
        }

        if(!$value) 
        {
            $path .= '/' . $key; 

            if(is_file(path('Config'.$path.'.php')))
            {
                $value = loadConfig($path . '.php');
            }
        }
    }

    return $value ?? null;
}