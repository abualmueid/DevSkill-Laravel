<?php 

namespace App\Providers;
use DevSkill\Abstraction\ProviderInterface;

class UserServiceProvider implements ProviderInterface
{
    public function boot(): void 
    {
        echo "\nFrom User Service Provider";
    }
}