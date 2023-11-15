<?php 

namespace App\Controller;

use System\Abstraction\MiddlewareContract;

class TestMiddleware extends MiddlewareContract
{
    public function handle(): void 
    {
        echo "I'm Middleware, a middle man between Request and Route this time! " . $this->request->input('email');
    }
}