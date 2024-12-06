<?php
class modelDatVes
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB(); // Kết nối cơ sở dữ liệu
    }

    public function __destruct()
    {
        $this->conn = null; // Đóng kết nối sau khi sử dụng
    }

    // Thêm vào trong modelDatVes
    public function getSeats()
    {
        // Giả sử bạn muốn lấy tất cả ghế mà không cần điều kiện phòng chiếu
        $query = "SELECT * FROM seat";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMovieById($movie_id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM movie WHERE movie_id = ?");
        $stmt->execute([$movie_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Lấy danh sách suất chiếu theo ID phim
    public function getShowtimesByMovieId($movie_id)
    {
        $query = "SELECT * FROM showtimes WHERE movie_id = :movie_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':movie_id', $movie_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy danh sách phòng chiếu
    public function getCinemaRooms()
    {
        $query = "SELECT * FROM cinema_room";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }




    public function insertVe($movie_id, $showtime_id, $seat_id)
{
    // Giả sử bạn có giá vé và mã QR từ form hoặc tính toán
    $price = 120000; // Ví dụ giá vé là 100,000 VND

    $sql = "INSERT INTO tickets (movie_id, showtime_id, seat_id, price, qr) 
            VALUES (:movie_id, :showtime_id, :seat_id, :price, :qr)";
    $stmt = $this->conn->prepare($sql);

    $stmt->bindParam(':movie_id', $movie_id);
    $stmt->bindParam(':showtime_id', $showtime_id);
    $stmt->bindParam(':seat_id', $seat_id);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':qr', $qr);

    if ($stmt->execute()) {
        // Trả về mảng thông tin vé, bao gồm id_ticket
        $ticket = [
            'id_ticket' => $this->conn->lastInsertId(), // Lấy id_ticket mới nhất
            'movie_id' => $movie_id,
            'showtime_id' => $showtime_id,
            'seat_id' => $seat_id,
            'price' => $price,
            'qr' => $qr
        ];
        return $ticket;
    } else {
        return false;
    }
}

    public function checkSeatExists($seat_id)
    {
        $query = "SELECT COUNT(*) FROM seat WHERE id_seat = :seat_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':seat_id', $seat_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function updateSeatStatus($seat_id, $status)
    {
        if (!$this->checkSeatExists($seat_id)) {
            echo "Ghế $seat_id không tồn tại!";
            return false;
        }

        $query = "UPDATE seat SET status = :status WHERE id_seat = :seat_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':seat_id', $seat_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "Cập nhật ghế $seat_id thành công!";
            return true;
        } else {
            echo "Lỗi khi cập nhật trạng thái ghế: $seat_id";
            print_r($stmt->errorInfo());
            return false;
        }
    }
   // Lấy thông tin chi tiết đơn hàng
//    public function getOrderDetails($orderId)
// {
//     // Kiểm tra đầu vào
//     if (!is_numeric($orderId)) {
//         return false;
//     }

//     $query = "SELECT 
//                   o.id_order, 
//                   o.account_id, 
//                   o.order_date, 
//                   o.status, 
//                   od.ticket_id, 
//                   od.quantity, 
//                   od.total_price,
//                   t.movie_id, 
//                   t.showtime_id, 
//                   t.seat_id, 
//                   t.price AS ticket_price,
//                   m.movie_name, 
//                   s.showtime_id, 
//                   r.room_name AS cinema_room, 
//                   seat.seat_row, 
//                   seat.seat_column, 
//                   a.full_name, 
//                   a.phone, 
//                   a.email 
//               FROM order_details od
//               JOIN `order` o ON od.order_id = o.id_order
//               JOIN tickets t ON od.ticket_id = t.id_ticket
//               JOIN movie m ON t.movie_id = m.movie_id
//               JOIN showtimes s ON t.showtime_id = s.showtime_id
//               JOIN cinema_room r ON s.id_cinema_room = r.id_cinema_room
//               JOIN account a ON o.account_id = a.id_account
//               JOIN seat seat ON t.seat_id = seat.id_seat
//               WHERE o.id_order = :orderId";

//     // Database connection
//     $stmt = $this->conn->prepare($query);
//     $stmt->bindParam(':orderId', $orderId, PDO::PARAM_INT);
//     $stmt->execute();

//     $result = $stmt->fetch(PDO::FETCH_ASSOC);

//     // Log lỗi nếu không có kết quả
//     if (!$result) {
//         error_log("Order not found for ID: $orderId");
//     }

//     return $result;
// }
public function layChiTietVeById($id_ticket)
{
    $query = "
        SELECT t.id_ticket, t.price AS ticket_prices, 
               s.start_time, s.end_time,
               m.movie_name, m.duration, m.description AS movie_description, 
               GROUP_CONCAT(st.seat_name SEPARATOR ', ') AS seat_names,
               cr.room_name AS cinema_room_name  
        FROM tickets t
        JOIN showtimes s ON t.showtime_id = s.showtime_id
        JOIN movie m ON s.movie_id = m.movie_id
        JOIN seat st ON t.seat_id = st.id_seat 
        JOIN cinema_room cr ON s.id_cinema_room = cr.id_cinema_room
        WHERE t.id_ticket = :id_ticket
        GROUP BY t.id_ticket
    ";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id_ticket', $id_ticket, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
public function insertOrder($id_account, $orderDate, $status)
{
    $sql = "INSERT INTO `order` (account_id, order_date, status) VALUES (:account_id, :order_date, :status)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
        ':account_id' => $id_account, // Chỉnh sửa cho đúng tên cột
        ':order_date' => $orderDate,
        ':status' => $status
    ]);
    return $this->conn->lastInsertId(); // Lấy ID của order vừa được thêm
}

public function insertOrderDetails($orderId, $ticketId, $quantity, $totalPrice)
{
    $sql = "INSERT INTO order_details (order_id, ticket_id, quantity, total_price) 
            VALUES (:order_id, :ticket_id, :quantity, :total_price)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
        ':order_id' => $orderId,
        ':ticket_id' => $ticketId,
        ':quantity' => $quantity,
        ':total_price' => $totalPrice
    ]);
}


}
