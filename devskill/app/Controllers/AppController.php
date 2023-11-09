<?php 

namespace App\Controllers;

use App\Model\UserModel;
use DevSkill\Supports\Request;

class AppController
{
    public function devskill()
    {
        $user = new UserModel();
        // $row = $user->where('name', '=', 'Abu Al Mueid')
        //             ->where('email', '=', 'abualmueid24@gmail.com')
        //             ->where('phone', '=', '01631221109')
        //             ->first();

        $row = $user->where('name', 'Abu Al Mueid')
                    ->where('email', 'abualmueid24@gmail.com')
                    ->where('phone', '01631221109')
                    ->first();

        // echo json_encode($user->first());
        echo json_encode($row);
    }
}