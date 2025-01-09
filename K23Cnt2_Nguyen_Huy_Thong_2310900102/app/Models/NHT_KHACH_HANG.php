<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NHT_KHACH_HANG extends Model implements Authenticatable
{
    use HasFactory;

    protected $table = 'NHT_KHACH_HANG';
    protected $primaryKey = 'nhtMaKhachHang'; // Đảm bảo rằng nhtMaKhachHang là khóa chính

    protected $fillable = [
        'nhtMaKhachHang', 'nhtHoTenKhachHang', 'nhtEmail', 'nhtMatKhau', 
        'nhtDienThoai', 'nhtDiaChi', 'nhtNgayDangKy', 'nhtTrangThai'
    ];

    public $incrementing = false; // Nếu nhtMaKhachHang không tự tăng thì bạn cần đặt false
    public $timestamps = true;

    protected $dates = ['nhtNgayDangKy'];

    // Phương thức cần thiết để implement interface Authenticatable
    public function getAuthIdentifierName()
    {
        return 'nhtMaKhachHang';  // Trả về tên trường khóa chính (sử dụng nhtMaKhachHang làm khóa chính)
    }

    public function getAuthIdentifier()
    {
        return $this->nhtMaKhachHang;  // Trả về giá trị khóa chính của người dùng
    }

    public function getAuthPassword()
    {
        return $this->nhtMatKhau;  // Trả về mật khẩu đã mã hóa
    }

    public function getRememberToken()
    {
        return $this->remember_token;  // Laravel yêu cầu trường này nhưng không phải lúc nào cũng sử dụng
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;  // Cập nhật token nhớ
    }

    public function getRememberTokenName()
    {
        return 'remember_token';  // Tên trường nhớ token
    }
}