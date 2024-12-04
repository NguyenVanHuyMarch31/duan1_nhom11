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
    // Function to display the order details
    public function showOrderDetails($orderId) {
        // Fetch order details
        $orderDetails = $this->modelPay->getOrderDetails($orderId);

        // Fetch ticket details
        $ticketDetails = $this->modelPay->getTicketDetails($orderId);

        // Check if order or ticket details are empty and handle appropriately
        if (empty($orderDetails) || empty($ticketDetails)) {
            // Handle the error if no order or ticket details are found
            echo "No details found for the given order.";
            return;
        }

        // Pass data to the view
        include_once('views/DonHang/chiTietDatHang.php');
    }    public function confirmation()
    {
echo "Cam on Ban"; 
    }
}