<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách sinh viên</title>
        <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<section class="container">
        <div class="card">
            <div class="carh-header">
                <h1>Danh sách sinh viên </h1>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Mã SV</th>
                            <th>Họ SV</th>
                            <th>Tên SV</th> 
                            <th>Giới tính</th>
                            <th>Ngày sinh</th>
                            <th>Nơi sinh</th>
                            <th>Mã khoa</th>
                            <th>Học bổng</th>
                            <th>Điểm TB</th>
                            <th>Chức năng</th>                     
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $stt=1;
                        @endphp
                        @foreach ($nhtSinhVien as $item)
                        <tr>
                            <td class="text-center">{{$stt}}</td>
                            <td>{{ $item -> nhtMaSV}}</td>
                            <td>{{ $item -> nhtHoSV}}</td>
                            <td>{{ $item -> nhtTenSV}}</td>
                            <td>{{ $item -> nhtPhai}}</td>
                            <td>{{ $item -> nhtNgaySinh}}</td>
                            <td>{{ $item -> nhtNoiSinh}}</td>
                            <td>{{ $item -> nhtMaKhoa}}</td>
                            <td>{{ $item -> nhtHocBong}}</td>
                            <td class="text-right">{{ $item -> nhtDiemTB}}</td>
                            <td class="text-center">
                                /View/ Edit/ Delete
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <h3>Tổng số sinh viên: {{$nhtSinhViens -> count()}}</h3>
                <a href="/nht-sinhviens/nhtCreate" class="btn btn-primary">Thêm mới</a>
            </div>
        </div>
    </section>
</body>
</html>>
