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
        Schema::create('NHT_TIN_TUC', function (Blueprint $table) {
            $table->id();
            $table->string('nhtMaTT')->unique(); // Assuming 'nhtMaTT' is unique, add unique constraint if needed
            $table->string('nhtTieuDe');
            $table->text('nhtMoTa'); // 'text' type is better for longer descriptions
            $table->longText('nhtNoiDung'); // 'longText' for potentially larger content
            $table->dateTime('nhtNgayDangTin'); // Store as datetime
            $table->dateTime('nhtNgayCapNhap'); // Store as datetime
            $table->string('nhtHinhAnh');
            $table->tinyInteger('nhtTrangThai'); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NHT_TIN_TUC');
    }
};
