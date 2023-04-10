<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OneLoginController extends Controller
{

    public function login($uid){
        if(Auth::loginUsingId($uid)){
           return redirect('/user_systems');
        }else{
            return "error invalid user";
        }

    }

    public function test(Request $request){
       return "test";
    }

}
