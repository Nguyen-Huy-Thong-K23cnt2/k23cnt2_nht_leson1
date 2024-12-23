<?php

namespace App\Http\Controllers;

use App\Models\NHT_LOAI_SAN_PHAM;
use Illuminate\Http\Request;

class NHT_LOAI_SAN_PHAMcontroller extends Controller
{
    // Admins : CRUD

    // List
    public function nhtList()
    {
        $nhtLoaiSanPhams =nht_loai_san_pham::all();
        return view('nhtAdmins.nhtLoaiSanPham.List', ['nhtLoaiSanPham' => $nhtLoaiSanPhams]);
    }

}