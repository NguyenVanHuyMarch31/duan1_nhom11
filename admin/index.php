<?php
require_once '../commons/env.php';
require_once '../commons/function.php';
// Controller
require_once './controllers/yourController.php';
// require_once './controllers/quanTriTaiKhoanController.php';
require_once './controllers/quanTriTinTucController.php';
require_once './controllers/quanTriLoaiPhimController.php';
require_once './controllers/quanTriPhimController.php';
require_once './controllers/quanTriGheController.php';



// Model
require_once './models/yourModel.php';
// require_once './models/quanTriTaiKhoanModel.php';
require_once './models/quanTriTinTucModel.php';
require_once './models/quanTriLoaiPhimModel.php';
require_once './models/quanTriPhimModel.php';
require_once './models/quanTriGheModel.php';



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

    // 'quanTriTaiKhoan' => (new quanTriTaiKhoanController())->quanTriTaiKhoan(),

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

    'quanTriGhe' => (new quanTriGheController())->quanTriGhe(),
    'themGhe' => (new quanTriGheController())->themGhe(),
    'postGhe' => (new quanTriGheController())->postGhe(),
    'deleteGhe' => (new quanTriGheController())->deleteGhe(),
    'suaGhe' => (new quanTriGheController())->suaGhe(),
    'editGhe' => (new quanTriGheController())->editGhe(),
    'chiTietGhe' => (new quanTriGheController())->chiTietGhe(),






};
