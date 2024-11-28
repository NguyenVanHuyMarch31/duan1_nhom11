<?php
class quanTriDatHangController
{    
    public $modelCarts;
    public function __construct()
    {
        $this->modelCarts = new modelCart();
    }

    public function quanTriDatHang()
    {
        require_once './views/quanLiDatHang/adminDatHang.php';
    }
    
}
