<?php 

namespace DevSkill;

class Application
{
    private string $rootPath;

    public function __construct(string $root)
    {
        $this->rootPath = $root;
    }

    public function rootPath(): string 
    {
        return $this->rootPath;
    }

}