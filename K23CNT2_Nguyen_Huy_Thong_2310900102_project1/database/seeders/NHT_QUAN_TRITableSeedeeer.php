<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NHT_QUAN_TRITableSeedeeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nhtMatKhau = md5("123456");
        DB::table('NHT_QUANTRI')->insert([
            'nhtTaiKhoan'=>"nht@gmail.com",
            'nhtMatKhau'=>0
        ]);
    }
}
