<?php
require_once '../commons/env.php';
require_once '../commons/function.php';
// Controller
require_once './controllers/yourController.php';
require_once './controllers/quanTriTaiKhoanController.php';
require_once './controllers/quanTriTinTucController.php';
require_once './controllers/quanTriLoaiPhimController.php';
require_once './controllers/quanTriPhimController.php';
require_once './controllers/quanTriGheController.php';
require_once './controllers/quanTriPhongChieuController.php';
require_once './controllers/quanTriSuatChieuController.php';
require_once './controllers/quanTriVeController.php';
require_once './controllers/quanTriDatHangController.php';




// Model
require_once './models/yourModel.php';
require_once './models/quanTriTaiKhoanModel.php';
require_once './models/quanTriTinTucModel.php';
require_once './models/quanTriLoaiPhimModel.php';
require_once './models/quanTriPhimModel.php';
require_once './models/quanTriGheModel.php';
require_once './models/quanTriPhongChieuModel.php';
require_once './models/quanTriSuatChieuModel.php';
require_once './models/quanTriVeModel.php';
require_once './models/quanTriDatHangModel.php';



$act = $_GET['act'] ?? '/';

match ($act) {
    '/' => (new yourController())->trangchu(),
    'trangchu' => (new yourController())->trangchu(),
    'quanTriTinTuc' => (new quanTriTinTucController())->tinTuc(),
    'themTinTuc' => (new quanTriTinTucController())->themTinTuc(),
    'postTinTuc' => (new quanTriTinTucController())->postTinTuc(),
    'deleteTinTuc' => (new quanTriTinTucController())->deleteTinTuc(),
    'suaTinTuc' => (new quanTriTinTucController())->suaTinTuc(),
    'editTintuc' => (new quanTriTinTucController())->editTintuc(),
    'chiTietTinTuc' => (new quanTriTinTucController())->chiTietTinTuc(),


    'quanTriLoaiPhim' => (new quanTriLoaiPhimController())->quanTriLoaiPhim(),
    'themTheLoai' => (new quanTriLoaiPhimController())->themTheLoai(),
    'postTheLoai' => (new quanTriLoaiPhimController())->postTheLoai(),
    'deleteTheLoai' => (new quanTriLoaiPhimController())->deleteTheLoai(),
    'suaTheLoai' => (new quanTriLoaiPhimController())->suaTheLoai(),
    'editTheLoai' => (new quanTriLoaiPhimController())->editTheLoai(),


    'quanTriPhim' => (new quanTriPhimController())->quanTriPhim(),
    'themPhim' => (new quanTriPhimController())->themPhim(),
    'postPhim' => (new quanTriPhimController())->postPhim(),
    'deletePhim' => (new quanTriPhimController())->deletePhim(),
    'suaPhim' => (new quanTriPhimController())->suaPhim(),
    'editPhim' => (new quanTriPhimController())->editPhim(),
    'chiTietPhim' => (new quanTriPhimController())->chiTietPhim(),


    'quanTriGhe' => (new quanTriGheController())->manageSeats(),
    'changeSeatType' => (new quanTriGheController())->changeSeatType(),
    'changeSeatStatus' => (new quanTriGheController())->changeSeatStatus(),
    // 'quanTriGhe' => (new quanTriGheController())->quanTriGhe(),


    'quanTriPhongChieu_LoaiGhe' => (new quanTriPhongChieu_LoaiChieu_Controller())-> quanTriPhongChieu_LoaiGhe(),
    'themPhong' => (new quanTriPhongChieu_LoaiChieu_Controller())-> themPhong(),
    'postPhong' => (new quanTriPhongChieu_LoaiChieu_Controller())-> postPhong(),
    'suaPhong' => (new quanTriPhongChieu_LoaiChieu_Controller())-> suaPhong(),
    'editPhong' => (new quanTriPhongChieu_LoaiChieu_Controller())-> editPhong(),
    'trangThaiPhong' => (new quanTriPhongChieu_LoaiChieu_Controller())-> trangThaiPhong(),
    'xoaPhong' => (new quanTriPhongChieu_LoaiChieu_Controller())-> xoaPhong(),



    'quanTriTaiKhoan' => (new quanTriTaiKhoanController())->quanTriTaiKhoan(),
    'doiTrangThai' => (new quanTriTaiKhoanController())->doiTrangThai(),
    'chiTietTaiKhoan' => (new quanTriTaiKhoanController())->chiTietTaiKhoan(),



    'quanTriSuatChieu' => (new quanTriSuatChieuController())->quanTriSuatChieu(),
    'themSuatChieu' => (new quanTriSuatChieuController())-> themSuatChieu(),
    'postSuatChieu' => (new quanTriSuatChieuController())-> postSuatChieu(),
    'suaSuatChieu' => (new quanTriSuatChieuController())-> suaSuatChieu(),
    'editSuatChieu' => (new quanTriSuatChieuController())-> editSuatChieu(),
    'deleteSuatChieu' => (new quanTriSuatChieuController())-> deleteSuatChieu(),

    'quanTriVe' =>(new quanTriVeController())->quanTriVe(),
    'themVe' =>(new quanTriVeController())->quanTriVe(),
    'deleteVe' =>(new quanTriVeController())->quanTriVe(),
    'suaVe' =>(new quanTriVeController())->quanTriVe(),
    
    'quanTriDatHang' =>(new quanTriDatHangController())->quanTriDatHang(),
    // 'themDatHang' =>(new quanTriDatHangController())->themDatHang(),
    // 'deleteDatHang' =>(new quanTriDatHangController())->deleteDatHang(),
    // 'chiTietDatHang' =>(new quanTriDatHangController())->chiTietDatHang(),
};
