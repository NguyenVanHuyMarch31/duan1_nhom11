<?php
class modelRooms
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

    public function getAllRooms()
    {
        $sql = "
    SELECT 
        cr.*,
        s.cinema_room_id
        FROM cinema_room cr
        LEFT JOIN seat s ON cr.id_cinema_room = s.cinema_room_id
        GROUP BY cr.id_cinema_room;
    ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addRoom($room_name, $seat_count,$screen, $status)
    {
        $sql = "INSERT INTO cinema_room (room_name, seat_count,screen, status) VALUES (:room_name, :seat_count,:screen, :status)";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':room_name' => $room_name,
                ':seat_count' => $seat_count,
                ':status' => $status
            ]);
            return true;
        } catch (PDOException $e) {
            error_log("Lỗi thêm phòng: " . $e->getMessage());
            throw new Exception("Không thể thêm phòng. Hãy thử lại sau.");
        }
    }

    public function getRoomById($id_cinema_room)
    {
        $sql = "SELECT * FROM cinema_room WHERE id_cinema_room = :id_cinema_room";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id_cinema_room' => $id_cinema_room]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function editRoom($id_cinema_room, $room_name,$screen, $seat_count)
    {
        $sql = "UPDATE cinema_room SET room_name = :room_name, screen = :screen, seat_count = :seat_count WHERE id_cinema_room = :id_cinema_room";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id_cinema_room' => $id_cinema_room,
                ':room_name' => $room_name,
                ':screen' => $screen,
                ':seat_count' => $seat_count
            ]);
            return true;
        } catch (PDOException $e) {
            error_log("Lỗi sửa phòng: " . $e->getMessage());
            throw new Exception("Không thể sửa phòng. Hãy thử lại sau.");
        }
    }

    public function deleteRoom($id_cinema_room)
    {
        $sql = "DELETE FROM cinema_room WHERE id_cinema_room = :id_cinema_room";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id_cinema_room' => $id_cinema_room]);
            return true;
        } catch (PDOException $e) {
            error_log("Lỗi xóa phòng: " . $e->getMessage());
            throw new Exception("Không thể xóa phòng. Hãy thử lại sau.");
        }
    }
    public function updateRoomStatus($id_cinema_room, $status)
    {
        $sql = "UPDATE cinema_room SET status = :status WHERE id_cinema_room = :id_cinema_room";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id_cinema_room' => $id_cinema_room,
                ':status' => $status
            ]);
            return true;
        } catch (PDOException $e) {
            error_log("Lỗi cập nhật trạng thái phòng: " . $e->getMessage());
            throw new Exception("Không thể cập nhật trạng thái phòng. Hãy thử lại sau.");
        }
    }
}
?>

<?php
class modelTypes
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
    public function getAllTypes()
    {
        $sql = "SELECT * FROM seat_type";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
