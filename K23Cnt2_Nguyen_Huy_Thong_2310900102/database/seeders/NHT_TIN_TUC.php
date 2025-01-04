<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class NHT_TIN_TUC extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Insert 10 rows of fake data into the 'NHT_TIN_TUC' table
        for ($i = 0; $i < 10; $i++) {
            DB::table('NHT_TIN_TUC')->insert([
                'nhtMaTT' => $faker->unique()->word, // Unique identifier for the news article
                'nhtTieuDe' => $faker->sentence, // Title of the news article
                'nhtMoTa' => $faker->text(200), // Description (shorter text)
                'nhtNoiDung' => $faker->paragraph(5), // Content (longer text)
                'nhtNgayDangTin' => $faker->dateTimeThisYear(), // Random date/time within the current year
                'nhtNgayCapNhap' => $faker->dateTimeThisYear(), // Random date/time within the current year
                'nhtHinhAnh' => $faker->imageUrl(), // Random image URL
                'nhtTrangThai' => $faker->numberBetween(0, 1), // Status (0 or 1, assuming binary status)
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
