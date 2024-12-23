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

    //create
    public function nhtCreate()
    {
        return view('nhtAdmins.nhtLoaiSanPham.Create');
    }

    //create submit
    public function nhtCreateSubmit(Request $request)
    {
        //ghi dữ liệu xuống DB

        $nhtLoaiSanPham = new nht_loai_san_pham;
        $nhtLoaiSanPham->nhtMaLoai = $request->nhtMaLoai;
        $nhtLoaiSanPham->nhtTenLoai = $request->nhtTenLoai;
        $nhtLoaiSanPham->nhtTrangThai = $request->nhtTrangThai;

        $nhtLoaiSanPham->save();

        return redirect()->route('nhtadmins.nhtloaisanpham');
    }

}