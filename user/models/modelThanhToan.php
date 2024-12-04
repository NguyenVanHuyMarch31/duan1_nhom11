<?php
class modelPays
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();  // Kết nối cơ sở dữ liệu
    }

    public function __destruct()
    {
        $this->conn = null;  // Đóng kết nối sau khi sử dụng
    }
    public function getTicketDetails($ticketId) {
        // Query to fetch ticket details based on ticketId
        $sql = "SELECT t.id_ticket, t.movie_id, t.showtime_id, t.seat_id, t.price, 
                       m.movie_name, m.duration, m.description, s.seat_name 
                FROM tickets t 
                JOIN movie m ON t.movie_id = m.movie_id
                JOIN seat s ON t.seat_id = s.id_seat 
                WHERE t.id_ticket = :ticketId";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':ticketId', $ticketId);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getOrderDetails($orderId) {
        // Query to fetch order details, including tickets and customer info
        $sql = "SELECT o.id_order, o.account_id, o.order_date, o.status, 
                       a.full_name, a.phone, a.email 
                FROM `order` o
                JOIN account a ON o.account_id = a.id_account 
                WHERE o.id_order = :orderId";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':orderId', $orderId);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}