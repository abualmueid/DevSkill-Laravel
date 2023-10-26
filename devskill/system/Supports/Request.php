<?php 

namespace DevSkill\Supports;

class Request 
{
    private array $data = [];

    public function __construct()
    {
        foreach($_GET as $name => $value)
        {
            $this->data[$name] = $_GET[$name];
        }

        foreach($_POST as $name => $value)
        {
            $this->data[$name] = $_POST[$name];
        }
    }

    public function all(): array
    {
        return $this->data;
    }

 }