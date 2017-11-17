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

    public function getAddToCart(Request $request, int $id) {
        
    }


    public function getSession(Request $request) {
        if ($request->session()->has('session_name')) {
            $data = $request->session()->get('session_name');
            return view('session', compact('data'));

        } else {
            echo 'no data in the session';
        }
    }

    public function putSession(Request $request) {
        if ($request->session()->get('session_name')) {
            $old = $request->session()->get('session_name');
            
            $array = array_merge($old, ['thang']);
        } else {
            $array = ['thang'];
        }

        $request->session()->put('session_name',$array);
        
        echo 'a data has been added to the session';
    }

    public function forgetSession(Request $request) {
        $request->session()->forget('session_name');
        echo 'data has been removed from the session';
    }
}