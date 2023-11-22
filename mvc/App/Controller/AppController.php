<?php 

namespace App\Controller;

use System\Support\Request;

class AppController 
{
    public function index() 
    {
        echo "<br>App Controller starts!";

        /**
         * Request Handling from URL
         */

        request()->email; // $request = new Request(); // $request->email;
        echo json_encode(request()->getData());

        /**
         * Working with View
         */

        return view('Welcome', [
            "name" => "mueid",
            "email" => "abualmueid24@gmail.com"
        ]);


    }

    public function rizikprogrammer(): void 
    {
        echo "App Controller starts!";
    }
}