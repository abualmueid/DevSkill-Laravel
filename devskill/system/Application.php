<?php 

namespace DevSkill;

use DevSkill\Abstraction\ProviderInterface;
use DevSkill\Providers\RouteServiceProvider;
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

            echo readConfig('Services.database');

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
    }
}