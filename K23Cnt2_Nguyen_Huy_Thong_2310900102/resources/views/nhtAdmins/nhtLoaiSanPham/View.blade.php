@extends('layouts.admins._matster')

@section('title', 'Chi tiết loại sản phẩm')

@section('content-body')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Chi tiết loại sản phẩm</h1>
                <a href="{{ route('nhtadmins.nhtloaisanpham') }}" class="btn btn-primary">Quay lại danh sách</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <table class="table table-bordered">
                    <tr>
                        <th>Mã Loại</th>
                        <td>{{ $nhtLoaiSanPham->nhtMaLoai }}</td>
                    </tr>
                    <tr>
                        <th>Tên Loại</th>
                        <td>{{ $nhtLoaiSanPham->nhtTenLoai }}</td>
                    </tr>
                    <tr>
                        <th>Trạng Thái</th>
                        <td>{{ $nhtLoaiSanPham->nhtTrangThai == 1 ? 'Còn Hàng' : 'Đã Hết' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
