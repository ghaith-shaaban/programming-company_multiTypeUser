<?php

use App\Http\Controllers\mainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\programmer\informationController;
use Illuminate\Support\Facades\Route;

Route::get('/',[mainController::class,'welcome'])->name('main');

/*=================== ADMIN ROUTES ========================*/

require __DIR__.'/admin/projects.php';
require __DIR__.'/admin/services.php';
require __DIR__.'/admin/teams.php';
require __DIR__.'/admin/buyers.php';
require __DIR__.'/admin/programmers.php';
Route::get('/admin/dashboard',[mainController::class,'admin'] )->middleware(['auth', 'verified','can:admin'])
->name('admin.dashboard');


/*=================== buyer ROUTES ========================*/

Route::get('/buyers/dashboard',[mainController::class,'buyer'] )->middleware(['auth', 'verified','can:buyer'])
->name('buyer.dashboard');
require __DIR__.'/buyers/offer.php';
require __DIR__.'/buyers/information.php';

/*=================== programmer ROUTES ========================*/

Route::get('/programmers/dashboard',[mainController::class,'programmer'] )->middleware(['auth', 'verified','can:programmer'])
->name('programmer.dashboard');

require __DIR__.'/programmers/information.php';
require __DIR__.'/programmers/offer.php';

/*=================== BREEZE ROUTES ========================*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
