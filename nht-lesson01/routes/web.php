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

Route::get('/greeting', function () {
    return '<h1>Hello world</h1>';
});
Route::get('/dev', function () {
    return '<h1>Xin chào thế giới</h1>';
});
Route::redirect('here','/there');
Route::get('/there', function () {
    return '<h1>Here to there</h1>';
});
Route::get('/dino', function () {
    return view('nht');
});
Route::get('/dev/{id}', function ($id) {
    return '<h1>Dev'.$id;
});