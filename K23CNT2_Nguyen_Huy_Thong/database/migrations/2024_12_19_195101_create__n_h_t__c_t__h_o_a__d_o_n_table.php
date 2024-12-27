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
        Schema::create('nht_ct_hoa_don', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nhtHoaDonID')->references('id')->on('nht_hoa_don');
            $table->bigInteger('nhtSanPhamID')->references('id')->on('nht_san_pham');
            $table->integer('nhtSoLuongMua');
            $table->float('nhtDonGiaMua');
            $table->float('nhtThanhTien');
            $table->tinyInteger('nhtTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nht_ct_hoa_don');
    }
};