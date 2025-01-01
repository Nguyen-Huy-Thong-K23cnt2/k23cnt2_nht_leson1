<header>
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Phần nội dung -->
        <div class="content">
            <h2 class="text-white">Quản lý nội dung</h2>
        </div>
        
        <!-- Logo -->
        <div class="logo ms-auto">
            <a href="/nht-admins" class="text-white text-decoration-none">
                <img 
                    src="{{ asset('storage/img/san_pham/logo.png') }}" 
                    alt="Logo" 
                    class="img-fluid logo-img" 
                    style="width: 200px; height: auto;" 
                />
            </a>
        </div>
    </div>
</header>

<!-- CSS -->
<style>
    .logo-img {
        border: none; /* Xóa viền */
        box-shadow: none; /* Xóa đổ bóng */
        background: transparent; /* Xóa màu nền nếu có */
    }

    header {
        padding: 15px 0; /* Thêm khoảng cách để logo và tiêu đề thoáng hơn */
    }

    .content h2 {
        margin: 0; /* Đảm bảo khoảng cách đều */
        font-size: 24px; /* Điều chỉnh kích thước phù hợp */
    }

    .container {
        max-width: 1200px; /* Giới hạn chiều rộng */
        margin: 0 auto; /* Căn giữa container */
    }
</style>
