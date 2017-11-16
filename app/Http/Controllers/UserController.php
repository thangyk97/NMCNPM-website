<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function getSession(Request $request) {
        if ($request->session()->has('session_name')) {
            echo $request->session()->get('session_name');
        } else {
            echo 'no data in the session';
        }
    }

    public function putSession(Request $request) {
        $request->session()->put('session_name', 'thang dep trai');
        echo 'a data has been added to the session';
    }

    public function forgetSession(Request $request) {
        $request->session()->forget('session_name');
        echo 'data has been removed from the session';
    }
}