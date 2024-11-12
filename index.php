<?php
session_start();
require_once './commons/env.php';
require_once './commons/function.php';
require_once './controllers/userController.php';
require_once './models/userModel.php';

$act = $_GET['act'] ?? '/';

match ($act) {
    '/' => (new userController())->trangchu(),
    
    'trangchu'  => (new userController())->trangchu(),
    'dangky'     => (new userController())->postRegister(),
    'dangnhap'   => (new userController())->postLogin(),
    'login'   => (new userController())->formLogin(),
    'register'   => (new userController())->formRegister(),
    

};
