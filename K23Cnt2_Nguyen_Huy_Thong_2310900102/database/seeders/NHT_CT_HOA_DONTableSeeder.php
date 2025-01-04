<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NHT_CT_HOA_DONTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // //
        DB::table('NHT_CT_HOA_DON')->insert([
            'nhtHoaDonID'=>1,
            'nhtSanPhamID'=>1,
            'nhtSoLuongMua'=>12,
            'nhtDonGiaMua'=>699000,
            'nhtThanhTien'=>699000 * 12,
            'nhtTrangThai'=>0,
        ]);

        DB::table('NHT_CT_HOA_DON')->insert([
            'nhtHoaDonID'=>2,
            'nhtSanPhamID'=>2,
            'nhtSoLuongMua'=>20,
            'nhtDonGiaMua'=>550000,
            'nhtThanhTien'=>550000 * 20,
            'nhtTrangThai'=>0,
        ]);
    }
}
