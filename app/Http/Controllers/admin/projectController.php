<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\project;
use App\Models\service;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class projectController extends Controller
{
    public function index(){
        $projects=project::paginate(5);
        return view('admin.projects.index',compact(['projects']));
    }

    public function show(project $project){
        // $projects=project::all();
        $services=service::all();
        return view('admin.projects.show',compact(['project','services']));
    }

    public function create(){
        // $teams=team::all();compact(['teams'])
        return view('admin.projects.create');
    }

    public function store(){
        $validated=request()->validate([
            'image'=>'image|required',
            'title'=>'min:2|required',
            'content'=>'min:5|required',
            'type'=>['required',Rule::in(['app','product','branding'])]
        ]);

        // $validated2=request()->validate([
        //     'team_id' => 'required|array|min:1',
        //     'team_id.*' => 'integer|exists:teams,id',//validate each workers id.
        // ]);

        $imagepath=request()->file('image')->store('assets/img/projects','public');
        $validated['image']=$imagepath;

        $project=project::create($validated);

        // $project->teams()->sync($validated2['team_id']);

        return redirect()->route('admin.projects.index')->with('success','new service has been added successfully');
    }

    public function edit(project $project){
        // $services=service::all();,'teams'
        return view('admin.projects.edit',compact(['project']));
    }

    public function update(project $project){

        $validated=request()->validate([
            'image'=>'image',
            'title'=>'min:2|required',
            'content'=>'min:5|required',
            'type'=>['required',Rule::in(['app','product','branding'])]
        ]);
        //     $validated2=request()->validate([
        //     'team_id' => 'required|array|min:1',
        //     'team_id.*' => 'integer|exists:teams,id',//validate each workers id.
        // ]);
        if (request()->hasFile('image'))
        {
            $imagepath=request()->file('image')->store('assets/img/projects','public');
            $validated['image']=$imagepath;
            // 'storage/'.
            if($project['image']!=null)
            {Storage::disk('public')->delete($project['image']);}
        }
        // else
        // {$validated['image']=$service['image'];}

        $project->update($validated);

        // $service->teams()->sync($validated2['team_id']);



        return redirect()->route('admin.projects.index')->with('success',' service has been edited successfully');
    }

    public function destroy(project $project){

        $project->delete();
        Storage::disk('public')->delete($project['image']);
        return redirect()->route('admin.projects.index')->with('success','service has been deleted successfully');
    }
}
