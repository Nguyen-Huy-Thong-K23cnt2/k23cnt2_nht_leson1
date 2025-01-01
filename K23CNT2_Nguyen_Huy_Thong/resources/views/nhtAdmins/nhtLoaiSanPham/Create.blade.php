@extends('layouts.admins._matster')
@section('title'.'Thêm mới loại sản phẩm')

@section('content-body')
    <div class="container">
        <div class="row mt-3">
            <div  class="col"> 
                <form action="{{route('nhtadmins.nhtloaisanpham.nhtcreatesubmit')}}" method="post">
                    @csrf
                    <div class="card">
                           <div class="card-header">
                                <h2>Thêm mới loại sản phẩm</h2>
                           </div>
                            <div class="card-body container-fluid">
                                <div class="mb-3 row">
                                        <label for="nhtMaLoai" class="col-sm-2 col-form-label">Mã Loại</label>
                                    <div class="col-sm-10">
                                         <input type="text" class="form-control" 
                                         value="{{old('nhtMaLoai')}}"
                                         id="nhtMaLoai" name="nhtMaLoai" />
                                        @error('nhtMaLoai')
                                            <span class="text-danger">Điền Thông Tin Theo Quy Định</span>  
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                        <label for="nhtTenLoai" class="col-sm-2 col-form-label">Tên Loại</label>
                                    <div class="col-sm-10">
                                         <input type="text" class="form-control" 
                                         value="{{old('nhtTenLoai')}}"
                                         id="nhtTenLoai" name="nhtTenLoai" />
                                         @error('nhtTenLoai')
                                            <span class="text-danger">Điền Thông Tin Theo Quy Định</span>  
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                        <label for="nhtTrangThai" class="col-sm-2 col-form-label">Trạng Thái</label>
                                    <div class="col-sm-10">
                                         <input type="radio"
                                         id="nhtTrangThai1" name="nhtTrangThai" value="1" checked/>
                                         <label for="nhtTrangThai1">Còn Hàng</label>
                                            &nbsp;
                                         <input type="radio"
                                         id="nhtTrangThai0" name="nhtTrangThai" value="0"/>
                                         <label for="nhtTrangThai0">Đã Hết</label>
                                    </div>
                                </div>
                            </div>

                           <div class="card-footer">
                                <button class="btn btn-success">Thêm mới</button>
                                <a href="{{route('nhtadmins.nhtloaisanpham')}}" class="btn btn-secondary">Quay Lại</a>
                           </div>
                    </div> 
                </form>
            </div>
        </div>
    </div>
@endsection