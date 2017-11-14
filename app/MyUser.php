<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class MyUser extends Model
{
    public function checkAccount($name, $password)
    {
        $result = DB::select('select * from user where name = ? and password = ?', 
                             array($name, $password));
        if(empty($result))
        {
            return FALSE;
        } 
        else
        {
            return TRUE;
        }
    }
}