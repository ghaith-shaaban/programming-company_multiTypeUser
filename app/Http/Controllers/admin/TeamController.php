<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\service;
use App\Models\team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index(){
        $teams=team::paginate(5);
        return view('admin.teams.index',compact(['teams']));
    }

    public function show(team $team){
        $teams=team::all();
        $services=service::all();//for footer
        return view('admin.teams.show',compact(['team','teams','services']));
    }

    public function create(){
        // $teams=team::all();compact(['teams'])
        return view('admin.teams.create');
    }

    public function store(){
        $validated=request()->validate([
            'image'=>'image|required',
            'name'=>'min:2|required',
            'jobDescription'=>'min:2|required',
            'bio'=>'min:5|required'
        ]);

        // $validated2=request()->validate([
        //     'team_id' => 'required|array|min:1',
        //     'team_id.*' => 'integer|exists:teams,id',//validate each workers id.
        // ]);

        $imagepath=request()->file('image')->store('assets/img/teams','public');
        $validated['image']=$imagepath;

        $team=team::create($validated);

        // $service->teams()->sync($validated2['team_id']);

        return redirect()->route('admin.teams.index')->with('success','new service has been added successfully');
    }

    public function edit(team $team){
        // $services=service::all();,'teams'
        return view('admin.teams.edit',compact(['team']));
    }

    public function update(team $team){

        $validated=request()->validate([
            'image'=>'image',
            'name'=>'min:2|required',
            'jobDescription'=>'min:2|required',
            'bio'=>'min:5|required'
        ]);
        //     $validated2=request()->validate([
        //     'team_id' => 'required|array|min:1',
        //     'team_id.*' => 'integer|exists:teams,id',//validate each workers id.
        // ]);
        if (request()->hasFile('image'))
        {
            $imagepath=request()->file('image')->store('assets/img/teams','public');
            $validated['image']=$imagepath;
            // 'storage/'.
            if($team['image']!=null)
            {Storage::disk('public')->delete($team['image']);}
        }
        // else
        // {$validated['image']=$service['image'];}

        $team->update($validated);

        // $service->teams()->sync($validated2['team_id']);



        return redirect()->route('admin.teams.index')->with('success',' service has been edited successfully');
    }

    public function destroy(team $team){

        $team->delete();
        Storage::disk('public')->delete($team['image']);
        return redirect()->route('admin.teams.index')->with('success','service has been deleted successfully');
    }
}
