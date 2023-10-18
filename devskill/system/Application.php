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
        foreach($this->providers as $provider)
        {
            $providerObject = new $provider();

            try{

                if($providerObject instanceof ProviderInterface)
                {
                    $providerObject->boot();
                } else {
                    throw new Exception($provider . ' does not implement ' . ProviderInterface::class);
                }
                
            } catch(Exception $exception) {
                echo $exception->getMessage();
            }
        }

    }
}