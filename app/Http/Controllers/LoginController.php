<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function postForm(Request $request)
    {
        if($request->name == "blabla") {
            echo "true";
        } else {
            echo "false";
        }
    }

}
