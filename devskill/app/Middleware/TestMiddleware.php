<?php

namespace App\Middleware;

use DevSkill\Abstraction\MiddlewareContract;
use DevSkill\Supports\Request;

class TestMiddleware extends MiddlewareContract
{
    // public function handle(Request $request): void
    // {
    //     echo "From TestMiddleware: " . $request->input('email');
    // }

    public function handle(): void
    {
        echo "From TestMiddleware: " . $this->request->input('email');
    }
}