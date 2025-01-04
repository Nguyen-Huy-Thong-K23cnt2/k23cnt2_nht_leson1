<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Thêm dòng này
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NHT_KHACH_HANG extends Model
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

 
}
