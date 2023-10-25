<?php 

namespace App\Controllers;

use DevSkill\Supports\Request;

class AppController
{
    public function index(): void
    {
        echo "We are making our own routing system!\n";

        $request = new Request();
        echo $request->name;
    }

    public function devskill(): void
    {
        echo "DevSkill is such a good training institute in bd.";
    }
}