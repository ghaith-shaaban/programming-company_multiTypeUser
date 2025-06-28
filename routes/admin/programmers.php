<?php

use App\Http\Controllers\admin\programmerController;
use Illuminate\Support\Facades\Route;



    route::group(['prefix'=>'admin/programmer/','as'=>'admin.programmer.','middleware'=>['auth', 'verified','can:admin']] ,function(){

        route::get('/',[programmerController::class,'index'])->name('index');

        route::delete('/{user}',[programmerController::class,'destroy'])->name('destroy');
    });
