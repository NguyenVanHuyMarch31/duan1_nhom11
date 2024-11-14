<?php
class quanTriTaiKhoanController {
    public $modelTaiKhoan;

    public function __construct()
    {
        $this->modelTaiKhoan = new quanTriTaiKhoanModel();
    }

    public function danhSachTaiKhoan()
    {
        $listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoan();
            require_once './views/quanLiTaiKhoan/adminQuanLiThongTin.php';
        }        
    }
?>