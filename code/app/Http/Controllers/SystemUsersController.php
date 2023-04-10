<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SystemUsersController extends Controller
{
    public function getUserSystems()
    {
        if(Auth::user()->id==1){
            $systems=DB::table('systems')
            ->select('systems.*')->get();
        return $systems;
        }
        $sys=DB::table('system_users')
            ->join('systems','system_users.sys_id','=','systems.id')
            ->select('systems.*')
            ->where('uid','=',Auth::user()->id)->get();
        return $sys;

    }
}
