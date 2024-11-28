<nav class="navbar">
    <div class="logo">
        <a href="?act=trangchu">
            <img src="https://i.pinimg.com/736x/76/42/ca/7642ca38bdb1c1f4692a1bb3c1e2f5cc.jpg" alt="BeeFilmHub Logo" />
            <span class="bee">Bee</span><span class="filmhub">FilmHub</span>
        </a>
    </div>
    <ul class="links">
        <li><a href="<?= BASE_URL_USER . '?act=trangchu' ?>">Trang chủ</a></li>
        <li><a href="<?= BASE_URL_USER . '?act=phimdangchieu' ?>">Phim</a></li>
        <!-- <li><a href="#">Phim Sắp Chiếu</a></li> -->
        <li><a href="<?= BASE_URL_USER . '?act=tinTuc' ?>">Tin mới & Ưu đãi</a></li>
    </ul>
    <div class="user-area dropdown float-right">
        <span>Xin chào, <?php echo $_SESSION['user']['username']; ?></span>

        <!-- Kích hoạt dropdown khi nhấn vào avatar -->
        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <!-- Avatar người dùng -->
            <img class="user-avatar rounded-circle" src="https://scontent.fhan14-4.fna.fbcdn.net/v/t1.15752-9/462558354_1768316567240669_1874724754795816513_n.png?_nc_cat=102&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeFKatYpLC-mS9rmFWYdUml60b_kpkPa_hfRv-SmQ9r-Fz-mK9Ug3vjPxcJxSnImqkuXcqskshwn8HY7fXalXfLr&_nc_ohc=ZBokyfpwEUYQ7kNvgHtuAE1&_nc_zt=23&_nc_ht=scontent.fhan14-4.fna&_nc_gid=Am6VL5KmYlPsQH4HlfcCiIg&oh=03_Q7cD1QEvX6wqCLEK9yJyAwY6T9bot6jM_goJffd4MdE61OqFmw&oe=674F0EAA" alt="Hình đại diện người dùng" style="width: 40px; height: 40px;">
            <!-- Chỉ thị online -->
            <span class="online-indicator"></span>
        </a>

        <!-- Menu dropdown -->
        <div class="user-menu dropdown-menu">
            <a href="<?= BASE_URL_USER . '?act=thongTinTaiKhoan&id=' . $_SESSION['user']['id_account']; ?>">Thông tin tài khoản</a>


            <a class="nav-link" href="?act=logout"><i class="fa fa-power-off"></i>Đăng xuất</a>
        </div>
    </div>
</nav>