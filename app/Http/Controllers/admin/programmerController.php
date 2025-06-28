<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\programmer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class programmerController extends Controller
{     public function index(){
        $users=User::where('role',2)->paginate(5)->withQuerystring();
        return view('admin.programmer.index',compact(['users']));
    }

    public function destroy(User $user){

        $user->delete();
        return redirect()->route('admin.programmer.index')->with('success','user has been deleted successfully');
    }
}
