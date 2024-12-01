<?php
class modelCart
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function __destruct()
    {
        $this->conn = null;
    }
    public function getAllOrders()
    {
        $sql = "SELECT 
            a.full_name ,
            o.id_order,
            
            o.status,
            o.order_date
        FROM 
            `order` o
        
        JOIN 
            account a ON o.account_id = a.id_account;

            ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Thực hiện xác nhận đơn hàng
    public function xacNhan($id_order)
    {
        $sql = "UPDATE `order` SET status = 'Đã thanh toán' WHERE id_order = :id_order";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id_order", $id_order);
        return $stmt->execute();
    }

    // Hủy đơn hàng
    public function huy($id_order)
    {
        $sql = "UPDATE `order` SET status = 'Chờ thanh toán' WHERE id_order = :id_order";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id_order", $id_order);
        return $stmt->execute();
    }
    public function getOrderById($id_order)
    {
        $sql = "SELECT 
                o.id_order, 
                o.order_date, 
                o.status AS order_status,
                a.username AS account_username,
                a.full_name ,
                a.phone,
                a.email,
                m.movie_name,
                m.duration,
                t.price,
                t.id_ticket,
                st.start_time AS showtime,
                GROUP_CONCAT(s.seat_name ORDER BY s.seat_name SEPARATOR ', ') AS seat_names,
                COUNT(s.seat_name) AS total_seats, 
                SUM(od.quantity) AS total_quantity,
                SUM(od.quantity * t.price) AS total_price
            FROM 
                `order` o
            JOIN 
                order_details od ON o.id_order = od.order_id
            JOIN 
                tickets t ON od.ticket_id = t.id_ticket
            JOIN 
                movie m ON t.movie_id = m.movie_id
            JOIN 
                account a ON o.account_id = a.id_account
            JOIN 
                seat s ON t.seat_id = s.id_seat
            JOIN 
                showtimes st ON t.showtime_id = st.showtime_id
            WHERE 
                o.id_order = :id_order
            GROUP BY
                o.id_order, o.order_date, o.status, a.username, a.full_name, m.movie_name, m.duration, st.start_time,t.price,t.id_ticket";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id_order", $id_order);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Fetch all order details
    }
}
