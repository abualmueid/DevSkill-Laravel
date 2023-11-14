<?php 

namespace App\Provider;

use System\Abstraction\ProviderInterface;

class UserServiceProvider implements ProviderInterface
{
    public function start(): void 
    {
        echo "<br>User Service Provider Starts!";
    }
}