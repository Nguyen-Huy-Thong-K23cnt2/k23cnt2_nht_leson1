<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NHT_KHACH_HANG;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class NHT_LOGIN_USERController extends Controller
{
    // Hiển thị form đăng nhập
    public function nhtLogin()
    {
        return view('nhtuser.login');
    }

    // Xử lý đăng nhập
    public function nhtLoginSubmit(Request $request)
{
    // Xác thực dữ liệu đầu vào
    $request->validate([
        'nhtEmail' => 'required|email',
        'nhtMatKhau' => 'required|string',  // Không cần yêu cầu độ dài mật khẩu
    ]);

    // Tìm người dùng theo email
    $user = NHT_KHACH_HANG::where('nhtEmail', $request->nhtEmail)->first();

    // Xóa giỏ hàng trong session nếu có
    Session::forget('cart');

    // Kiểm tra người dùng tồn tại và mật khẩu đúng
    if ($user && Hash::check($request->nhtMatKhau, $user->nhtMatKhau)) {

        // Kiểm tra trạng thái tài khoản
        if ($user->nhtTrangThai == 2) {
            // Tài khoản bị khóa
            return redirect()->back()->withErrors(['nhtEmail' => 'Tài khoản của bạn đã bị khóa.'])
                ->withInput(); // Retain input
        } elseif ($user->nhtTrangThai == 1) {
            // Tài khoản bị tạm khóa
            return redirect()->back()->withErrors(['nhtEmail' => 'Tài khoản của bạn đã bị tạm khóa.'])
                ->withInput(); // Retain input
        }

        // Đăng nhập người dùng
        Auth::login($user);

        // Chuyển hướng người dùng đến trang họ muốn truy cập hoặc trang chủ
        return redirect()->intended(route('nhtuser.home1'))->with('message', 'Đăng Nhập Thành Công');
    } else {
        // Nếu thông tin không đúng, trả về lỗi
        return redirect()->back()->withErrors(['nhtEmail' => 'Email hoặc Mật khẩu không đúng'])
            ->withInput(); // Retain input
    }
}

}
