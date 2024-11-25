<?php
class modelShowTime
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy tất cả các suất chiếu cùng với thông tin phim và phòng chiếu
    public function getAllShowtimes()
    {
        $sql = "
            SELECT 
                showtimes.showtime_id, 
                movie.movie_name, 
                cinema_room.room_name, 
                showtimes.start_time, 
                showtimes.end_time, 
                showtimes.status 
            FROM 
                showtimes
            INNER JOIN 
                movie ON showtimes.movie_id = movie.movie_id
            INNER JOIN 
                cinema_room ON showtimes.id_cinema_room = cinema_room.id_cinema_room
            ORDER BY 
                showtimes.start_time DESC
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addShowtime($movie_id, $id_cinema_room, $start_time, $end_time, $status)
    {
        // Kiểm tra suất chiếu trùng
        $checkSql = "
        SELECT COUNT(*) 
        FROM showtimes 
        WHERE movie_id = :movie_id 
          AND id_cinema_room = :id_cinema_room 
          AND start_time = :start_time
    ";
        $stmt = $this->conn->prepare($checkSql);
        $stmt->bindParam(':movie_id', $movie_id);
        $stmt->bindParam(':id_cinema_room', $id_cinema_room);
        $stmt->bindParam(':start_time', $start_time);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        // Nếu tồn tại suất chiếu trùng, trả về lỗi
        if ($count > 0) {
            return [
                'success' => false,
                'message' => 'Suất chiếu đã tồn tại với cùng thời gian, phòng chiếu và phim.'
            ];
        }

        // Thêm suất chiếu nếu không bị trùng
        $insertSql = "
        INSERT INTO showtimes (movie_id, id_cinema_room, start_time, end_time, status)
        VALUES (:movie_id, :id_cinema_room, :start_time, :end_time, :status)
    ";
        $stmt = $this->conn->prepare($insertSql);
        $stmt->bindParam(':movie_id', $movie_id);
        $stmt->bindParam(':id_cinema_room', $id_cinema_room);
        $stmt->bindParam(':start_time', $start_time);
        $stmt->bindParam(':end_time', $end_time);
        $stmt->bindParam(':status', $status);

        $success = $stmt->execute();

        return [
            'success' => $success,
            'message' => $success ? 'Thêm suất chiếu thành công.' : 'Lỗi khi thêm suất chiếu.'
        ];
    }

    public function __destruct()
    {
        $this->conn = null;
    }
    public function getShowtimeById($showtime_id)
{
    $sql = "SELECT * FROM showtimes WHERE showtime_id = :showtime_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':showtime_id', $showtime_id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
public function updateShowtime($showtime_id, $movie_id, $id_cinema_room, $start_time, $end_time, $status)
{
    $sql = "
        UPDATE showtimes 
        SET 
            movie_id = :movie_id, 
            id_cinema_room = :id_cinema_room, 
            start_time = :start_time, 
            end_time = :end_time, 
            status = :status
        WHERE 
            showtime_id = :showtime_id
    ";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':showtime_id', $showtime_id);
    $stmt->bindParam(':movie_id', $movie_id);
    $stmt->bindParam(':id_cinema_room', $id_cinema_room);
    $stmt->bindParam(':start_time', $start_time);
    $stmt->bindParam(':end_time', $end_time);
    $stmt->bindParam(':status', $status);

    $success = $stmt->execute();

    return [
        'success' => $success,
        'message' => $success ? 'Cập nhật suất chiếu thành công.' : 'Lỗi khi cập nhật suất chiếu.'
    ];
}
public function deleteSuatChieu($showtime_id){
    $sql = "DELETE FROM showtimes WHERE showtime_id = :showtime_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':showtime_id', $showtime_id);
    $success = $stmt->execute();
    
}
}
