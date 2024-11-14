<?php
require_once '../commons/env.php';
require_once '../commons/function.php';
//Controller
require_once './controllers/yourController.php';
require_once './controllers/quanTriTaiKhoanCotroller.php';
require_once './controllers/quanTriTinTucController.php';


//Model
require_once './models/yourModel.php';
require_once './models/quanTriTaiKhoanModel.php';
require_once './models/quanTriTinTucModel.php';

$act = $_GET['act'] ?? '/';

match ($act) {
    '/' => (new yourController())->trangchu(),
    'trangchu' => (new yourController())->trangchu(),
    // 'quanTriTaiKhoan' => (new quanTriTaiKhoanController())->trangchu(),
    // 'quanTriTinTuc' => (new quanTriTinTucController())->trangchu(),

    



};
