<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\Controller;
use App\Models\offer;
use App\Models\programmer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class OfferController extends Controller
{
    public function index(){
        if(Gate::allows('buyerInfo'))
        {
            if(!(request()->has('search')))
            {
            $offers=offer::latest()->paginate(5)->withQuerystring();
            return view('buyer.offers.index',compact(['offers']));
            }
            else
            {
                $validated=request()->validate([
                'type'=>['required',Rule::in(['title','description','programmer_id','price'])],
                ]);

                if($validated['type']=='price')
                {  $validated2=request()->validate(['search'=>'required|integer|numeric|gt:0']);
                    $offers=offer::latest()->where($validated['type'],'<=',$validated2['search'])->paginate(5)->withQuerystring();
                }
                elseif($validated['type']=='programmer_id')
                {
                     $validated2=request()->validate(['search'=>'required|string']);
                    $user_ids=User::where([
                    ['name','like','%'.$validated2['search'].'%'],
                    ['role','=',2],
                    ]
                    )->pluck('id');

                    $programmers=programmer::whereIn('user_id',$user_ids)->pluck('id');

                    $offers=offer::latest()->whereIn($validated['type'],$programmers)->paginate(5)->withQuerystring();
                }
                else
                {
                    $validated2=request()->validate(['search'=>'required|string']);
                    $offers=offer::where($validated['type'],'like','%'.$validated2['search'].'%')->paginate(5)->withQuerystring();
                }
                return view('buyer.offers.index',compact(['offers']));
            }

        }
        else
            {return redirect()->route('buyer.information.create')->with('success','please fill your data to continue');}
    }

    public function createOrder(offer $offer){
        $buyer=Auth::user()->buyer;
        $buyer->offers()->attach($offer['id']);
        // $offer->buyers()->sync(Auth::user()->buyer['id']);

        return redirect()->route('buyer.offers.index')->with('success','new order has been added successfully');
    }


    public function destroyOrder(offer $offer){

        $offer->buyers()->detach(Auth::user()->buyer['id']);

        return redirect()->route('buyer.offers.index')->with('success','order has been deleted successfully');
    }

        public function myRequests(){
        if(Gate::allows('buyerInfo'))
        {
            if(!(request()->has('search')))
            {
            $offers=Auth::user()->buyer->offers()->paginate(5)->withQuerystring();
            return view('buyer.offers.myRequests',compact(['offers']));
            }
            else
            {
                $validated=request()->validate([
                'type'=>['required',Rule::in(['title','description','programmer_id','price'])],
                ]);

                if($validated['type']=='price')
                {  $validated2=request()->validate(['search'=>'required|integer|numeric|gt:0']);
                    $offers=Auth::user()->buyer->offers()->latest()->where($validated['type'],'<=',$validated2['search'])->paginate(5)->withQuerystring();
                }
                elseif($validated['type']=='programmer_id')
                {
                     $validated2=request()->validate(['search'=>'required|string']);
                    $user_ids=User::where([
                    ['name','like','%'.$validated2['search'].'%'],
                    ['role','=',2],
                    ]
                    )->pluck('id');

                    $programmers=programmer::whereIn('user_id',$user_ids)->pluck('id');

                    $offers=Auth::user()->buyer->offers()->latest()->whereIn($validated['type'],$programmers)->paginate(5)->withQuerystring();
                }
                else
                {
                    $validated2=request()->validate(['search'=>'required|string']);
                    $offers=Auth::user()->buyer->offers()->where($validated['type'],'like','%'.$validated2['search'].'%')->paginate(5)->withQuerystring();
                }
                return view('buyer.offers.myRequests',compact(['offers']));
            }

        }
        else
            {return redirect()->route('buyer.information.create')->with('success','please fill your data to continue');}
    }
}
