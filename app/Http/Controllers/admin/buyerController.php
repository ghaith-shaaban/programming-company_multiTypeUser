<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\buyer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class buyerController extends Controller
{
        public function index(){
        $users=User::where('role',1)->paginate(5)->withQuerystring();
        return view('admin.buyer.index',compact(['users']));
    }

    public function destroy(user $user){

        $user->delete();
        return redirect()->route('admin.buyer.index')->with('success','user has been deleted successfully');
    }
}
