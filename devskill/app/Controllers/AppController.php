<?php 

namespace App\Controllers;

use DevSkill\Supports\Request;

class AppController
{
    public function index()
    {
        echo "We are making our own routing system!\n";

        $request = new Request();
        echo json_encode($request);
        echo $request->name;
        // echo $request->email;
        echo json_encode($request->all());

        request()->email;
        request()->input('email');

        // View
        return view('welcome', [
            "name" => "Mueid",
            "email" => "abualmueid24@gmail.com"
        ]);

    }

    public function devskill(): void
    {
        echo "DevSkill is such a good training institute in bd.";
    }
}