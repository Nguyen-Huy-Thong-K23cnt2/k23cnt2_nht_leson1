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
route::get('/nht-secssion/get',[nhtSecssionController::class,'nhtGetSessionData'])->name('nhtsecssion.get');
route::get('/nht-secssion/set',[nhtSecssionController::class,'nhtGetSessionData'])->name('nhtsecssion.set');
route::get('/nht-secssion/del',[nhtSecssionController::class,'nhtGetSessionData'])->name('nhtsecssion.del');

#Account
Route::get('/nht-login',[NhtAccountController::class,'nhtLogin'])->name('account.nhtlogin');