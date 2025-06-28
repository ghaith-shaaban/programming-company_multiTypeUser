<?php

use App\Http\Controllers\buyer\offerController;
use Illuminate\Support\Facades\Route;



    route::group(['prefix'=>'buyers/offers/','as'=>'buyer.offers.','middleware'=>['auth', 'verified','can:buyer']] ,function(){

        route::get('/',[offerController::class,'index'])->name('index');

        route::get('/myRequests',[offerController::class,'myRequests'])->name('myRequests');

        route::post('/create/{offer}',[offerController::class,'createOrder'])->name('createOrder');

        route::delete('/{offer}',[offerController::class,'destroyOrder'])->name('destroyOrder');
    });
