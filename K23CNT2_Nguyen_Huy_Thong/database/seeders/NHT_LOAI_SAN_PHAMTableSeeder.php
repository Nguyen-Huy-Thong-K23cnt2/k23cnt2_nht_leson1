<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class  NHT_LOAI_SAN_PHAMTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nht_loai_san_pham')->insert([
            'nhtMaLoai'=> "L001",
            'nhtTenLoai'=>"Hãng Xe Lexus",
            'nhtTrangThai'=>0
        ]);
        DB::table('nht_loai_san_pham')->insert([
            'nhtMaLoai'=> "L002",
            'nhtTenLoai'=>"Hãng Rolls-Royce ",
            'nhtTrangThai'=>0
        ]);
        DB::table('nht_loai_san_pham')->insert([
            'nhtMaLoai'=> "L003",
            'nhtTenLoai'=>"Hãng Bentley",
            'nhtTrangThai'=>0
        ]);
        DB::table('nht_loai_san_pham')->insert([
            'nhtMaLoai'=> "L004",
            'nhtTenLoai'=>"Hãng xe BMW",
            'nhtTrangThai'=>0
        ]);
        DB::table('nht_loai_san_pham')->insert([
            'nhtMaLoai'=> "L005",
            'nhtTenLoai'=>"Hãng Audi",
            'nhtTrangThai'=>0
        ]);
    }
}