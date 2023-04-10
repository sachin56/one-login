<?php

namespace App\Http\Controllers;

use App\Mail\Password_Reset_Mail;
use App\Models\System;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class Password_Reset_Controller extends Controller
{
    public function index(){
        $img=captcha_src('flat');
        return view('user.reset_password',compact('img'));
    }

    public function store(Request $request){
        $rules = ['captcha' => 'required|captcha'];

        $validator = validator()->make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors(['name' => 'Captcha was Incorrect']);
        }
        $user=User::where('email','=',$request->email)->first();
        $temp_passowrd=null;
        if($user){
          $temp_passowrd=time();
          $user->password=Hash::make($temp_passowrd);
          $user->save();

          $not_err = true;
          $systems = System::all();

          foreach($systems as $system){
              $url=$system->domain;
              $response = Http::put('http://' . $url . '/api/Update_user/'.$user->id, [
                  'password' => $temp_passowrd,
                  'api_token'=>'MAGA_AUHT_00001'
              ]);
              echo $response;
              if (!($response->status() == 200)) {
                  $not_err = false;
                  break;
              }
          }
         Mail::to($request->email)->send(new Password_Reset_Mail($temp_passowrd,$user->name));
          return view('user.password_redirect');
        }else{
            return "Please Check Your Email Address";
        }


    }
}
