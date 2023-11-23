<?php 

namespace System;

use System\Provider\RouteServiceProvider;
use App\Provider\UserServiceProvider;
use App\Support;
use App\Support\GlobalFunction;
use Exception;
use System\Abstraction\MiddlewareContract;
use System\Abstraction\ProviderInterface;
use System\Support\Route;
use MVC\Config\App;
use MVC\App\Controller\TestMiddleware;
use PluginMaster\Container\Container;

class Application extends Container
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

    public static function instance(string $path = null): Application 
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

    public function path(string $path = null): string 
    {
    
        return $this->rootPath . ($path ?  DIRECTORY_SEPARATOR . $path : '');
    }

    public function run(): void
    {
        try{
            echo "Application Starts...";
            
            $appConfig = loadConfig('App.php');
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
        echo json_encode("<br>api_key: " . $value);

        // Route Handling

        $this->initRoute();
    }

    /*
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
    */

    // For Middleware // 

    private function initRoute()
    {
        try{
            // $path = strtok($_SERVER['REQUEST_URI'], '/');
            $path = $_SERVER['REQUEST_URI'];
            $routes = Route::getRoutes();
            $methodServer = strtolower($_SERVER['REQUEST_METHOD']);

            $middleware = '';
            $callback = [];
            $method = $methodServer;
            $middlewareRoute = '';

            $middlewareRoute = $routes['/'][$method]['middleware'] ?? ''; // Manually setting path
            $callback = $routes['/'][$method]['callback'] ?? [];
            
            if(!$middlewareRoute){
                throw new Exception("Middleware not found!");
            } else {
                $middlewares = config('App.middlewares');
                $middleware = $middlewares[$middlewareRoute] ?? [];
                
                if($middleware) {
                    $middlewareInstance = new $middleware();

                    if($middlewareInstance instanceof MiddlewareContract){
                        $middlewareInstance->handle();
                    } else {
                        echo $middleware::class . " should extend " . MiddlewareContract::class;
                    }
                }
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