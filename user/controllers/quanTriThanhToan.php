<?php
class thanhToanController
{
    public $modelPay;

    public function __construct()
    {
        $this->modelPay = new modelPays();
    }

    // Trang chủ
    public function trangchu()
    {
        require_once './views/trangchu.php';
    }
    public function showOrderDetails($orderId) {
        $orderDetails = $this->modelPay->getOrderDetails($orderId);

        $ticketDetails = $this->modelPay->getTicketDetails($orderId);

        if (empty($orderDetails) || empty($ticketDetails)) {
            echo "No details found for the given order.";
            return;
        }

        include_once('views/DonHang/chiTietDatHang.php');
    }    public function confirmation()
    {
echo "Cam on Ban"; 
    }
}