<?php
class quanTriTaiKhoanController {
    public $modelTaiKhoan;

    public function __construct()
    {
        $this->modelTaiKhoan = new quanTriTaiKhoanModel();
    }

    public function quanTriTaiKhoan()
    {
            require_once './views/quanLiTaiKhoan/adminQuanLiThongTin.php';
        }        
    }
?>