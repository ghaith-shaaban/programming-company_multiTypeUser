<?php

use App\Http\Controllers\admin\TeamController;
use Illuminate\Support\Facades\Route;



    route::group(['prefix'=>'admin/teams/','as'=>'admin.teams.','middleware'=>['auth', 'verified','can:admin']] ,function(){

        route::get('/',[TeamController::class,'index'])->name('index');

        route::get('/create',[teamController::class,'create'])->name('create');

        route::post('/',[teamController::class,'store'])->name('store');

        route::get('/{team}',[teamController::class,'show'])->name('show')->withoutMiddleware(['auth', 'verified','can:admin']);

        route::get('edit/{team}',[teamController::class,'edit'])->name('edit');

        route::put('/{team}',[teamController::class,'update'])->name('update');

        route::delete('/{team}',[teamController::class,'destroy'])->name('destroy');
    });
