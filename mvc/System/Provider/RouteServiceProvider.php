<?php 

namespace System\Provider;

use System\Abstraction\ProviderInterface;

class RouteServiceProvider implements ProviderInterface
{
    public function start(): void 
    {
        echo "<br>Route Service Provider Starts!";
        include app()->path('Route/Web.php');
    }
}