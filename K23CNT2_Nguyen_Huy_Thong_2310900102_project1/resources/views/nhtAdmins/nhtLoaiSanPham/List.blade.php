@extends('layouts.admins._matster')
@section('title'.'Danh sách loại sản phẩm')

@section('content-body')
    <div class="container">
        <div class="row">
            <div class="col-12">    
                <h1>Danh sách loại sản phẩm</h1>
                    <a href="{{route('nhtadmins.nhtloaisanpham.nhtcreate')}}" class="btn btn-success">Thêm mới</a>
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
                            view/
                            <a href="/nht-admins/nht-loai-san-pham/nht-edit/{{$item->id}}">Edit</a>
                        /delete
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