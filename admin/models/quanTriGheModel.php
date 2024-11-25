<?php
class ModelSeat
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
 // Lấy danh sách ghế theo ID phòng
 public function getSeatsByRoom($cinemaRoomId)
    {
        $sql = "SELECT 
                    cr.id_cinema_room,
                    cr.room_name,
                    s.id_seat,
                    s.seat_name,
                    s.seat_row,
                    s.seat_column,
                    s.status,
                    s.cinema_room_id,
                    s.seat_type_id,
                    st.seat_type_name,
                    st.price,
                    st.description
                FROM cinema_room cr
                LEFT JOIN seat s ON cr.id_cinema_room = s.cinema_room_id
                LEFT JOIN seat_type st ON s.seat_type_id = st.id_seat_type
                WHERE cr.id_cinema_room = :cinemaRoomId
                ORDER BY s.seat_name ASC";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':cinemaRoomId', $cinemaRoomId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Cập nhật loại ghế
    public function updateSeatType($seatId, $newSeatTypeId)
    {
        $sql = "UPDATE seat SET seat_type_id = :seat_type_id WHERE id_seat = :id_seat";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':seat_type_id', $newSeatTypeId, PDO::PARAM_INT);
        $stmt->bindParam(':id_seat', $seatId, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function updateSeatStatus($seatId, $status)
{
    $sql = "UPDATE seat SET status = :status WHERE id_seat = :id_seat";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->bindParam(':id_seat', $seatId, PDO::PARAM_INT);
    return $stmt->execute();
}


    public function __destruct()
    {
        $this->conn = null;
    }
}
