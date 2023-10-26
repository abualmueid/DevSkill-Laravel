<?php 

namespace DevSkill\Supports;

class Request 
{
    private array $data = [];

    public function __construct()
    {
        foreach($_GET as $name => $value)
        {
            $this->data[$name] = $value;
        }

        // $this->data = array_merge($this->data, $_POST);
        foreach($_POST as $name => $value)
        {
            $this->data[$name] = $value;
        }
    }

    public function all(): array
    {
        return $this->data;
    }

 }