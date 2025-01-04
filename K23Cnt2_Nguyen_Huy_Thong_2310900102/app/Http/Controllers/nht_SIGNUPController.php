<?php

namespace App\Http\Controllers;
use App\Models\NHT_KHACH_HANG;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class nht_SIGNUPController extends Controller
{
    // Show the form to create a new customer
    public function nhtsignup()
    {
        return view('nhtuser.signup');
    }

    // Handle the form submission and store customer data
    public function nhtsignupSubmit(Request $request)
{
    // Xác thực dữ liệu đầu vào mà không có giới hạn độ dài mật khẩu
    $request->validate([
        'nhtHoTenKhachHang' => 'required|string|max:255',
        'nhtEmail' => 'required|email|unique:nht_khach_hang,nhtEmail',
        'nhtMatKhau' => 'required|confirmed', // Loại bỏ min:6 hoặc giới hạn khác
        'nhtDienThoai' => 'required|numeric|unique:nht_khach_hang,nhtDienThoai',
        'nhtDiaChi' => 'required|string|max:255',
    ]);

    try {
        // Xử lý tạo khách hàng mới
        $lastCustomer = NHT_KHACH_HANG::latest('nhtMaKhachHang')->first();
        $newCustomerID = $lastCustomer
            ? 'KH' . str_pad((substr($lastCustomer->nhtMaKhachHang, 2) + 1), 3, '0', STR_PAD_LEFT)
            : 'KH001';

        $nhtkhachhang = new NHT_KHACH_HANG;
        $nhtkhachhang->nhtMaKhachHang = $newCustomerID;
        $nhtkhachhang->nhtHoTenKhachHang = $request->nhtHoTenKhachHang;
        $nhtkhachhang->nhtEmail = $request->nhtEmail;
        $nhtkhachhang->nhtMatKhau = Hash::make($request->nhtMatKhau); // Mã hóa mật khẩu
        $nhtkhachhang->nhtDienThoai = $request->nhtDienThoai;
        $nhtkhachhang->nhtDiaChi = $request->nhtDiaChi;
        $nhtkhachhang->nhtNgayDangKy = now();
        $nhtkhachhang->nhtTrangThai = 0; // Tài khoản mặc định là chưa kích hoạt

        $nhtkhachhang->save();

        return redirect()->route('nhtuser.login')->with('success', 'Đăng ký thành công, vui lòng đăng nhập!');
    } catch (Exception $e) {
        Log::error('Lỗi khi đăng ký khách hàng: ' . $e->getMessage());
        return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
    }
}

}