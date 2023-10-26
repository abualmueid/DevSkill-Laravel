<?php 

namespace DevSkill\Supports;

class Request 
{
    public function __get($name)
    {
        return $_GET[$name] ?? null;
    }
 }