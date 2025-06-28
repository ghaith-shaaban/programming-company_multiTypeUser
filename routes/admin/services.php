<?php

use App\Http\Controllers\admin\serviceController;
use Illuminate\Support\Facades\Route;



    route::group(['prefix'=>'admin/services/','as'=>'admin.services.','middleware'=>['auth', 'verified','can:admin']] ,function(){

        route::get('/',[serviceController::class,'index'])->name('index');

        route::get('/create',[serviceController::class,'create'])->name('create');

        route::post('/',[serviceController::class,'store'])->name('store');

        route::get('/{service}',[serviceController::class,'show'])->name('show')->withoutMiddleware(['auth', 'verified','can:admin']);

        route::get('edit/{service}',[serviceController::class,'edit'])->name('edit');

        route::put('/{service}',[serviceController::class,'update'])->name('update');

        route::delete('/{service}',[serviceController::class,'destroy'])->name('destroy');
    });
