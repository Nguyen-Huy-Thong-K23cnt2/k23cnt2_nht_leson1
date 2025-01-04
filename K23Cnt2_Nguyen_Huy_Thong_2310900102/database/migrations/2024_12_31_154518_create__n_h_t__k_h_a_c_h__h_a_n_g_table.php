<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('NHT_KHACH_HANG', function (Blueprint $table) {
            $table->id();
            $table->string('nhtMaKhachHang',255)->unique();
            $table->string('nhtHoTenKhachHang',255);
            $table->string('nhtEmail',255);
            $table->string('nhtMatKhau',255);
            $table->string('nhtDienThoai',255);
            $table->string('nhtDiaChi',255);
            $table->date('nhtNgayDangKy');
            $table->tinyInteger('nhtTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NHT_KHACH_HANG');
    }
};
