<?php 

namespace App\Controller;

use System\Support\Request;

class AppController 
{
    public function index(): void 
    {
        echo "App Controller starts!";

        // Request Handling from URL

        request()->email; // $request = new Request(); // $request->email;
        echo json_encode(request()->getData());
    }

    public function rizikprogrammer(): void 
    {
        echo "App Controller starts!";
    }
}