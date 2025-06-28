<?php

use App\Http\Controllers\admin\buyerController;
use Illuminate\Support\Facades\Route;



    route::group(['prefix'=>'admin/buyer/','as'=>'admin.buyer.','middleware'=>['auth', 'verified','can:admin']] ,function(){

        route::get('/',[buyerController::class,'index'])->name('index');

        route::delete('/{user}',[buyerController::class,'destroy'])->name('destroy');
    });
