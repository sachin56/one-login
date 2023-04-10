<?php

namespace App\Http\Controllers;

use App\Models\System;
use App\Models\System_users;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class UserRegisterController extends Controller
{

    public function index()
    {
        $users = User::all();
        return DataTables::of($users)->make(true);
    }

    public function show($id)
    {
        $users = User::find($id);
        $systems = DB::table('system_users')
            ->select('sys_id')
            ->where('uid', '=', $id)
            ->get();

        $users->sytems = $systems;

        return $users;
    }


    public function store(Request $request)
     {
        if ($request->systems == null) {
            $ret = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'phone' => $request->input('phone'),
                'gender' => $request->input('gender'),
                'pid'=>$request->input('pid'),
                'designation'=>$request->input('designation')
            ]);
            return redirect('/register_user');
        }

        $array = $request->systems;

        DB::transaction(function () use ($request, $array) {
            $ret = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'phone' => $request->input('phone'),
                'gender' => $request->input('gender'),
                'pid'=>$request->input('pid'),
                'designation'=>$request->input('designation')
            ]);

            for ($x = 0; $x < count($array); $x++) {
                System_users::create(['sys_id' => $array[$x], 'uid' => $ret->id]);
            }

            $systems = System::all();
        foreach($systems as $system){
                $url=$system->domain;
                $response = Http::post('http://' . $url . '/api/Update_user', [
                    'id' => $ret->id,
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => $request->input('password'),
                    'pid'=>$request->input('pid'),
                    'designation'=>$request->input('designation'),
                    'gender' => $request->input('gender'),
                    'phone' => $request->input('phone'),
                    'api_token'=>'MAGA_AUHT_00001'
                ]);
                echo $response;
        }

        });


        return redirect('/register_user');

    }

    public function update($id, Request $request)
    {
        // if ($request->systems == null) {
        //     $user = User::find($id);
        //     $user->name = $request->name;
        //     $user->email = $request->email;
        //     if ($request->password) {
        //         $user->password = Hash::make($request->password);
        //     }
        //     $user->phone = $request->phone;
        //     $user->gender = $request->gender;
        //     $user->save();
        //     return true;
        // }

        $array = $request->systems;

        $not_err = true;
        $systems = System::all();
        foreach($systems as $system){
            $url=$system->domain;
            $response = Http::put('http://' . $url . '/api/Update_user/'.$id, [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'pid'=>$request->input('pid'),
                'designation'=>$request->input('designation'),
                'gender' => $request->input('gender'),
                'phone' => $request->input('phone'),
                'api_token'=>'MAGA_AUHT_00001'
            ]);

            if (!($response->status() == 200)) {
                $not_err = false;
                break;
            }
        }


        if ($not_err) {
            DB::transaction(function () use ($request, $array,$id) {
                $user = User::find($id);
                $user->name = $request->name;
                $user->email = $request->email;
                if ($request->password) {
                    $user->password = Hash::make($request->password);
                }
                $user->phone = $request->phone;
                $user->gender = $request->gender;
                $user->designation=$request->designation;
                $user->pid=$request->pid;
                $user->save();

                DB::table('system_users')->where('uid', '=', $id)->delete();
                for ($x = 0; $x < count($array); $x++) {
                    System_users::create(['sys_id' => $array[$x], 'uid' => $id]);
                }
            });
        } else {
            return "DB Error";
        }
        return true;
    }

    public function user_update($id,Request $request)
     {
        // dd($request);

        $not_err = true;
        $systems = System::all();

        foreach($systems as $system){
            $url=$system->domain;
            $response = Http::put('http://' . $url . '/api/Update_user/'.$id, [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'pid'=>$request->input('pid'),
                'designation'=>$request->input('designation'),
                'gender' => $request->input('gender'),
                'phone' => $request->input('phone'),
                'api_token'=>'MAGA_AUHT_00001'
            ]);
            echo $response;
            if (!($response->status() == 200)) {
                $not_err = false;
                break;
            }
        }


        if ($not_err) {
            DB::transaction(function () use ($request,$id) {
                $user = User::find($id);
                $user->name = $request->name;
                if ($request->password) {
                    $user->password = Hash::make($request->password);
                }
                $user->phone = $request->phone;
                $user->gender = $request->gender;
                $user->designation=$request->designation;
                $user->pid=$request->pid;
                $user->save();

            });
        } else {
            return "DB Error";
        }

        return redirect('/user_profile');

    }
    
    public function password_update($id,Request $request){

        $not_err = true;
        $systems = System::all();

        foreach($systems as $system){
            $url=$system->domain;
            $response = Http::put('http://' . $url . '/api/Update_user/'.$id, [

                'password' => $request->input('password'),
                'api_token'=>'MAGA_AUHT_00001'
            ]);

            if (!($response->status() == 200)) {
                $not_err = false;
                break;
            }
        }


        if ($not_err) {
            DB::transaction(function () use ($request,$id) {
                $user = User::find($id);

                if ($request->password) {
                    $user->password = Hash::make($request->password);
                }

                $user->save();

            });
        } else {
            return "DB Error";
        }
        return true;
    }

}
