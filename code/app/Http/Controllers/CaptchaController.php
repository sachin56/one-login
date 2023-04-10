<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    public function index()
    {
        $img = captcha_src('flat');
        return response()->json($img);
    }

    public function show($id,Request $request)
    {
        $rules = ['captcha' => 'required|captcha'];
        $validator = validator()->make($request->all(), $rules);
        if ($validator->fails()) {
            return true;
        } else {
            return false;
        }
    }
}
