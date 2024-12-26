<ul class="list-group">
    <!-- Hiển thị tên tài khoản nếu đã đăng nhập -->
    <li class="list-group-item active" style="color: red; background:blue;">
        @if(Session::has('username'))
            <span class="fw-bold">Hello, {{ Session::get('username') }}</span>
        @else
            <a href="/nht-admins/login" >Đăng nhập</a>
        @endif
    </li>

    <li class="list-group-item active" aria-current="true">
        <strong>Quản Trị Nội Dung</strong>
    </li>
    <li class="list-group-item">
        <a href="/nht-admins/nht-loai-san-pham" class="text-decoration-none text-dark">Loại Sản Phẩm</a>
    </li>

    <li class="list-group-item">A fourth item</li>
    <li class="list-group-item">And a fifth one</li>
  </ul>