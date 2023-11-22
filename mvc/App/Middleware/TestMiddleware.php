<?php 

namespace App\Middleware;

use System\Abstraction\MiddlewareContract;

class TestMiddleware extends MiddlewareContract
{
    public function handle(): void 
    {
        echo "<br>Hi I'm middleware";
        //echo "I'm Middleware, a middle man between Request and Route this time! " . $this->request->input('email');
    }
}