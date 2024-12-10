<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  </head>
  <body>
    <section class="container border my-3">
        <h1>Danh sách khoa</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã khoa</th>
                        <th>Tên khoa</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
            <tbody>
                @php
                    $stt=0;
                @endphp
                @foreach ($khoas as $item)
                    @php
                        $stt++;
                     @endphp
            <tr>
                <th>{{$stt}}</th>
                    <td>{{$item->NHTMAKHOA}}</td>
                    <td>{{$item->NHTTENKHOA}}</td>
                    <td>
                edit / delete
                    </td>
            </tr>
                @endforeach
            </tbody>
             </table>
    </section>
 </body>
</html>