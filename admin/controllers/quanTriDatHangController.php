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
        $listOrders = $this->modelCarts->getAllOrders();
        // var_dump($listOrders);die();
        require_once './views/quanLiDatHang/adminDatHang.php';
    }
    public function xacNhanDonHang()
    {
        if (isset($_GET['id_order'])) {
            $id_order = intval($_GET['id_order']);
            if ($id_order > 0) {
                $xacNhan = $this->modelCarts->xacNhan($id_order);
                header('Location:' . BASE_URL_ADMIN . '?act=quanTriDatHang');
            } else {
                // Thực hiện hành động lỗi
                header('Location:' . BASE_URL_ADMIN . '?act=quanTriDatHang&error=invalid');
            }
        }
    }

    public function huyDonHang()
    {
        if (isset($_GET['id_order'])) {
            $id_order = intval($_GET['id_order']);
            if ($id_order > 0) {
                $huy = $this->modelCarts->huy($id_order);
                header('Location:' . BASE_URL_ADMIN . '?act=quanTriDatHang');
            } else {
                // Thực hiện hành động lỗi
                header('Location:' . BASE_URL_ADMIN . '?act=quanTriDatHang&error=invalid');
            }
        }
    }
    public function chiTietDonHang(){
        $id_order = $_GET['id_order'];
        if($id_order){
            $order_details = $this->modelCarts->getOrderById($id_order);
            // var_dump($order_details); die();

            if($order_details){
                require_once './views/DonHangChiTiet/chiTietDonHang.php';
            }
            else{
                header('Location:'. BASE_URL_ADMIN.'?act=quanTriDatHang');
            }
        }else{
            header('Location:'. BASE_URL_ADMIN.'?act=quanTriDatHang');
            exit();
        }
    }
}
