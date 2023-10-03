<?php 

class Programmer
{
    public $skillSet;
    public function __construct($skillSet)
    {
        $this->skillSet = $skillSet;
    }

}

$skillSet = array("Coding", "Debugging", "Testing"); // Creating dependency
$skills = new Programmer($skillSet); // Injecting dependecny
print_r($skills->skillSet);
