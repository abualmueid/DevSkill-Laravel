<?php 

namespace System\Support;

class Request 
{
    private array $data;
    private static Request|null $instance = null;

    public function __construct()
    {
        $this->setGetData();
        $this->setPostData();
    }

    public static function instance(): Request 
    {
        if(!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __get($name)
    {
        return $_GET[$name] ?? null;
    }

    public function setGetData(): void 
    {
        foreach($_GET as $name => $value)
        {
            $this->data[$name] = $value;
        }
    }

    public function setPostData(): void 
    {
        foreach($_POST as $name => $value)
        {
            $this->data[$name] = $value;
        }
    }

    public function getData(): array 
    {
        return $this->data;
    }
}

