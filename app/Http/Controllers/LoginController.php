<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MyUser;
use DB;

class LoginController extends Controller
{

    public function postForm(Request $request)
    {

        $user = new MyUser();

        if($user->checkAccount($request->name, $request->password))
        {
            echo "login successive !";
        } else
        {
            echo "wrong user or password !";
        }



        // $crazy = '[
        //     {
        //       "password": "Murphyberg",
        //       "id": 98,
        //       "name": "Otha"
        //     },
        //     {
        //       "password": "North Brandon",
        //       "id": 99,
        //       "name": "Beatrice"
        //     }
        //   ]';
        // $user_array = json_decode($crazy, true);

        // foreach ($user_array as $row) {
        //     DB::insert('insert into user values (?, ?, ?)', 
        //     array($row['id'], $row['name'], $row['password']));

        // }

        // $user_array = DB::select('select * from user where 1');

        // $myJson = json_encode($user_array);

        // echo $myJson;

    }

}
