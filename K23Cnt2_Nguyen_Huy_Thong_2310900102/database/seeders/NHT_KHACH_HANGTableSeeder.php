<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Đảm bảo Hash được sử dụng

class NHT_KHACH_HANGTableSeeder extends Seeder
{
   /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('nht_khach_hang')->insert([
            'nhtMaKhachHang'=>'KH001',
            'nhtHoTenKhachHang'=>'Vũ Quốc Khánh',
            'nhtEmail'=>'Khanh@gmail.com',
            'nhtMatKhau'=>Hash::make('123456a@'), // Mã hóa mật khẩu
            'nhtDienThoai'=>'01255003',
            'nhtDiaChi'=>'Hạ Long',
            'nhtNgayDangKy'=>'2024/12/12',
            'nhtTrangThai'=>0,
        ]);
        DB::table('nht_khach_hang')->insert([
            'nhtMaKhachHang'=>'KH002',
            'nhtHoTenKhachHang'=>'Nguyễn Anh Tuấn',
            'nhtEmail'=>'Tuan@gmail.com',
            'nhtMatKhau'=>Hash::make('123456b#'), // Mã hóa mật khẩu
            'nhtDienThoai'=>'012554873',
            'nhtDiaChi'=>'Cẩm Phả - Quảng Ninh',
            'nhtNgayDangKy'=>'2025/01/01',
            'nhtTrangThai'=>0,
        ]);
    }
}
