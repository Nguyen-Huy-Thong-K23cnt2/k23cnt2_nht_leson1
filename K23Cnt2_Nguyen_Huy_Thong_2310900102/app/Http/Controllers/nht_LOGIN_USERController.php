<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NHT_KHACH_HANG;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class NHT_LOGIN_USERController extends Controller
{
     // Show login form
     public function nhtLogin()
     {
         return view('nhtuser.login');
     }
 
     // Handle login form submission
    // Handle login form submission
    public function nhtLoginSubmit(Request $request)
{
    // Validate the input data
    $request->validate([
        'nhtEmail' => 'required|email',
        'nhtMatKhau' => 'required|string',
    ]);

    // Tìm người dùng theo email
    $user = NHT_KHACH_HANG::where('nhtEmail', $request->nhtEmail)->first();

    // Xóa giỏ hàng trong session khi đăng nhập
    Session::forget('cart');

    // Kiểm tra nếu người dùng tồn tại và mật khẩu đúng
    if ($user && Hash::check($request->nhtMatKhau, $user->nhtMatKhau)) {
        // Kiểm tra trạng thái tài khoản
        if ($user->nhtTrangThai == 2) {
            // Tài khoản bị khóa
            return redirect()->back()->withErrors(['nhtEmail' => 'Tài khoản của bạn đã bị khóa.']);
        } elseif ($user->nhtTrangThai == 1) {
            // Tài khoản bị tạm khóa
            return redirect()->back()->withErrors(['nhtEmail' => 'Tài khoản của bạn đã bị tạm khóa.']);
        }

        // Đăng nhập người dùng
        Auth::login($user);

        // Lưu thông tin người dùng vào session
        Session::put('user_id', $user->id);
        Session::put('username1', $user->nhtHoTenKhachHang);  // Lưu tên người dùng
        Session::put('nhtEmail', $user->nhtEmail);  // Lưu email
        Session::put('nhtDienThoai', $user->nhtDienThoai);  // Lưu số điện thoại
        Session::put('nhtDiaChi', $user->nhtDiaChi);  // Lưu địa chỉ
        Session::put('nhtMaKhachHang', $user->nhtMaKhachHang);  // Lưu mã khách hàng

        // Chuyển hướng người dùng tới trang chủ sau khi đăng nhập thành công
        return redirect()->route('nhtuser.home1')->with('message', 'Đăng Nhập Thành Công');
    } else {
        // Nếu thông tin không chính xác, trả về lỗi
        return redirect()->back()->withErrors(['nhtEmail' => 'Email hoặc Mật khẩu không đúng']);
    }
}


 public function logout()
 {
     // Xóa giỏ hàng khỏi session
     Session::forget('cart');
     
     // Đăng xuất người dùng
     Auth::logout();
 
     // Chuyển hướng về trang đăng nhập
     return redirect()->route('nhtuser.login')->with('message', 'Bạn đã đăng xuất thành công.');
 }
}
