<?php

namespace App\Http\Controllers\programmer;

use App\Http\Controllers\Controller;
use App\Models\programmer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class informationController extends Controller
{
        public function create()
    {
        return view('programmer.informationCreate');
    }

     public function store(User $user)
    {
        $validated=request()->validate([
            'job'=>['required',Rule::in(['web developer','mobile app developer','windows app developer','mac app developer'])],
            'city'=>'required|min:2|string'
        ]);

        $validated['user_id']=$user->id;

        programmer::create($validated);

        return redirect()->route('programmer.information.edit')->with('success','your data has been updated');
    }

    public function edit()
    {
        $programmer['city']= Auth::user()->programmer['city'];
        $programmer['job']=Auth::user()->programmer['job'];
        return view('programmer.informationUpdate',compact(['programmer']));
    }

     public function Update(User $user)
    {
        $validated=request()->validate([
            'job'=>['required',Rule::in(['web developer','mobile app developer','windows app developer','mac app developer'])],
            'city'=>'required|min:2|string'
        ]);

        $user->programmer->update($validated);

        return redirect()->route('programmer.information.edit')->with('success','your data has been updated');
    }

}
