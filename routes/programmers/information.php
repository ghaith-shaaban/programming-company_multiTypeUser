<?php

use App\Http\Controllers\programmer\informationController;
use Illuminate\Support\Facades\Route;



    route::group(['prefix'=>'programmers/information','as'=>'programmer.information.','middleware'=>['auth', 'verified','can:programmer']] ,function(){


        route::get('/create',[informationController::class,'create'])->name('create');

        route::post('/{user}',[informationController::class,'store'])->name('store');

        route::get('/edit',[informationController::class,'edit'])->name('edit');

        route::put('/{user}',[informationController::class,'update'])->name('update');

    });

