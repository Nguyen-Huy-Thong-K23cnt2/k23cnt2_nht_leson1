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
            'nhtMaSanPham'=> "VP001",
            'nhtTenSanPham'=> "Cây phú quý",
            'nhtHinhAnh'=>"images/san-pham/VP001.jpg",
            'nhtSoLuong'=>100,
            'nhtDonGia'=>699000,
            'nhtMaLoai'=>1,
            'nhtTrangThai'=>0
        ]);
        DB::table("nht_san_pham")->insert([
            'nhtMaSanPham'=> "VP002",
            'nhtTenSanPham'=> "Cây đại phú gia",
            'nhtHinhAnh'=>"images/san-pham/VP002.jpg",
            'nhtSoLuong'=>200,
            'nhtDonGia'=>550000,
            'nhtMaLoai'=>1,
            'nhtTrangThai'=>0
        ]);
        DB::table("nht_san_pham")->insert([
            'nhtMaSanPham'=> "VP003",
            'nhtTenSanPham'=> "Cây hạnh phúc",
            'nhtHinhAnh'=>"images/san-pham/VP003.jpg",
            'nhtSoLuong'=>150,
            'nhtDonGia'=>250000,
            'nhtMaLoai'=>1,
            'nhtTrangThai'=>0
        ]);
        DB::table("nht_san_pham")->insert([
            'nhtMaSanPham'=> "VP004",
            'nhtTenSanPham'=> "Cây vạn lộc",
            'nhtHinhAnh'=>"images/san-pham/VP004.jpg",
            'nhtSoLuong'=>300,
            'nhtDonGia'=>799000,
            'nhtMaLoai'=>1,
            'nhtTrangThai'=>0
        ]);
        DB::table("nht_san_pham")->insert([
            'nhtMaSanPham'=> "PT001",
            'nhtTenSanPham'=> "Cây thiết mộc lan",
            'nhtHinhAnh'=>"images/san-pham/PT001.jpg",
            'nhtSoLuong'=>150,
            'nhtDonGia'=>590000,
            'nhtMaLoai'=>1,
            'nhtTrangThai'=>0
        ]);
        DB::table("nht_san_pham")->insert([
            'nhtMaSanPham'=> "PT002",
            'nhtTenSanPham'=> "Cây trường sinh",
            'nhtHinhAnh'=>"images/san-pham/PT002.jpg",
            'nhtSoLuong'=>100,
            'nhtDonGia'=>150000,
            'nhtMaLoai'=>1,
            'nhtTrangThai'=>0
        ]);
        DB::table("nht_san_pham")->insert([
            'nhtMaSanPham'=> "PT003",
            'nhtTenSanPham'=> "Cây hạnh phúc",
            'nhtHinhAnh'=>"images/san-pham/PT003.jpg",
            'nhtSoLuong'=>200,
            'nhtDonGia'=>299000,
            'nhtMaLoai'=>1,
            'nhtTrangThai'=>0
        ]);
        DB::table("nht_san_pham")->insert([
            'nhtMaSanPham'=> "PT004",
            'nhtTenSanPham'=> "Cây hoa nhài(Lài ta)",
            'nhtHinhAnh'=>"images/san-pham/PT004.jpg",
            'nhtSoLuong'=>300,
            'nhtDonGia'=>199000,
            'nhtMaLoai'=>1,
            'nhtTrangThai'=>0
        ]);
    }
}
