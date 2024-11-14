<?php
class taiKhoanController {
    public $modelTaiKhoan;

    public function __construct()
    {
        $this->modelTaiKhoan = new taiKhoanModel();
    }

    public function danhSachTaiKhoan()
    {
        $listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoan();
            require_once './views/quanLiTaiKhoan/adminQuanLiThongTin.php';
        }        
    }
?>