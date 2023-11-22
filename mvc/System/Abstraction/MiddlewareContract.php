<?php 

namespace System\Abstraction;

use System\Support\Request;

abstract class MiddlewareContract 
{
    protected Request $request;

    public function __construct()
    {
        $this->request = request();
    }

    protected abstract function handle();
}