<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NHT_HOA_DONTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('nht_hoa_don')->insert([
            'nhtMaHoaDon'=>'HD001',
            'nhtMaKhachHang'=>1,
            'nhtNgayHoaDon'=>'2024/12/12',
            'nhtNgayNhan'=>'2024/12/12',
            'nhtHoTenKhachHang'=>'Vũ Quốc Khánh',
            'nhtEmail'=>'Khanh@gmail.com',
            'nhtDienThoai'=>'01255003',
            'nhtDiaChi'=>'Hạ Long',
            'nhtTongGiaTri'=>'790000',
            'nhtTrangThai'=>2,
        ]);

        DB::table('nht_hoa_don')->insert([
            'nhtMaHoaDon'=>'HD002',
            'nhtMaKhachHang'=>2,
            'nhtNgayHoaDon'=>'2025-01-03',
            'nhtNgayNhan'=>'2024/01/04',
            'nhtHoTenKhachHang'=>'Nguyễn Anh Tuấn',
            'nhtEmail'=>'tuan@gmail.com',
            'nhtDienThoai'=>'056894848',
            'nhtDiaChi'=>'Cẩm Phả _ Quảng Ninh',
            'nhtTongGiaTri'=>'125000',
            'nhtTrangThai'=>0,
        ]);
    }
}
