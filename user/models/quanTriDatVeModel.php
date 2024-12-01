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

    // Lấy thông tin phim theo ID
    public function getMovieById($movie_id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM movie WHERE id_movie = ?");
        $stmt->execute([$movie_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Lấy danh sách suất chiếu theo movie_id
    public function getShowtimesByMovieId($movie_id)
    {
        $sql = "SELECT s.*, cr.room_name
                FROM showtimes s
                JOIN cinema_room cr ON s.id_cinema_room = cr.id_cinema_room
                WHERE s.movie_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$movie_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy danh sách phòng chiếu theo showtime_id
    public function getCinemaRoomByShowtimeId($showtime_id)
    {
        $sql = "SELECT cr.*
                FROM cinema_room cr
                JOIN showtimes s ON cr.id_cinema_room = s.id_cinema_room
                WHERE s.showtime_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$showtime_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy danh sách ghế trong phòng chiếu
    public function getSeatsByCinemaRoomId($cinema_room_id)
    {
        $sql = "SELECT * 
                FROM seat
                WHERE cinema_room_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$cinema_room_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
