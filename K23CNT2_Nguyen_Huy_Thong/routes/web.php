<?php
use App\Http\Controllers\NHT_LOAI_SAN_PHAMcontroller;
use App\Http\Controllers\NHT_SAN_PHAMController;
use App\Http\Controllers\NHT_KHACH_HANGcontroller;
use App\Http\Controllers\NHT_DANH_SACH_QUAN_TRIController;
use App\Http\Controllers\NHT_HOA_DONController;
use App\Http\Controllers\NHT_CT_HOA_DONController;
use App\Http\Controllers\NHT_TIN_TUCController;
use App\Http\Controllers\nht_LOGIN_USERController;
use App\Http\Controllers\nht_SIGNUPController;

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
//admins login
use App\Http\Controllers\NHT_QUAN_TRIController;
Route::get('admins/nht-login',[NHT_QUAN_TRIController::class,'nhtlogin'])->name('admins.nhtlogin');
Route::post('/admins/nht-login',[NHT_QUAN_TRIController::class,'nhtloginSubmit'])->name('admins.nhtloginSubmit');

# Admin Routes
Route::get('/nht-admins', function() {
    return view('nhtAdmins.index');
});

#admins - danh muc--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/nht-admins/nhtdanhsachquantri/nhtdanhmuc', [NHT_DANH_SACH_QUAN_TRIController::class, 'danhmuc'])
->name('nhtAdmins.nhtdanhsachquantri.danhmuc');
#admins - tin tức --------------------------------------------------------------------------------------------------------------------------------------
Route::get('/nht-admins/nhtdanhsachquantri/nhttintuc', [NHT_DANH_SACH_QUAN_TRIController::class, 'tintuc'])
->name('nhtAdmins.nhtdanhsachquantri..danhmuc.tintuc'); 
// Sản phẩm--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/nht-admins/nhtdanhsachquantri/nhtsanpham', [NHT_DANH_SACH_QUAN_TRIController::class, 'sanpham'])
->name('nhtAdmins.nhtdanhsachquantri.danhmuc.sanpham');
// Mô tả sản phẩm--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/nht-admins/nhtdanhsachquantri/nhtmota/{id}', [NHT_DANH_SACH_QUAN_TRIController::class, 'mota'])
->name('nhtAdmins.nhtdanhsachquantri.danhmuc.mota');
#admins -Người dùng-------------------------------------------------------------------------------------------------------------------------------------
Route::get('/nht-admins/nhtdanhsachquantri/nhtnguoidung', [NHT_DANH_SACH_QUAN_TRIController::class, 'nguoidung'])
->name('nhtAdmins.nhtdanhsachquantri.nguoidung');

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

// Khách--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/nht-admins/nht-khach-hang',[nht_KHACH_HANGcontroller::class,'nhtList'])
->name('nhtadmins.nhtkhachhang');
//detail
Route::get('/nht-admins/nht-khach-hang/nht-detail/{id}', [nht_KHACH_HANGcontroller::class, 'nhtDetail'])
->name('nhtadmin.nhtkhachhang.nhtDetail');
//create
Route::get('/nht-admins/nht-khach-hang/nht-create',[nht_KHACH_HANGcontroller::class,'nhtCreate'])
->name('nhtadmin.nhtkhachhang.nhtcreate');
Route::post('/nht-admins/nht-khach-hang/nht-create',[nht_KHACH_HANGcontroller::class,'nhtCreateSubmit'])
->name('nhtadmin.nhtkhachhang.nhtCreateSubmit');
//edit
Route::get('/nht-admins/nht-khach-hang/nht-edit/{id}', [nht_KHACH_HANGcontroller::class, 'nhtEdit'])
->name('nhtadmin.nhtkhachhang.nhtedit');
Route::post('/nht-admins/nht-khach-hang/nht-edit/{id}', [nht_KHACH_HANGcontroller::class, 'nhtEditSubmit'])
->name('nhtadmin.nhtkhachhang.nhtEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nht-admins/nht-khach-hang/nht-delete/{id}', [nht_KHACH_HANGcontroller::class, 'nhtDelete'])
->name('nhtadmin.nhtkhachhang.nhtdelete');

