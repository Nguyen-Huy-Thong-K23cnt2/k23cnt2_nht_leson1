<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class nhtSinhVienController extends Controller
{
    //crud 
    public function nhtList()
    {
        //lấy toàn bộ dữ liệu trong bảng sinh viên
        $nhtSinhVien = SinhVien::all();
        return view('NhtSinhVien.nht-list',['nhtSinhVien'=>$nhtSinhVien]);
    }

}
