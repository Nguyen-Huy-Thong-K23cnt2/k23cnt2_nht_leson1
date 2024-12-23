<?php
use App\Http\Controllers\NHT_LOAI_SAN_PHAMcontroller;
use App\Http\Controllers\NHT_QUAN_TRIController;
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
Route::get('admins/nht-login',[NHT_QUAN_TRIController::class,'nhtlogin'])->name('admins.nhtlogin');
Route::post('/admins/nht-login',[NHT_QUAN_TRIController::class,'nhtloginSubmit'])->name('admins.nhtloginSubmit');

# Admin Routes
Route::get('/nht-admins', function() {
    return view('nhtAdmins.index');
});

//xem loại sản phẩm
Route::get('/nht-admins/nht-loai-san-pham',[NHT_LOAI_SAN_PHAMcontroller::class,'nhtList'])
->name('nhtadmins.nhtloaisanpham');

//thêm
Route::get('/nht-admins/nht-loai-san-pham/nht-create',[NHT_LOAI_SAN_PHAMcontroller::class,'nhtCreate'])
->name('nhtadmins.nhtloaisanpham.nhtcreate');
Route::post('/nht-admins/nht-loai-san-pham/nht-create',[NHT_LOAI_SAN_PHAMcontroller::class,'nhtCreateSubmit'])
->name('nhtadmins.nhtloaisanpham.nhtcreatesubmit');

//edit
Route::get('/nht-admins/nht-loai-san-pham/nht-edit/{id}',[NHT_LOAI_SAN_PHAMcontroller::class,'nhtEdit'])
->name('nhtadmins.nhtloaisanpham.nhtedit');
