<?php

namespace App\Http\Controllers\admin;

use App\Models\service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class serviceController extends Controller
{
    public function index(){
        $services=service::paginate(5);
        return view('admin.services.index',compact(['services']));
    }
    public function show(service $service){
        $services=service::all();
        return view('admin.services.show',compact(['service','services']));
    }

    public function create(){
        // $teams=team::all();compact(['teams'])
        return view('admin.services.create');
    }

    public function store(){
        $validated=request()->validate([
            'image'=>'image|required',
            'title'=>'min:2|required',
            'content'=>'min:5|required'
        ]);

        // $validated2=request()->validate([
        //     'team_id' => 'required|array|min:1',
        //     'team_id.*' => 'integer|exists:teams,id',//validate each workers id.
        // ]);

        $imagepath=request()->file('image')->store('assets/img/services','public');
        $validated['image']=$imagepath;

        $service=service::create($validated);

        // $service->teams()->sync($validated2['team_id']);

        return redirect()->route('admin.services.index')->with('success','new service has been added successfully');
    }

    public function edit(service $service){
        // $services=service::all();,'teams'
        return view('admin.services.edit',compact(['service']));
    }

    public function update(service $service){

        $validated=request()->validate([
            'image'=>'image',
            'title'=>'min:2|required',
            'content'=>'min:5|required',
        ]);
        //     $validated2=request()->validate([
        //     'team_id' => 'required|array|min:1',
        //     'team_id.*' => 'integer|exists:teams,id',//validate each workers id.
        // ]);
        if (request()->hasFile('image'))
        {
            $imagepath=request()->file('image')->store('assets/img/services','public');
            $validated['image']=$imagepath;
            // 'storage/'.
            if($service['image']!=null)
            {Storage::disk('public')->delete($service['image']);}
        }
        // else
        // {$validated['image']=$service['image'];}

        $service->update($validated);

        // $service->teams()->sync($validated2['team_id']);



        return redirect()->route('admin.services.index')->with('success',' service has been edited successfully');
    }

    public function destroy(service $service){

        $service->delete();
        Storage::disk('public')->delete($service['image']);
        return redirect()->route('admin.services.index')->with('success','service has been deleted successfully');
    }
}
