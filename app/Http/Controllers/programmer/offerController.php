<?php

namespace App\Http\Controllers\programmer;

use App\Http\Controllers\Controller;
use App\Models\buyer;
use App\Models\offer;
use App\Models\programmer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class offerController extends Controller
{
    public function index(){
        if(Gate::allows('programmerInfo'))
        {
            $offers=offer::where('programmer_id',Auth::user()->programmer['id'])->paginate(5);
            return view('programmer.offers.index',compact(['offers']));
        }
        else
            return redirect()->route('programmer.information.create')
            ->with('success','please fill your data to continue');

    }

    public function create(){
        if(Gate::allows('programmerInfo'))
        {
        return view('programmer.offers.create');
        }
        else
            return redirect()->route('programmer.information.create')
            ->with('success','please fill your data to continue');

    }

    public function store(){
        $validated=request()->validate([
            'title'=>'min:2|required',
            'description'=>'min:2|required',
            'prise'=>'required|integer|numeric|gt:0'
        ]);

        $validated['programmer_id']=Auth::user()->programmer['id'];

        $offer=offer::create($validated);

        return redirect()->route('programmer.offers.index')
        ->with('success','new offer has been added successfully');
    }

    public function edit(offer $offer){
        if(Gate::allows('programmerInfo'))
        {
        return view('programmer.offers.edit',compact(['offer']));
        }
        else
            return redirect()->route('programmer.information.create')
            ->with('success','please fill your data to continue');

    }

    public function update(offer $offer){

        $validated=request()->validate([
            'title'=>'min:2|required',
            'description'=>'min:2|required',
            'prise'=>'required|integer|numeric|gt:0'
        ]);

        $offer->update($validated);

        return redirect()->route('programmer.offers.index')
        ->with('success',' offer has been edited successfully');
    }

    public function destroy(offer $offer){

        $offer->delete();
        return redirect()->route('programmer.offers.index')
        ->with('success','offer has been deleted successfully');
    }

    public function myRequests(){
        if(Gate::allows('programmerInfo'))
        {
            if(!(request()->has('search')))
            {
            $requests=offer::where('programmer_id',Auth::user()->programmer['id'])
            ->has('buyers')->paginate(5)->withQuerystring();
            return view('programmer.offers.myRequests',compact(['requests']));
            }
            else
            {
                $validated=request()->validate([
                'type'=>['required',Rule::in(['title','description','buyer_id','prise'])],
                ]);

                if($validated['type']=='prise')
                {  $validated2=request()->validate(['search'=>'required|integer|numeric|gt:0']);
                     $requests=offer::where('programmer_id',Auth::user()->programmer['id'])->has('buyers')
                     ->where($validated['type'],'<=',$validated2['search'])->paginate(5)->withQuerystring();
                }
                elseif($validated['type']=='buyer_id')
                {
                    $validated2=request()->validate(['search'=>'required|string']);
                    $user_ids=User::where([
                    ['name','like','%'.$validated2['search'].'%'],
                    ['role','=',1],
                    ]
                    )->pluck('id');

                    $buyers=buyer::whereIn('user_id',$user_ids)->pluck('id');

                    $requests=offer::where('programmer_id',Auth::user()->programmer['id'])
                    ->whereHas('buyers',
                        function ($query) use ($validated, $buyers) {$query->whereIn($validated['type'], $buyers);}
                              )
                    ->with(['buyers' =>
                            function ($query) use ($validated, $buyers) {$query->whereIn($validated['type'], $buyers);}
                          ])
                    ->paginate(5)->withQuerystring();

                    // $requests=offer::where('programmer_id',Auth::user()->programmer['id'])
                    // ->has('buyers')->buyers()->whereIn($validated['type'],$buyers)->paginate(5)->withQuerystring();

                }
                else
                {
                    $validated2=request()->validate(['search'=>'required|string']);
                     $requests=offer::where('programmer_id',Auth::user()->programmer['id'])->has('buyers')
                     ->where($validated['type'],'like','%'.$validated2['search'].'%')->paginate(5)->withQuerystring();
                }
                return view('programmer.offers.myRequests',compact(['requests']));
            }

        }
        else
            {return redirect()->route('programmer.information.create')->with('success','please fill your data to continue');}
    }
}
