<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return Project::all();
    }

    public function store(Request $request)
    {
        return Project::create($request->all());
    }

    public function update($id, Request $request)
    {
        $project=Project::find($id);
        $project->master_no=$request->master_no;
        $project->name=$request->name;
        $project->address=$request->address;
        $project->tele_no=$request->tele_no;
        $project->Is_active=$request->Is_active;
        $project->save();
        return true;
    }


    public function destroy($id)
    {
        $project=Project::find($id);
        $project->delete();
    }
}
