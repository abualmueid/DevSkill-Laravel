<?php 

trait Message
{
    public function message()
    {
        echo "Hello Everyone!";
    }
}

class Welcome
{
    use Message;
}

$obj = new Welcome();
$obj->message();