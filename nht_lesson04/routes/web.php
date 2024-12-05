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
Route::get('/nht-view2',function(){
    return view('nht-view2',[
    
    'name'=>'Devmaster Academy!',
    'arr'=>[1,4,7,2,9],
    ]);
    
    });