@extends('layouts.admins._matster')
@section('title'.'Danh sách loại sản phẩm')

@section('content-body')
    <div class="container">
        <div class="row">
            <div class="col-12">    
                <h1>Danh sách loại sản phẩm</h1>
                    <a href="{{route('nhtadmins.nhtloaisanpham.nhtcreate')}}" type="button" class="btn btn-outline-primary">Thêm mới</a>
                </div>
        </div>
        <div class="row mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã Loại</th>
                        <th>Tên Loại</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $nhtLoaiSanPham as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$item->nhtMaLoai}}</td>
                        <td>{{$item->nhtTenLoai}}</td>
                        <td>{{$item->nhtTrangThai}}</td>
                        <td>
                            
                            <a href="/nht-admins/nht-loai-san-pham/nht-view/{{$item->id}}"type="button" class="btn btn-outline-primary">
                            Xem</a>

                            <a href="/nht-admins/nht-loai-san-pham/nht-edit/{{$item->id}}" type="button" class="btn btn-outline-success">
                            Sửa</a>
                        
                            <a href="/nht-admins/nht-loai-san-pham/nht-delete/{{$item->id}}"type="button" class="btn btn-outline-danger"
                            onclick="return confirm('Bạn có chắc muốn xóa không ?')">
                            Xóa</a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Chưa có thông tin sản phẩm</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection