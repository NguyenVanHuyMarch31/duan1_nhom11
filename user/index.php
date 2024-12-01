<?php
session_start();
require_once '../commons/env.php';
require_once '../commons/function.php';
require_once './controllers/userController.php';
require_once './controllers/quanTriTinTucController.php';
require_once './controllers/quanTriPhimDangChieuController.php';
require_once './controllers/quanTriDatVeController.php';



require_once './models/userModel.php';
require_once './models/quanTriTinTucModel.php';
require_once './models/quanTriPhimDangChieuModel.php';
require_once './models/quanTriDatVeModel.php';

$act = $_GET['act'] ?? '/';

match ($act) {
    '/' => (new userController())->trangchu(),
    'trangchu' => (new userController())->trangchu(),
    'formLogin' => (new userController())->formLogin(),
    'formRegister' => (new userController())->formRegister(),
    'dangky' => (new userController())->postRegister(),  // Xử lý đăng ký
    'logout' => (new userController())->logout(),  
    'quanTriTaiKhoan' => (new userController())->quanTriTaiKhoan(),  

    'thongTinTaiKhoan' => (new userController())->thongTinTaiKhoan(),
    'thongbao' => (new userController())->thongbao(),
    'suaTaiKhoan' => (new userController())->suaTaiKhoan(),
    'postTaiKhoan' => (new userController())->postTaiKhoan(),

    'doiMatKhau' => (new userController())->doiMatKhau(),
    'lichSuDatVe' => (new userController())->lichSuDatVe(),



    'tinTuc' =>(new  quanTriTinTucController())->tinTuc(),
    'chiTietTinTuc' =>(new  quanTriTinTucController())->chiTietTinTuc(),


    'phimdangchieu' =>(new quanTriPhimDangChieuController())->phimdangchieu(),
    'chitietPhim' =>(new quanTriPhimDangChieuController())->chitietPhim(),


    'datVe'=>(new quanTriDatVeController())->datVe(),
    // 'postDatVe'=>(new quanTriDatVeController())->postDatVe(),
    // 'datHang'=>(new quanTriDatVeController())->datHang(),
    
};

?>
