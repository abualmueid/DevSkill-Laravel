<?php 

namespace DevSkill;

use DevSkill\Abstraction\ProviderInterface;
use DevSkill\Providers\RouteServiceProvider;
use DevSkill\Supports\Route;
use Exception;

class Application
{
    private string $rootPath;
    protected array $providers = [
        RouteServiceProvider::class
    ];
    private static Application|null $instance = null;

    public static function instance(string $path = null): self
    {
        if(!self::$instance)
        {
            self::$instance = new self($path);
        }

        return self::$instance;
    }

    public function __construct(string $root)
    {
        $this->rootPath = $root;
    }

    public function rootPath(): string
    {
        return $this->rootPath;
    }

    public function path(string $path=null): string
    {
        return $this->rootPath . ($path ? DIRECTORY_SEPARATOR . $path : '');
    }

    public function boot(): void 
    {
        try{
            app();
            // $appConfig = include $this->path('config/app.php');
            // $appConfig = include app()->path('config/app.php');
            $appConfig = loadConfig('app.php');
            $this->providers = array_merge($this->providers, $appConfig['providers']);

            //echo("\n".readConfig('Services.database'));

            $value = config('basic.Services.facebook.api_key');
            // echo json_encode($value);

            foreach($this->providers as $provider)
            {
                $providerObject = new $provider();

                if($providerObject instanceof ProviderInterface)
                {
                    $providerObject->boot();
                } else {
                    throw new Exception($provider . ' does not implement ' . ProviderInterface::class);
                }
            }
        } catch(Exception $exception) {
            echo $exception->getMessage();
        }

        $this->initRoute();
    }

    private function initRoute()
    {
        try
        {
            $path = $_SERVER['REQUEST_URI'];
            $routes = Route::getRoutes();

            // $route = array_filter($routes, function($route) use($path){
            //     return $route['path'] == $path;
            // })[1] ?? [];
            
            // $route = [];
            // foreach($routes as $route)
            // {
            //     if($route['path'] === $path)
            //     {
            //         $route = $route;
            //         break;
            //     }
            // }

            // foreach($routes as $path => $callback)
            // {
            //     if($path === $path)
            //     {
            //         $route = $callback;
            //         break;
            //     }
            // }
            // $method = [];
            $method = $_SERVER['REQUEST_METHOD'];

            $callback = [];
            if($routes[$path]['method'] === $method)
            {
                $callback = $routes[$path]['callback'];
            }
            // $callback = $routes[$path]['callback'];
            // print_r($route);
            if(!$callback)
            {
                throw new Exception("Route not found!");
            }
            
            // $callback = $route['callback'];
            // echo json_encode($callback);
            $controller = new $callback[0]();
            $controller->{$callback[1]}();
        } 
        catch(Exception $exception)
        {
            echo $exception->getMessage();
        }
        
    }
}