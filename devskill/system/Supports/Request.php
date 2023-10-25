<?php 

namespace DevSkill\Supports;

class Request 
{
    public function __get($name)
    {
        // echo "Mueid";
        return $_GET[$name] ?? null;
    }
}