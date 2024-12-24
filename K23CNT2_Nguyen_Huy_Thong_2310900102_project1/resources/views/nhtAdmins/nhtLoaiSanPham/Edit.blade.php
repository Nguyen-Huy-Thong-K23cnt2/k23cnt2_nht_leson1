@extends('layouts.admins._matster')
@section('title'.'Sửa Thông Tin Sản Phẩm')

@section('content-body')
    <div class="container">
        <div class="row mt-3">
            <div  class="col"> 
                <form action="" method="post">
                    @csrf
                    <input type="text" name="id" id="id" value="{{$nhtLoaiSanPham->id}}">
                    <div class="card">
                           <div class="card-header">
                                <h2>Sửa thông tin sản phẩm</h2>
                           </div>
                            <div class="card-body container-fluid">
                                <div class="mb-3 row">
                                        <label for="nhtMaLoai" class="col-sm-2 col-form-label">Mã Loại</label>
                                    <div class="col-sm-10">
                                         <input type="text" class="form-control" 
                                         id="nhtMaLoai" name="nhtMaLoai" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                        <label for="nhtTenLoai" class="col-sm-2 col-form-label">Tên Loại</label>
                                    <div class="col-sm-10">
                                         <input type="text" class="form-control" 
                                         id="nhtTenLoai" name="nhtTenLoai" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                        <label for="nhtTrangThai" class="col-sm-2 col-form-label">Trạng Thái</label>
                                    <div class="col-sm-10">
                                         <input type="radio"
                                         id="nhtTrangThai1" name="nhtTrangThai" value="1" checked/>
                                         <label for="nhtTrangThai1">Hiển thị</label>
                                            &nbsp;
                                         <input type="radio"
                                         id="nhtTrangThai0" name="nhtTrangThai" value="0"/>
                                         <label for="nhtTrangThai0">Khóa</label>
                                    </div>
                                </div>
                            </div>

                           <div class="card-footer">
                                <button class="btn btn-success">Ghi lại</button>
                                <a href="{{route('nhtadmins.nhtloaisanpham')}}" class="btn btn-secondary">Quay Lại</a>
                           </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection