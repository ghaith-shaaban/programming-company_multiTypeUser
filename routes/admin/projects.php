<?php

use App\Http\Controllers\admin\projectController;
use Illuminate\Support\Facades\Route;



    route::group(['prefix'=>'admin/projects/','as'=>'admin.projects.','middleware'=>['auth', 'verified','can:admin']] ,function(){

        route::get('/',[projectController::class,'index'])->name('index');

        route::get('/create',[projectController::class,'create'])->name('create');

        route::post('/',[projectController::class,'store'])->name('store');

        route::get('/{project}',[projectController::class,'show'])->name('show')->withoutMiddleware(['auth', 'verified','can:admin']);

        route::get('edit/{project}',[projectController::class,'edit'])->name('edit');

        route::put('/{project}',[projectController::class,'update'])->name('update');

        route::delete('/{project}',[projectController::class,'destroy'])->name('destroy');
    });