// Hóa Đơn--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/nht-admins/nht-hoa-don',[NHT_HOA_DONController::class,'nhtList'])
->name('nhtadmins.nhthoadon');
//detail
Route::get('/nht-admins/nht-hoa-don/nht-detail/{id}', [NHT_HOA_DONController::class, 'nhtDetail'])
->name('nhtadmin.nhthoadon.nhtDetail');
//create
Route::get('/nht-admins/nht-hoa-don/nht-create',[NHT_HOA_DONController::class,'nhtCreate'])
->name('nhtadmin.nhthoadon.nhtcreate');
Route::post('/nht-admins/nht-hoa-don/nht-create',[NHT_HOA_DONController::class,'nhtCreateSubmit'])
->name('nhtadmin.nhthoadon.nhtCreateSubmit');
//edit
Route::get('/nht-admins/nht-hoa-don/nht-edit/{id}', [NHT_HOA_DONController::class, 'nhtEdit'])
->name('nhtadmin.nhthoadon.nhtedit');
Route::post('/nht-admins/nht-hoa-don/nht-edit/{id}', [NHT_HOA_DONController::class, 'nhtEditSubmit'])
->name('nhtadmin.nhthoadon.nhtEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nht-admins/nht-hoa-don/nht-delete/{id}', [NHT_HOA_DONController::class, 'nhtDelete'])
->name('nhtadmin.nhthoadon.nhtdelete');

// Chi Tiết Hóa Đơn--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/nht-admins/nht-ct-hoa-don',[NHT_CT_HOA_DONController::class,'nhtList'])
->name('nhtadmins.nhtcthoadon');
//detail
Route::get('/nht-admins/nht-ct-hoa-don/nht-detail/{id}', [NHT_CT_HOA_DONController::class, 'nhtDetail'])
->name('nhtadmin.nhtcthoadon.nhtDetail');
//create
Route::get('/nht-admins/nht-ct-hoa-don/nht-create',[NHT_CT_HOA_DONController::class,'nhtCreate'])
->name('nhtadmin.nhtcthoadon.nhtcreate');
Route::post('/nht-admins/nht-ct-hoa-don/nht-create',[NHT_CT_HOA_DONController::class,'nhtCreateSubmit'])
->name('nhtadmin.nhtcthoadon.nhtCreateSubmit');
//edit
Route::get('/nht-admins/nht-ct-hoa-don/nht-edit/{id}', [NHT_CT_HOA_DONController::class, 'nhtEdit'])
->name('nhtadmin.nhtcthoadon.nhtedit');
Route::post('/nht-admins/nht-ct-hoa-don/nht-edit/{id}', [NHT_CT_HOA_DONController::class, 'nhtEditSubmit'])
->name('nhtadmin.nhtcthoadon.nhtEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nht-admins/nht-ct-hoa-don/nht-delete/{id}', [NHT_CT_HOA_DONController::class, 'nhtDelete'])
->name('nhtadmin.nhtcthoadon.nhtdelete');


// Quản trị Viên--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/nht-admins/nht-quan-tri',[NHT_QUAN_TRIController::class,'nhtList'])
->name('nhtadmins.nhtquantri');
//detail
Route::get('/nht-admins/nht-quan-tri/nht-detail/{id}', [NHT_QUAN_TRIController::class, 'nhtDetail'])
->name('nhtadmin.nhtquantri.nhtDetail');
//create
Route::get('/nht-admins/nht-quan-tri/nht-create',[NHT_QUAN_TRIController::class,'nhtCreate'])
->name('nhtadmin.nhtquantri.nhtcreate');
Route::post('/nht-admins/nht-quan-tri/nht-create',[NHT_QUAN_TRIController::class,'nhtCreateSubmit'])
->name('nhtadmin.nhtquantri.nhtCreateSubmit');
//edit
Route::get('/nht-admins/nht-quan-tri/nht-edit/{id}', [NHT_QUAN_TRIController::class, 'nhtEdit'])
->name('nhtadmin.nhtquantri.nhtedit');
Route::post('/nht-admins/nht-quan-tri/nht-edit/{id}', [NHT_QUAN_TRIController::class, 'nhtEditSubmit'])
->name('nhtadmin.nhtquantri.nhtEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nht-admins/nht-quan-tri/nht-delete/{id}', [NHT_QUAN_TRIController::class, 'nhtDelete'])
->name('nhtadmin.nhtquantri.nhtdelete');

