<?php 

namespace System;

include('System\Provider\RouteServiceProvider.php');
include('App\Provider\UserServiceProvider.php');
include('App\Config\App.php');
include('App\Support\GlobalFunction.php');

use System\Provider\RouteServiceProvider;
use App\Provider\UserServiceProvider;

class Application 
{

    private string $rootPath;

    public function __construct(string $path)
    {
        $this->rootPath = $path;
    }

    public function rootPath(): string 
    {
        return $this->rootPath;
    }

    public function path($path = null): string 
    {
        return $this->rootPath . ($path ?  DIRECTORY_SEPARATOR . $path : '');
    }

    public function run(): void
    {
        echo "Application Starts...";
        

        // $routeServiceProvider = new RouteServiceProvider();
        // $routeServiceProvider->start();
        
        // $userServiceProvider = new UserServiceProvider();
        // $userServiceProvider->start();

        // $appConfig = loadConfig('App.php');
        // echo json_encode($appConfig);
    }
}