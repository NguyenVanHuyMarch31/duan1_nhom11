<?php
class yourController
{    
    public $modelProduct;
    public function __construct()
    {
        $this->modelProduct = new yourModel();
    }

    public function trangchu()
    {
        require_once './views/trangchu.php';
    }
    // Quản lý rạp
    public function quanLiRap() {
        // echo "Quản lý rạp chiếu";
        require_once './views/quanLiRap/adminQuanLiRap.php';
        // Xử lý logic quản lý rạp chiếu ở đâi
    }

    // Quản lý thể loại phim
    public function quanLiTheLoai() {
        // echo "Quản lý thể loại phim";
        require_once './views/quanLiTheLoai/adminQuanLiTheLoai.php';
        // Xử lý logic quản lý thể loại phim ở đâi
    }

    // Quản lý phòng phim
    public function quanLiPhong() {
        // echo "Quản lý phòng phim";
        require_once './views/quanLiPhong/adminQuanLiPhong.php';

        // Xử lý logic quản lý phòng phim ở đâi
    }

    // Quản lý phim
    public function quanLiPhim() {
        // echo "Quản lý phim";
        require_once './views/quanLiPhim/adminQuanLiPhim.php';

        // Xử lý logic quản lý phim ở đâi
    }

    // Quản lý danh sách đặt vé xem phim
    public function quanLiDanhSachVe() {
        // echo "Quản lý danh sách đặt vé xem phim";
        require_once './views/quanLiDanhSachVe/adminQuanLiDanhSachVe.php';

        // Xử lý logic quản lý danh sách đặt vé ở đâi
    }

    // Quản lý bình luận
    public function quanLiBinhLuan() {
        // echo "Quản lý bình luận";
        require_once './views/quanLiBinhLuan/adminQuanLiBinhLuan.php';

        // Xử lý logic quản lý bình luận ở đâi
    }

    // Thống kê
    public function thongKe() {
        // echo "Thống kê";
        require_once './views/thongKe/adminThongKe.php';

        // Xử lý logic thống kê ở đâi
    }

    // Quản lý suất chiếu
    public function quanLiXuatChieu() {
        // echo "Quản lý suất chiếu";
        require_once './views/quanLiXuatChieu/adminQuanLiXuatChieu.php';

        // Xử lý logic quản lý suất chiếu ở đâi
    }

    // Quản lý tài khoản
    public function quanLiKhachHang() {
        // echo "Quản lý tài khoản";
        require_once './views/quanLiTaiKhoan/quanLiKhachHang/adminQuanLiKhachHang.php';

        // Xử lý logic quản lý tài khoản ở đâi
    }
    // Quản lý tài khoản
    public function quanLiNguoiDung() {
        // echo "Quản lý tài khoản";
        require_once './views/quanLiTaiKhoan/quanLiNguoiDung/adminQuanLiNguoiDung.php';

        // Xử lý logic quản lý tài khoản ở đâi
    }
    // Quản lý tài khoản
    public function quanLiThongTin() {
        // echo "Quản lý tài khoản";
        require_once './views/quanLiTaiKhoan/thongTinTaiKhoan/adminQuanLiThongTin.php';

        // Xử lý logic quản lý tài khoản ở đâi
    }
}
