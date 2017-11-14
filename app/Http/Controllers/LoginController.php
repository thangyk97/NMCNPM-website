<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{

    public function postForm(Request $request)
    {

        // $crazy = '[
        //     {
        //       "password": "Chaunceymouth",
        //       "id": 0,
        //       "name": "Brielle"
        //     },
        //     {
        //       "password": "East Cale",
        //       "id": 1,
        //       "name": "Ressie"
        //     }
        //   ]';
        // $user_array = json_decode($crazy, true);

        // foreach ($user_array as $row) {
        //     DB::insert('insert into user values (?, ?, ?)', 
        //     array($row['id'], '"'.$row['name'].'"', '"'.$row['password'].'"'));

        // }

    }

}
