<?php
use App\Http\Controllers\NHT_LOAI_SAN_PHAMcontroller;
use App\Http\Controllers\NHT_QUAN_TRIController;
use App\Http\Controllers\NHT_SAN_PHAMController;
use App\Http\Controllers\NHT_KHACH_HANGcontroller;
use App\Http\Controllers\NHT_DANH_SACH_QUAN_TRIController;
use App\Http\Controllers\NHT_HOA_DONController;
use App\Http\Controllers\NHT_CT_HOA_DONController;

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

//thêm loại sản phẩm
Route::get('/nht-admins/nht-loai-san-pham/nht-create',[NHT_LOAI_SAN_PHAMcontroller::class,'nhtCreate'])
->name('nhtadmins.nhtloaisanpham.nhtcreate');
Route::post('/nht-admins/nht-loai-san-pham/nht-create',[NHT_LOAI_SAN_PHAMcontroller::class,'nhtCreateSubmit'])
->name('nhtadmins.nhtloaisanpham.nhtcreatesubmit');

//edit loại sản phẩm
Route::get('/nht-admins/nht-loai-san-pham/nht-edit/{id}',[NHT_LOAI_SAN_PHAMcontroller::class,'nhtEdit'])
->name('nhtadmins.nhtloaisanpham.nhtedit');
Route::post('/nht-admins/nht-loai-san-pham/nht-edit',[NHT_LOAI_SAN_PHAMcontroller::class,'nhtEditSubmit'])
->name('nhtadmins.nhtloaisanpham.nhteditsubmit');

//view
Route::get('/nht-admins/nht-loai-san-pham/nht-view/{id}',[NHT_LOAI_SAN_PHAMcontroller::class,'nhtView'])
->name('nhtadmins.nhtloaisanpham.nhtview');

// delete loại sản phẩm
Route::get('/nht-admins/nht-loai-san-pham/nht-delete/{id}',[NHT_LOAI_SAN_PHAMController::class,'nhtDelete'])
->name('nhtadmins.nhtloaisanpham.nhtdelete');

//sản phẩm
Route::get('/nht-admins/nht-san-pham',[NHT_SAN_PHAMController::class,'nhtList'])
->name('nhtadims.nhtsanpham');
//thêm loại sản phẩm
Route::get('/nht-admins/nht-san-pham/nht-create',[NHT_SAN_PHAMController::class,'nhtCreate'])
->name('nhtadmins.nhtsanpham.nhtcreate');
Route::post('/nht-admins/nht-san-pham/nht-create',[NHT_SAN_PHAMController::class,'nhtCreateSubmit'])
->name('nhtadmins.nhtsanpham.nhtCreateSubmit');

//xem sản phẩm
Route::get('/nht-admins/nht-san-pham/nht-detail/{id}', [NHT_SAN_PHAMController::class, 'nhtDetail'])
->name('nhtadmins.nhtsanpham.nhtDetail');
// edit
Route::get('/nht-admins/nht-san-pham/nht-edit/{id}', [NHT_SAN_PHAMController::class, 'nhtEdit'])
->name('nhtadmins.nhtsanpham.nhtEdit');
// Xử lý cập nhật sản phẩm
Route::post('/nht-admins/nht-san-pham/nht-edit/{id}', [NHT_SAN_PHAMController::class, 'nhtEditSubmit'])
->name('nhtadmins.nhtsanpham.nhtEditSubmit');
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nht-admins/nht-san-pham/nht-delete/{id}', [NHT_SAN_PHAMController::class, 'nhtdelete'])
->name('nhtadmins.nhtsanpham.nhtdelete');


