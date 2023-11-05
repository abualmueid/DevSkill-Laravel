<?php 

namespace DevSkill\Supports;

class Request 
{
    private array $data = [];

    private static Request|null $instance = null;

    public static function instance(): Request
    {
        if(!self::$instance)
        {
            self::$instance = new Request();
        }

        return self::$instance;
    }

    public function __get(string $name): string|null
    {
        return $this->data[$name] ?? null;
    }

    public function __construct()
    {
        $this->setGetData();
        $this->setPostData();
    }

    private function setGetData(): void 
    {
        foreach($_GET as $name => $value)
        {
            $this->data[$name] = $value;
        }
    }

    private function setPostData(): void 
    {
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