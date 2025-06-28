<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\Controller;
use App\Models\buyer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class informationController extends Controller
{
        public function create()
    {
        return view('buyer.informationCreate');
    }

     public function store(User $user)
    {
        $validated=request()->validate([
            'bank_account'=>'required|digits_between:10,15|integer|numeric|gt:0'
        ]);

        $validated['user_id']=$user->id;

        buyer::create($validated);

        return redirect()->route('buyer.information.edit')->with('success','your data has been updated');
    }

    public function edit()
    {
        $buyer['bank_account']= Auth::user()->buyer['bank_account'];
        return view('buyer.informationUpdate',compact(['buyer']));
    }

     public function Update(User $user)
    {
        $validated=request()->validate([
            'bank_account'=>'required|digits_between:10,15|integer|numeric|gt:0'
        ]);

        $user->buyer->update($validated);

        return redirect()->route('buyer.information.edit')->with('success','your data has been updated');
    }

}
