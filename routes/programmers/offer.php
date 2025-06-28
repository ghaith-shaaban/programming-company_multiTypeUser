<?php

use App\Http\Controllers\programmer\offerController;
use Illuminate\Support\Facades\Route;



    route::group(['prefix'=>'programmers/offers/','as'=>'programmer.offers.','middleware'=>['auth', 'verified','can:programmer']] ,function(){

        route::get('/',[offerController::class,'index'])->name('index');

        route::get('/create',[offerController::class,'create'])->name('create');

        route::post('/',[offerController::class,'store'])->name('store');

        route::get('/myRequests',[offerController::class,'myRequests'])->name('myRequests');

        route::get('edit/{offer}',[offerController::class,'edit'])->name('edit');

        route::put('/{offer}',[offerController::class,'update'])->name('update');

        route::delete('/{offer}',[offerController::class,'destroy'])->name('destroy');
    });
