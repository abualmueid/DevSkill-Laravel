<?php 

namespace System;

include('System\Provider\RouteServiceProvider.php');
include('App\Provider\UserServiceProvider.php');
include('App\Config\App.php');
include('App/Support/GlobalFunction.php');

use System\Provider\RouteServiceProvider;
use App\Provider\UserServiceProvider;
use App\Support;
use Exception;
use System\Abstraction\ProviderInterface;
use System\Support\Route;

class Application 
{

    private string $rootPath;
    private static Application|null $instance = null;
    private array $providers = [
        RouteServiceProvider::class
    ];


    public function __construct(string $path)
    {
        $this->rootPath = $path;
    }

    public static function instance(string $path = null): self 
    {
        if(!self::$instance)
        {
            self::$instance = new self($path);
        }

        return self::$instance;
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
        try{
            echo "Application Starts...";
        
            $routeServiceProvider = new RouteServiceProvider();
            $routeServiceProvider->start();
            
            $userServiceProvider = new UserServiceProvider();
            $userServiceProvider->start();

            $appConfig = loadConfig('App.php');
            // echo json_encode($appConfig);

            $this->providers = array_merge($this->providers, $appConfig['providers']);

            foreach($this->providers as $provider)
            {
                $providerInstance = new $provider();
                
                if($providerInstance instanceof ProviderInterface) {
                    $providerInstance->start();
                } else {
                    throw new Exception($provider::class . " does not implement " . ProviderInterface::class);
                }
            }
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }

        // Folder, Sub-Folder, File Handling

        $value = config('Basic.Services.facebook.api_key'); // "Basic.Services.facebook.api_key"

        // Route Handling

        $this->initRoute();
    }

    private function initRoute()
    {
        try{
            $path = $_SERVER['REQUEST_URI'];
            $routes = Route::getRoutes();

            $method = strtolower($_SERVER['REQUEST_METHOD']);
            
            if($method === $routes[$path]['method']){
                $callback = $routes[$path]['callback'];
            }

            if(!$callback){
                throw new Exception("Route not found!");
            } else {
                $controller = new $callback[0];
                $controller->{$callback[1]}();
            }
        } catch (Exception $exception){
            echo $exception->getMessage();
        }
    }
}