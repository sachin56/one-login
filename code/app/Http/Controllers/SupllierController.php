<?php

namespace App\Http\Controllers;

use App\Models\Supllier;
use Illuminate\Http\Request;

class SupllierController extends Controller
{
    public function index()
    {
        return Supllier::all();
    }

    public function store(Request $request)
    {
        return Supllier::create($request->all());
    }

    public function update($id, Request $request)
    {
        $Supllier=Supllier::find($id);
        $Supllier->bp_no=$request->bp_no;
        $Supllier->name=$request->name;
        $Supllier->address=$request->address;
        $Supllier->email=$request->email;
        $Supllier->tele_no=$request->tele_no;
        $Supllier->Is_active=$request->Is_active;
        $Supllier->save();
        return true;
    }


    public function destroy($id)
    {
        $Supllier=Supllier::find($id);
        $Supllier->delete();
    }
}
