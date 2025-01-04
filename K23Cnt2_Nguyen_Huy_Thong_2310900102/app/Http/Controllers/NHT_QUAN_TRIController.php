<?php

namespace App\Http\Controllers;

use App\Models\NHT_QUAN_TRI; // Sử dụng Model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session; 

class NHT_QUAN_TRIController extends Controller
{
    // get login
    public function nhtlogin()
    {
        return view('nhtlogin.nht-login');
    }

    // post login
    public function nhtloginSubmit(Request $request)
    {
        // Validate tài khoản và mật khẩu
        $request->validate([
            'nhtTaiKhoan' => 'required|string',
            'nhtMatKhau' => 'required|string',
        ]);

        // Tìm người dùng trong bảng nht_QUAN_TRI
        $user = NHT_QUAN_TRI::where('nhtTaiKhoan', $request->nhtTaiKhoan)->first(); // Sửa lại ở đây

        // Kiểm tra nếu người dùng tồn tại và mật khẩu đúng
        if ($user && Hash::check($request->nhtMatKhau, $user->nhtMatKhau)) {
            // Đăng nhập thành công
            Auth::loginUsingId($user->id);

            // Lưu tên tài khoản vào session
            Session::put('username', $user->nhtTaiKhoan);

            // Chuyển hướng về trang admin với thông báo thành công
            return redirect('/nht-admins')->with('message', 'Đăng Nhập Thành Công');
        } else {
            // Thông báo lỗi nếu tài khoản hoặc mật khẩu sai
            return redirect()->back()->withErrors(['nhtMatKhau' => 'Tài khoản hoặc mật khẩu không đúng']);
        }
    }

    // Lấy tất cả quản trị viên
    public function nhtlist()
    {
        $nhtquantris = NHT_QUAN_TRI::all(); // Sử dụng Model NHT_QUAN_TRI
        return view('nhtAdmins.nhtquantri.nht-list', ['nhtquantris' => $nhtquantris]);
    }

    // Lấy chi tiết quản trị viên
    public function nhtDetail($id)
    {
        $nhtquantri = NHT_QUAN_TRI::where('id', $id)->first(); // Sử dụng Model NHT_QUAN_TRI
        return view('nhtAdmins.nhtquantri.nht-detail', ['nhtquantri' => $nhtquantri]);
    }

    // Hiển thị form thêm mới quản trị viên
    public function nhtCreate()
    {
        return view('nhtAdmins.nhtquantri.nht-create');
    }

    // Xử lý form thêm mới quản trị viên
    public function nhtCreateSubmit(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'nhtTaiKhoan' => 'required|string|unique:nht_quan_tri,nhtTaiKhoan',
            'nhtMatKhau' => 'required|string|min:6',
            'nhtTrangThai' => 'required|in:0,1',
        ]);

        // Tạo bản ghi mới trong cơ sở dữ liệu
        $nhtquantri = new NHT_QUAN_TRI(); // Sử dụng Model NHT_QUAN_TRI
        $nhtquantri->nhtTaiKhoan = $request->nhtTaiKhoan;
        $nhtquantri->nhtMatKhau = Hash::make($request->nhtMatKhau); // Mã hóa mật khẩu
        $nhtquantri->nhtTrangThai = $request->nhtTrangThai;
        $nhtquantri->save(); // Lưu bản ghi vào cơ sở dữ liệu

        // Chuyển hướng về trang danh sách với thông báo thành công
        return redirect()->route('nhtadmins.nhtquantri')->with('success', 'Thêm quản trị viên thành công');
    }

    // Hiển thị form chỉnh sửa quản trị viên
    public function nhtEdit($id)
    {
        $nhtquantri = NHT_QUAN_TRI::find($id); // Sử dụng phương thức find của Model
        if (!$nhtquantri) {
            return redirect()->route('nhtadmins.nhtquantri')->with('error', 'Không tìm thấy quản trị viên!');
        }
        return view('nhtAdmins.nhtquantri.nht-edit', ['nhtquantri' => $nhtquantri]);
    }

    // Xử lý form chỉnh sửa quản trị viên
    public function nhtEditSubmit(Request $request, $id)
    {
        // Xác thực dữ liệu
        $request->validate([
            'nhtTaiKhoan' => 'required|string|unique:nht_quan_tri,nhtTaiKhoan,' . $id,
            'nhtMatKhau' => 'nullable|string|min:6', // Cho phép mật khẩu trống
            'nhtTrangThai' => 'required|in:0,1',
        ]);

        // Lấy quản trị viên cần sửa
        $nhtquantri = NHT_QUAN_TRI::find($id); // Sử dụng phương thức find của Model
        if (!$nhtquantri) {
            return redirect()->route('nhtadmins.nhtquantri')->with('error', 'Không tìm thấy quản trị viên!');
        }

        // Cập nhật thông tin
        $nhtquantri->nhtTaiKhoan = $request->nhtTaiKhoan;
        if ($request->nhtMatKhau) {
            $nhtquantri->nhtMatKhau = Hash::make($request->nhtMatKhau); // Cập nhật mật khẩu nếu có
        }
        $nhtquantri->nhtTrangThai = $request->nhtTrangThai;
        $nhtquantri->save(); // Lưu lại thay đổi

        return redirect()->route('nhtadmins.nhtquantri')->with('success', 'Cập nhật quản trị viên thành công');
    }

    // Xóa quản trị viên
    public function nhtDelete($id)
    {
        $nhtquantri = NHT_QUAN_TRI::find($id); // Sử dụng phương thức find của Model
        if (!$nhtquantri) {
            return redirect()->route('nhtadmins.nhtquantri')->with('error', 'Không tìm thấy quản trị viên!');
        }
        $nhtquantri->delete(); // Xóa bản ghi

        return redirect()->route('nhtadmins.nhtquantri')->with('success', 'Xóa quản trị viên thành công');
    }
}
