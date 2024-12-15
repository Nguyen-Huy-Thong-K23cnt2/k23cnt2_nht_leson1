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
route::get('nhtSecssion/get',[nhtSecssionController::class,'nhtstoreSessionData'])->name('nhtSecssion.get');
route::get('nhtSecssion/set',[nhtSecssionController::class,'nhtstoreSessionData'])->name('nhtSecssion.set');
route::get('nhtSecssion/del',[nhtSecssionController::class,'nhtdeleteSessionData'])->name('nhtSecssion.del');