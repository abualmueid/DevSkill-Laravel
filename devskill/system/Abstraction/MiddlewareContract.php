<?php 

namespace DevSkill\Abstraction;

use DevSkill\Supports\Request;

abstract class MiddlewareContract
{
    protected Request $request;

    public function __construct()
    {
        $this->request = request();
    }

    // protected abstract function handle(Request $request);
    protected abstract function handle();
}