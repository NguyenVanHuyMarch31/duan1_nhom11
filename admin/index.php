<?php
require_once '../commons/env.php';
require_once '../commons/function.php';
require_once './controllers/yourController.php';
require_once './models/yourModel.php';

$act = $_GET['act'] ?? '/';

match ($act) {
    '/' => (new yourController())->trangchu(),

    'trangchu' => (new yourController())->trangchu(),
    'quanLiRap' => (new yourController())->quanLiRap(),
    'quanLiBinhLuan' => (new yourController())->quanLiBinhLuan(),
    'quanLiDanhSachVe' => (new yourController())->quanLiDanhSachVe(),
    'quanLiPhim' => (new yourController())->quanLiPhim(),
    'quanLiKhachHang' => (new yourController())->quanLiKhachHang(),
    'quanLiPhong' => (new yourController())->quanLiPhong(),

    'quanLiNguoiDung' => (new yourController())->quanLiNguoiDung(),
    'quanLiThongTin' => (new yourController())->quanLiThongTin(),
    'quanLiTheLoai' => (new yourController())->quanLiTheLoai(),

    'quanLiXuatChieu' => (new yourController())->quanLiXuatChieu(),
    'thongKe' => (new yourController())->thongKe(),
};
