<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        // $user = User::query()->where('name', $request->input('name'))->first();
        $user = User::query()->first();

        return view('welcome', [
            'user' => $user
        ]);
    }
}
