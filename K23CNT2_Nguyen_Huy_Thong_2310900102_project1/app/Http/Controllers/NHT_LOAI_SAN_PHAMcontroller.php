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
        $nhtLoaiSanPham = nhtLoaiSanPham::all();
        return view('nhtAdmins.nhtLoaiSanPham.List', ['nhtLoaiSanPham' => $nhtLoaiSanPham]);
    }

    // Create
    public function nhtCreate()
    {
        return view('nhtAdmins.nhtLoaiSanPham.Create');
    }

    public function nhtStore(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $validated = $request->validate([
            'nhtMaLoai' => 'required|unique:nhtLoaiSanPham,nhtMaLoai|max:255',
            'nhtTenLoai' => 'required|max:255',
            'nhtTrangThai' => 'required|in:0,1', // đảm bảo giá trị đúng cho trạng thái
        ]);
    
        // Lưu vào cơ sở dữ liệu
        nhtLoaiSanPham::create([
            'nhtMaLoai' => $validated['nhtMaLoai'],
            'nhtTenLoai' => $validated['nhtTenLoai'],
            'nhtTrangThai' => $validated['nhtTrangThai'],
        ]);
        return redirect()->route('nhtAdmins.nhtLoaiSanPham.List')->with('success', 'Thêm mới loại sản phẩm thành công');
    }
    // Xem chi tiết
public function nhtShow($id)
{
    $item = nhtLoaiSanPham::where('nhtMaLoai', $id)->first(); 
    return view('nhtAdmins.nhtLoaiSanPham.Show', ['item' => $item]); 
}

// Sửa
public function nhtEdit($id)
{
    $item = nhtLoaiSanPham::where('nhtMaLoai', $id)->first(); 
    return view('nhtAdmins.nhtLoaiSanPham.Edit', compact('item')); 
}

// Cập nhật
public function nhtUpdate(Request $request, $id)
{
    $request->validate([
        'nhtTenLoai' => 'required|max:255',
        'nhtTrangThai' => 'required|in:0,1',
    ]);

    $data = $request -> only('nhtTenLoai', 'nhtTrangThai');

    nhtLoaiSanPham::where('nhtMaLoai', $id)->update($data); 

    return redirect()->route('nhtAdmins.nhtLoaiSanPham.List')->with('success', 'Cập nhật thành công!');
}

// Xóa
public function nhtDestroy($id)
{
    $item = nhtLoaiSanPham::where('nhtMaLoai', $id)->delete();
    return redirect()->route('nhtAdmins.nhtLoaiSanPham.List')->with('success', 'Xóa thành công!');
}

}    