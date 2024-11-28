<?php
session_start();
require_once './commons/env.php';
require_once './commons/function.php';
require_once './controllers/userController.php';
require_once './controllers/quanTriTinTucController.php';
require_once './controllers/quanTriPhimDangChieuController.php';



require_once './models/userModel.php';
require_once './models/quanTriTinTucModel.php';
require_once './models/quanTriPhimDangChieuModel.php';

$act = $_GET['act'] ?? '/';

match ($act) {
    '/' => (new userController())->trangchu(),
    'trangchu' => (new userController())->trangchu(),
    'formLogin' => (new userController())->formLogin(),
    'login' => (new userController())->postLogin(),
    'formRegister' => (new userController())->formRegister(),
    'dangky' => (new userController())->postRegister(),
    'logout' => (new userController())->logout(),



    'tinTuc' =>(new  quanTriTinTucController())->tinTuc(),
    'chiTietTinTuc' =>(new  quanTriTinTucController())->chiTietTinTuc(),


    'phimdangchieu' =>(new quanTriPhimDangChieuController())->phimdangchieu(),
    'chitietPhim' =>(new quanTriPhimDangChieuController())->chitietPhim(),
};
?>
