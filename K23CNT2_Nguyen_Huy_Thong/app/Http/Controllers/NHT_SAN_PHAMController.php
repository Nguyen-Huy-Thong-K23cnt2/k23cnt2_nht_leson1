<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NHT_SAN_PHAM; 
use App\Models\NHT_LOAI_SAN_PHAM; // Sử dụng Model User để thao tác với cơ sở dữ liệu
use Illuminate\Support\Facades\Storage;  // Use this for file handling
class NHT_SAN_PHAMController extends Controller
{
    //


     //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function nhtList()
    {
        $nhtsanphams = NHT_SAN_PHAM::where('nhtTrangThai',0)->get();
        return view('nhtAdmins.nhtsanpham.nht-list',['nhtsanphams'=>$nhtsanphams]);
    } 
    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function nhtDetail($id)
    {
        // Tìm sản phẩm theo ID
        $nhtsanpham = NHT_SAN_PHAM::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('nhtAdmins.nhtsanpham.nht-detail', ['nhtsanpham' => $nhtsanpham]);
    }

      //create  -----------------------------------------------------------------------------------------------------------------------------------------
      public function nhtCreate()
      {
            // đọc dữ liệu từ nht_LOAI_SAN_PHAM
            $nhtloaisanpham = NHT_LOAI_SAN_PHAM::all();
          return view('nhtAdmins.nhtsanpham.nht-create',['nhtloaisanpham'=>$nhtloaisanpham]);
      }
     

     // Controller
public function nhtCreateSubmit(Request $request)
{

    // Validate input
    $validatedData = $request->validate([
        'nhtMaSanPham' => 'required|unique:nht_SAN_PHAM,nhtMaSanPham',
        'nhtTenSanPham' => 'required|string|max:255',
        'nhtHinhAnh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Kiểm tra hình ảnh và loại định dạng
        'nhtSoLuong' => 'required|numeric|min:1',
        'nhtDonGia' => 'required|numeric',
        'nhtMaLoai' => 'required|exists:nht_LOAI_SAN_PHAM,id',
        'nhtTrangThai' => 'required|in:0,1',
    ]);

    // Khởi tạo đối tượng nht_SAN_PHAM và lưu thông tin vào cơ sở dữ liệu
    $nhtsanpham = new NHT_SAN_PHAM;
    $nhtsanpham->nhtMaSanPham = $request->nhtMaSanPham;
    $nhtsanpham->nhtTenSanPham = $request->nhtTenSanPham;

    // Kiểm tra nếu có tệp hình ảnh
    if ($request->hasFile('nhtHinhAnh')) {
        // Lấy tệp hình ảnh
        $file = $request->file('nhtHinhAnh');

        // Kiểm tra nếu tệp hợp lệ
        if ($file->isValid()) {
            // Tạo tên tệp dựa trên mã sản phẩm
            $fileName = $request->nhtMaSanPham . '.' . $file->extension();

            // Lưu tệp vào thư mục public/img/san_pham
            $file->storeAs('public/img/san_pham', $fileName); // Lưu tệp vào thư mục storage/app/public/img/san_pham

            // Lưu đường dẫn vào cơ sở dữ liệu
            $nhtsanpham->nhtHinhAnh = 'img/san_pham/' . $fileName; // Lưu đường dẫn tương đối trong CSDL
        }
    }

    // Lưu các thông tin còn lại vào cơ sở dữ liệu
    $nhtsanpham->nhtSoLuong = $request->nhtSoLuong;
    $nhtsanpham->nhtDonGia = $request->nhtDonGia;
    $nhtsanpham->nhtMaLoai = $request->nhtMaLoai;
    $nhtsanpham->nhtTrangThai = $request->nhtTrangThai;

    // Lưu dữ liệu vào cơ sở dữ liệu
    $nhtsanpham->save();

    // Chuyển hướng người dùng về trang danh sách sản phẩm
    return redirect()->route('nhtadims.nhtsanpham');
}

//delete    -----------------------------------------------------------------------------------------------------------------------------------------

public function nhtdelete($id)
{
    NHT_SAN_PHAM::where('id',$id)->delete();
return back()->with('sanpham_deleted','Đã xóa Sản Phẩm thành công!');
}

// edit -----------------------------------------------------------------------------------------------------------------------------------------
public function nhtEdit($id)
    {
       // Tìm sản phẩm theo ID
    $nhtsanpham = NHT_SAN_PHAM::findOrFail($id);

    // Lấy tất cả các loại sản phẩm từ bảng nht_LOAI_SAN_PHAM
    $nhtloaisanpham = NHT_LOAI_SAN_PHAM::all();

    // Trả về view với dữ liệu sản phẩm và loại sản phẩm
    return view('nhtAdmins.nhtsanpham.nht-edit', [
        'nhtsanpham' => $nhtsanpham,
        'nhtloaisanpham' => $nhtloaisanpham
    ]);
    }

    // Phương thức xử lý dữ liệu form chỉnh sửa sản phẩm


    public function nhtEditSubmit(Request $request, $id)
{
    // Validate dữ liệu
    $request->validate([
        'nhtMaSanPham' => 'required|max:20',
        'nhtTenSanPham' => 'required|max:255',
        'nhtHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'nhtSoLuong' => 'required|integer',
        'nhtDonGia' => 'required|numeric',
        'nhtMaLoai' => 'required|max:10',
        'nhtTrangThai' => 'required|in:0,1',
    ]);

    // Tìm sản phẩm cần chỉnh sửa
    $nhtsanpham = NHT_SAN_PHAM::findOrFail($id);

    // Cập nhật thông tin sản phẩm
    $nhtsanpham->nhtMaSanPham = $request->nhtMaSanPham;
    $nhtsanpham->nhtTenSanPham = $request->nhtTenSanPham;
    $nhtsanpham->nhtSoLuong = $request->nhtSoLuong;
    $nhtsanpham->nhtDonGia = $request->nhtDonGia;
    $nhtsanpham->nhtMaLoai = $request->nhtMaLoai;
    $nhtsanpham->nhtTrangThai = $request->nhtTrangThai;

    // Kiểm tra nếu có hình ảnh mới
    if ($request->hasFile('nhtHinhAnh')) {
        // Kiểm tra và xóa hình ảnh cũ nếu tồn tại
        if ($nhtsanpham->nhtHinhAnh && Storage::disk('public')->exists('img/san_pham/' . $nhtsanpham->nhtHinhAnh)) {
            // Xóa file cũ nếu tồn tại
            Storage::disk('public')->delete('img/san_pham/' . $nhtsanpham->nhtHinhAnh);
        }
        // Lưu hình ảnh mới
        $imagePath = $request->file('nhtHinhAnh')->store('img/san_pham', 'public');
        $nhtsanpham->nhtHinhAnh = $imagePath;
    }

    // Lưu thông tin sản phẩm đã chỉnh sửa
    $nhtsanpham->save();

    // Redirect về trang danh sách sản phẩm
    return redirect()->route('nhtadims.nhtsanpham')->with('success', 'Sản phẩm đã được cập nhật thành công.');
}

    

}