<?php

namespace App\Http\Controllers;

use App\Models\nhtLoaiSanPham;
use Illuminate\Http\Request;

class NHT_LOAI_SAN_PHAMcontroller extends Controller
{
    // Admins : CRUD

    // List
    public function nhtList()
    {
        $nhtLoaiSanPham =NHT_LOAI_SAN_PHAM::all();
        return view('admins.nhtLoaiSanPham.List', ['nhtLoaiSanPham' => $nhtLoaiSanPham]);
    }

}