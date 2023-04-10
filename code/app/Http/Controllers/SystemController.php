<?php

namespace App\Http\Controllers;

use App\Models\System;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class SystemController extends Controller
{
    public function index(){
       return System::all();
    }

    public function store(Request $request){
        $users = DB::table('users')->get();
        $url = $request->domain;
        $response = Http::post('http://' . $url . '/api/db_sync',['db'=>$users,'domain'=>$url,'api_token'=>'MAGA_AUHT_00001']);

        if ($response->status() == 500) {
          return "Error".$response;
        }


        $attachment=null;
        if($request->hasFile('attachment')){

            $file=$request->file('attachment');
            $extension=$file->getClientOriginalExtension(); //image extension
            $filename=time().'.'.$extension;
            $file->move('attachments/',$filename);
            $attachment=$filename;
        }

        $ret=System::create([
            'system_name' => $request->input('system_name'),
            'domain' => $request->input('domain'),
            'attachment' => $attachment
        ]);
        return redirect('register_system');
    }

    public function update($id,Request $request){

        $sys=System::find($id);
        if($request->hasFile('attachment')){
            $file=$request->file('attachment');
            $extension=$file->getClientOriginalExtension(); //image extension
            $filename=time().'.'.$extension;
            $file->move('attachments/',$filename);
            $sys->attachment=$filename;
        }
        $sys->system_name=$request->system_name;
        $sys->domain=$request->domain;
        $sys->save();
        return true;
    }
    public function destroy($id){
        return System::find($id)->delete();
    }

}
