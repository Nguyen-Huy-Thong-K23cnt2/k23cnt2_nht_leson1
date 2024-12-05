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

Route::get('/nht-view1',function(){
    return view('nht-view1',
    ['name'=>'K23cnt -project1 - Nguyễn Huy Thông',]);
    });

Route::get('/nht-view2',function(){
    return view('nht-view2',
    [
    'name'=>"K23cnt -project1 - Nguyễn Huy Thông",
    'arr'=>[1,4,7,2,9],
    ]);
    
    });
    Route::get('/nht-view3',function(){
        return view('nht-view3',
    [
        'name'=>["Nguyễn"."Huy","Thông"],
        'arr'=>"10,32,45,58",
        'users'=>[],
    ]); 

    });