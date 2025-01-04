<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NHT_SAN_PHAMTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("nht_san_pham")->insert([
            'nhtMaSanPham'=> "SP001",
            'nhtTenSanPham'=> "Lexus es 250",
            'nhtHinhAnh'=>"img/san_pham/SP001.jpg",
            'nhtSoLuong'=>100,
            'nhtDonGia'=>699000,
            'nhtMaLoai'=>1,
            'nhtTrangThai'=>0
        ]);
        DB::table("nht_san_pham")->insert([
            'nhtMaSanPham'=> "SP002",
            'nhtTenSanPham'=> "Rolls-Royce Ghost",
            'nhtHinhAnh'=>"img/san_pham/SP002.jpg",
            'nhtSoLuong'=>200,
            'nhtDonGia'=>550000,
            'nhtMaLoai'=>1,
            'nhtTrangThai'=>0
        ]);
        DB::table("nht_san_pham")->insert([
            'nhtMaSanPham'=> "SP003",
            'nhtTenSanPham'=> "Continental GT",
            'nhtHinhAnh'=>"img/san_pham/SP003.jpg",
            'nhtSoLuong'=>150,
            'nhtDonGia'=>250000,
            'nhtMaLoai'=>1,
            'nhtTrangThai'=>0
        ]);
        DB::table("nht_san_pham")->insert([
            'nhtMaSanPham'=> "VP004",
            'nhtTenSanPham'=> "Audi Q5",
            'nhtHinhAnh'=>"img/san_pham/SP003.jpg",
            'nhtSoLuong'=>300,
            'nhtDonGia'=>799000,
            'nhtMaLoai'=>1,
            'nhtTrangThai'=>0
        ]);
    }
}
