<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//test seesson
route::get('nhtSecssionController/get',[nhtSecssionController::class,'getSecssionController'])->name('nhtSecssionController.get');
route::get('nhtSecssionController/set',[nhtSecssionController::class,'setSecssionController'])->name('nhtSecssionController.set');
route::get('nhtSecssionController/delete',[nhtSecssionController::class,'deleteSecssionController'])->name('nhtSecssionController.delete');