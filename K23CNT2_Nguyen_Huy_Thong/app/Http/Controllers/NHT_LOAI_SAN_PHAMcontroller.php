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
        $nhtLoaiSanPhams = nht_loai_san_pham::all();
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
        //validation data
        $validatedData = $request->validate([
            'nhtMaLoai' => 'required|unique:nht_loai_san_pham,nhtMaLoai',  // Kiểm tra mã loại không trống và duy nhất
            'nhtTenLoai' => 'required|string|max:255',  // Kiểm tra tên loại không trống và là chuỗi
            'nhtTrangThai' => 'required|in:0,1',  // Trạng thái phải là 0 hoặc 1
        ]);

        //ghi dữ liệu xuống DB
        $nhtLoaiSanPham = new nht_loai_san_pham;
        $nhtLoaiSanPham->nhtMaLoai = $request->nhtMaLoai;
        $nhtLoaiSanPham->nhtTenLoai = $request->nhtTenLoai;
        $nhtLoaiSanPham->nhtTrangThai = $request->nhtTrangThai;

        $nhtLoaiSanPham->save();

        return redirect()->route('nhtadmins.nhtloaisanpham');
    }

    //edit
    public function nhtEdit($id)
    {
        $nhtLoaiSanPham = nht_loai_san_pham::find($id);
        return view('nhtAdmins.nhtLoaiSanPham.Edit',['nhtLoaiSanPham'=>$nhtLoaiSanPham]);
    }

    //post edit submit
    public function nhtEditSubmit(Request $request)
    {

        $validatedData = $request->validate([
            'nhtMaLoai' => 'required|string|max:255|unique:nht_loai_san_pham,nhtMaLoai,' . $request->id,  // Bỏ qua nhtMaLoai của bản ghi hiện tại
            'nhtTenLoai' => 'required|string|max:255',   
            'nhtTrangThai' => 'required|in:0,1',  // Validation for nhtTrangThai (0 or 1)
        ]);
    
        //ghi dữ liệu xuống DB
        $nhtLoaiSanPham = nht_loai_san_pham::find($request->id);

        $nhtLoaiSanPham->nhtMaLoai = $request->nhtMaLoai;
        $nhtLoaiSanPham->nhtTenLoai = $request->nhtTenLoai;
        $nhtLoaiSanPham->nhtTrangThai = $request->nhtTrangThai;

        $nhtLoaiSanPham->save();

        return redirect()->route('nhtadmins.nhtloaisanpham');
    }

    //view
    public function nhtView($id)
    {
        // Tìm loại sản phẩm theo ID
        $nhtLoaiSanPham = nht_loai_san_pham::findOrFail($id);
    
        return view('nhtAdmins.nhtLoaiSanPham.View', ['nhtLoaiSanPham' => $nhtLoaiSanPham]);
    }

    public function nhtDelete($id)
    {
        $nhtLoaiSanPham = nht_loai_san_pham::find($id);
        $nhtLoaiSanPham->delete();
        return redirect()->route('nhtadmins.nhtloaisanpham','Đã xóa sinh viên thành công!');
    }

}