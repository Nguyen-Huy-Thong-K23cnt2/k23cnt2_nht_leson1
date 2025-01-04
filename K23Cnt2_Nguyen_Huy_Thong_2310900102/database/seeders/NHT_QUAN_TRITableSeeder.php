<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Thêm dòng này

class NHT_QUAN_TRITableSeeder extends Seeder
{
    public function run(): void
    {
         // Kiểm tra xem email đã tồn tại hay chưa
    $exists = DB::table('NHT_QUAN_TRI')->where('nhtTaiKhoan', 'nht@gmail.com')->exists();
    if (!$exists) {
        DB::table('NHT_QUAN_TRI')->insert([
            'nhtTaiKhoan' => 'nht@gmail.com',
            'nhtMatKhau' => Hash::make('123'), // Đảm bảo mật khẩu được mã hóa
            'nhtTrangThai' => 0,
        ]);
        DB::table('NHT_QUAN_TRI')->insert([
            'nhtTaiKhoan'=>"1584889",
            'nhtMatKhau'=>Hash::make('123'), // Đảm bảo mật khẩu được mã hóa
            'nhtTrangThai'=>0
        ]);
                 }
    }
}
