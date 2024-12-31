<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NHT_HOA_DON; 
use App\Models\NHT_KHACH_HANG; 
use App\Models\NHT_SAN_PHAM; 
class NHT_HOA_DONController extends Controller
{
    //
    public function show($hoaDonId,$sanPhamId)
    {
        // Lấy hóa đơn từ ID
        $hoaDon = NHT_HOA_DON::findOrFail($hoaDonId);
        $sanPham = NHT_SAN_PHAM::findOrFail($sanPhamId);

        // Trả về view để hiển thị thông tin hóa đơn
        return view('nhtuser.hoadonshow', compact('hoaDon','sanPham'));
    }


      //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function nhtList()
    {
        $nhthoadons = NHT_HOA_DON::all();
        return view('nhtAdmins.nhthoadon.nht-list',['nhthoadons'=>$nhthoadons]);
    }
    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function nhtDetail($id)
    {
        // Tìm sản phẩm theo ID
        $nhthoadon = NHT_HOA_DON::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('nhtAdmins.nhthoadon.nht-detail', ['nhthoadon' => $nhthoadon]);
    }
    // create
    public function nhtCreate()
    {
        $nhtkhachhang = NHT_KHACH_HANG::all();
        return view('nhtAdmins.nhthoadon.nht-create',['nhtkhachhang'=>$nhtkhachhang]);
    }
    //post
    public function nhtCreateSubmit(Request $request)
    {
        // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
        $validate = $request->validate([
            'nhtMaHoaDon' => 'required|unique:nht_hoa_don,nhtMaHoaDon',
            'nhtMaKhachHang' => 'required|exists:nht_khach_hang,id',
            'nhtNgayHoaDon' => 'required|date',  
            'nhtNgayNhan' => 'required|date',
            'nhtHoTenKhachHang' => 'required|string',  
            'nhtEmail' => 'required|email',
            'nhtDienThoai' => 'required|numeric',  
            'nhtDiaChi' => 'required|string',  
            'nhtTongGiaTri' => 'required|numeric',  // Đã thay đổi thành numeric (cho kiểu double)
            'nhtTrangThai' => 'required|in:0,1,2',
        ]);
    
        // Tạo một bản ghi hóa đơn mới
        $nhthoadon = new NHT_HOA_DON;
    
        // Gán dữ liệu xác thực vào các thuộc tính của mô hình
        $nhthoadon->nhtMaHoaDon = $request->nhtMaHoaDon;
        $nhthoadon->nhtMaKhachHang = $request->nhtMaKhachHang;  // Giả sử đây là khóa ngoại
        $nhthoadon->nhtHoTenKhachHang = $request->nhtHoTenKhachHang;
        $nhthoadon->nhtEmail = $request->nhtEmail;
        $nhthoadon->nhtDienThoai = $request->nhtDienThoai;
        $nhthoadon->nhtDiaChi = $request->nhtDiaChi;
        
        // Lưu 'nhtTongGiaTri' dưới dạng float (hoặc double) để phù hợp với kiểu dữ liệu trong cơ sở dữ liệu
        $nhthoadon->nhtTongGiaTri = (double) $request->nhtTongGiaTri; // Chuyển đổi sang double
        
        $nhthoadon->nhtTrangThai = $request->nhtTrangThai;
    
        // Đảm bảo định dạng đúng cho các trường ngày
        $nhthoadon->nhtNgayHoaDon = $request->nhtNgayHoaDon;
        $nhthoadon->nhtNgayNhan = $request->nhtNgayNhan;
    
        // Lưu bản ghi mới vào cơ sở dữ liệu
        $nhthoadon->save();
    
        // Chuyển hướng đến danh sách hóa đơn
        return redirect()->route('nhtadmins.nhthoadon');
    }
    


    public function nhtEdit($id)
    {
        $nhthoadon = NHT_HOA_DON::where('id', $id)->first();
        $nhtkhachhang = NHT_KHACH_HANG::all();
        return view('nhtAdmins.nhthoadon.nht-edit',['nhtkhachhang'=>$nhtkhachhang,'nhthoadon'=>$nhthoadon]);
    }
    //post
    public function nhtEditSubmit(Request $request,$id)
    {
        // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
        $validate = $request->validate([
            'nhtMaHoaDon' => 'required|unique:nht_hoa_don,nhtMaHoaDon,'. $id,
            'nhtMaKhachHang' => 'required|exists:nht_khach_hang,id',
            'nhtNgayHoaDon' => 'required|date',  
            'nhtNgayNhan' => 'required|date',
            'nhtHoTenKhachHang' => 'required|string',  
            'nhtEmail' => 'required|email',
            'nhtDienThoai' => 'required|numeric',  
            'nhtDiaChi' => 'required|string',  
            'nhtTongGiaTri' => 'required|numeric', 
            'nhtTrangThai' => 'required|in:0,1,2',
        ]);
    
        $nhthoadon = NHT_HOA_DON::where('id', $id)->first();
        // Gán dữ liệu xác thực vào các thuộc tính của mô hình
        $nhthoadon->nhtMaHoaDon = $request->nhtMaHoaDon;
        $nhthoadon->nhtMaKhachHang = $request->nhtMaKhachHang;  // Giả sử đây là khóa ngoại
        $nhthoadon->nhtHoTenKhachHang = $request->nhtHoTenKhachHang;
        $nhthoadon->nhtEmail = $request->nhtEmail;
        $nhthoadon->nhtDienThoai = $request->nhtDienThoai;
        $nhthoadon->nhtDiaChi = $request->nhtDiaChi;
        
        // Lưu 'nhtTongGiaTri' dưới dạng float (hoặc double) để phù hợp với kiểu dữ liệu trong cơ sở dữ liệu
        $nhthoadon->nhtTongGiaTri = (double) $request->nhtTongGiaTri; // Chuyển đổi sang double
        
        $nhthoadon->nhtTrangThai = $request->nhtTrangThai;
    
        // Đảm bảo định dạng đúng cho các trường ngày
        $nhthoadon->nhtNgayHoaDon = $request->nhtNgayHoaDon;
        $nhthoadon->nhtNgayNhan = $request->nhtNgayNhan;
    
        // Lưu bản ghi mới vào cơ sở dữ liệu
        $nhthoadon->save();
    
        // Chuyển hướng đến danh sách hóa đơn
        return redirect()->route('nhtadmins.nhthoadon');
    }
    
        //delete
        public function nhtDelete($id)
        {
            NHT_HOA_DON::where('id',$id)->delete();
            return back()->with('hoadon_deleted','Đã xóa Khách hàng thành công!');
        }
}