<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NHT_QUAN_TRITableSeeder extends Seeder
{
    public function run(): void
    {
        $nhtMatKhau = md5("123456");
        DB::table('NHT_QUANTRI')->insert([
            'nhtTaiKhoan'=>"nht@gmail.com",
            'nhtMatKhau'=>$nhtMatKhau,
            'nhtTrangThai'=>0
        ]);
        DB::table('NHT_QUANTRI')->insert([
            'nhtTaiKhoan'=>"1584889",
            'nhtMatKhau'=>$nhtMatKhau,
            'nhtTrangThai'=>0
        ]);
    }
}