// Tin Tức--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/nht-admins/nht-tin-tuc',[NHT_TIN_TUCController::class,'nhtList'])
->name('nhtadmins.nhttintuc');
//detail
Route::get('/nht-admins/nht-tin-tuc/nht-detail/{id}', [NHT_TIN_TUCController::class, 'nhtDetail'])
->name('nhtadmin.nhttintuc.nhtDetail');
//create
Route::get('/nht-admins/nht-tin-tuc/nht-create',[NHT_TIN_TUCController::class,'nhtCreate'])
->name('nhtadmin.nhttintuc.nhtcreate');
Route::post('/nht-admins/nht-tin-tuc/nht-create',[NHT_TIN_TUCController::class,'nhtCreateSubmit'])
->name('nhtadmin.nhttintuc.nhtCreateSubmit');
//edit
Route::get('/nht-admins/nht-tin-tuc/nht-edit/{id}', [NHT_TIN_TUCController::class, 'nhtEdit'])
->name('nhtadmin.nhttintuc.nhtedit');
Route::post('/nht-admins/nht-tin-tuc/nht-edit/{id}', [NHT_TIN_TUCController::class, 'nhtEditSubmit'])
->name('nhtadmin.nhttintuc.nhtEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nht-admins/nht-tin-tuc/nht-delete/{id}', [NHT_TIN_TUCController::class, 'nhtDelete'])
->name('nhtadmin.nhttintuc.nhtdelete');




use App\Http\Controllers\HomeController;

// User - Routes
Route::get('/nht-user', [HomeController::class, 'index'])->name('nhtuser.home');
Route::get('/nht-user1', [HomeController::class, 'index1'])->name('nhtuser.home1');
// Hiển thị chi tiết sản phẩm
Route::get('/nht-user/show/{id}', [HomeController::class, 'show'])->name('nhtuser.show');
// search
Route::get('/search', [NHT_SAN_PHAMController::class, 'search'])->name('nhtuser.search');
Route::get('/search1', [NHT_SAN_PHAMController::class, 'search1'])->name('nhtuser.search1');

Route::get('/nhtuser/login', [NHT_LOGIN_USERController::class, 'nhtLogin'])->name('nhtuser.login');
Route::post('/nhtuser/login', [NHT_LOGIN_USERController::class, 'nhtLoginSubmit'])->name('nhtuser.nhtLoginSubmit');
Route::get('/nhtuser/logout', [nht_LOGIN_USERController::class, 'nhtLogout'])->name('nhtuser.logout');


// hỗ trợ 
route::get('/nht-user/support',function()
{
    return view('nhtuser.support');
});

// signup
Route::get('/nht-user/signup', [NHT_SIGNUPController::class, 'nhtsignup'])->name('nhtuser.nhtsignup');
Route::post('/nht-user/signup', [NHT_SIGNUPController::class, 'nhtsignupSubmit'])->name('nhtuser.nhtsignupSubmit');



// Route để hiển thị sản phẩm trong trang thanh toán
Route::get('/nht-user/thanhtoan/{product_id}', [NHT_CT_HOA_DONController::class, 'nhtthanhtoan'])->name('nhtuser.nhtthanhtoan');

// Route để xử lý thanh toán
Route::post('/nht-user/thanhtoan', [NHT_CT_HOA_DONController::class, 'storeThanhtoan'])->name('nhtuser.storeThanhtoan');
// create hóa đơn user


// tạo bảng hóa đơn
Route::get('san-pham/{sanPham}', [NHT_CT_HOA_DONController::class, 'show'])->name('sanpham.show');
Route::post('mua-san-pham/{sanPham}', [NHT_CT_HOA_DONController::class, 'store'])->name('hoadon.store');

// xem bảng Hóa Đơn mới Tạo
Route::get('hoa-don/{hoaDonId}/san-pham/{sanPhamId}', [NHT_HOA_DONController::class, 'show'])->name('hoadon.show');



// tạo bảng chi tiết hóa đơn


// Route để tạo mới chi tiết hóa đơn
Route::get('/cthoadon/{hoaDonId}/{sanPhamId}', [nht_CT_HOA_DONController::class, 'create'])->name('cthoadon.create');

// Route để lưu chi tiết hóa đơn
Route::post('/cthoadon/store', [nht_CT_HOA_DONController::class, 'storecthoadon'])->name('cthoadon.storecthoadon');

// Route để hiển thị chi tiết hóa đơn
Route::get('/hoa-don-id/{hoaDonId}/san-pham-id/{sanPhamId}', [nht_CT_HOA_DONController::class, 'cthoadonshow'])->name('cthoadon.cthoadonshow');


// giỏ hàng