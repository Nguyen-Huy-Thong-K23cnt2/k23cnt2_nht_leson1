@extends('layouts.admins._matster')
@section('title'.'Sửa Thông Tin Sản Phẩm')

@section('content-body')
    <div class="container">
        <div class="row mt-3">
            <div  class="col"> 
                <form action="{{route('nhtadmins.nhtloaisanpham.nhteditsubmit')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{$nhtLoaiSanPham->id}}">
                    <div class="card">
                           <div class="card-header">
                                <h2>Sửa thông tin sản phẩm</h2>
                           </div>
                            <div class="card-body container-fluid">
                                <div class="mb-3 row">
                                        <label for="nhtMaLoai" class="col-sm-2 col-form-label">Mã Loại</label>
                                    <div class="col-sm-10">
                                         <input type="text" class="form-control" 
                                         value="{{$nhtLoaiSanPham->nhtMaLoai}}"
                                         id="nhtMaLoai" name="nhtMaLoai" />
                                        @error('nhtMaLoai')
                                            <span class="text-danger">{{ $message }}</span>  
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                        <label for="nhtTenLoai" class="col-sm-2 col-form-label">Tên Loại</label>
                                    <div class="col-sm-10">
                                         <input type="text" class="form-control"
                                         value="{{$nhtLoaiSanPham->nhtTenLoai}}" 
                                         id="nhtTenLoai" name="nhtTenLoai" />
                                         @error('nhtTenLoai')
                                            <span class="text-danger">{{ $message }}</span>  
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                        <label for="nhtTrangThai" class="col-sm-2 col-form-label">Trạng Thái</label>
                                    <div class="col-sm-10">
                                        @if($nhtLoaiSanPham->nhtTrangThai ===1)
                                                <input type="radio"
                                            id="nhtTrangThai1" name="nhtTrangThai" value="1" checked/>
                                            <label for="nhtTrangThai1">Còn Hàng</label>
                                                &nbsp;
                                            <input type="radio"
                                            id="nhtTrangThai0" name="nhtTrangThai" value="0"/>
                                            <label for="nhtTrangThai0">Đã Hết</label>

                                        @else
                                        <input type="radio"
                                            id="nhtTrangThai1" name="nhtTrangThai" value="1" />
                                            <label for="nhtTrangThai1">Còn Hàng</label>
                                                &nbsp;
                                            <input type="radio"
                                            id="nhtTrangThai0" name="nhtTrangThai" value="0" checked/>
                                            <label for="nhtTrangThai0">Đã Hết</label>
                                        @endif
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