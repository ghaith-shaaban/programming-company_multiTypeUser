<?php

namespace App\Http\Controllers;

use App\Models\offer;
use App\Models\project;
use App\Models\service;
use App\Models\team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class mainController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function welcome(Request $request)
    {
        $services=service::all();
        $projects=project::all();
        $teams=team::all();
        return view('welcome',compact(['services','projects','teams']));
    }

        public function admin(Request $request)
    {
        $number['services']=service::count();
        $number['projects']=project::count();
        $number['team']=team::count();
        return view('admin.dashboard',compact(['number']));
    }

        public function buyer(Request $request)
    {
         $user=Auth::user();
        $buyer=$user;//the whole user row
        if(Gate::allows('buyerInfo'))
        {
            $request['number']=$user->buyer->offers()->count();
            $buyer['bank_account']=$user->buyer['bank_account'];

            return view('buyer.dashboard',compact(['buyer','request']));
        }
        else
        return redirect()->route('buyer.information.create')->with('success','please fill your data to continue');

        return view('buyer.dashboard');
    }

        public function programmer()
    {
        $user=Auth::user();
        $programmer=$user;//the whole user row
        if(Gate::allows('programmerInfo'))
        {
            $request['number']=0;
            $requests=offer::where('programmer_id',Auth::user()->programmer['id'])->get();
            foreach($requests as $req)
            {$request['number']+=$req->buyers()->count();}
            $offer['number']=offer::where('programmer_id',Auth::user()->programmer['id'])->count();
            $programmer['city']=$user->programmer['city'];
            $programmer['job']=$user->programmer['job'];

            return view('programmer.dashboard',compact(['programmer','offer','request']));
        }
        else
        return redirect()->route('programmer.information.create')->with('success','please fill your data to continue');
    }
}
