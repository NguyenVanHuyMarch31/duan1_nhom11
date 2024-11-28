<?php
class modelDatVes
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
    // Lấy thông tin phim
    public function getMovieDetails($movie_id)
    {
        $query = "SELECT 
                m.movie_id,
                m.movie_name,
                m.duration,
                m.description AS movie_description,
                m.director,
                m.actors,
                m.release_date,
                m.poster,
                m.trailer,
                g.genre_id,
                g.genre_name,
                g.description AS genre_description
            FROM 
                movie m
            LEFT JOIN 
                movie_genre mg ON m.movie_id = mg.movie_id
            LEFT JOIN 
                genre g ON mg.genre_id = g.genre_id
            WHERE 
                m.movie_id = ?;
            ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$movie_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Lấy tất cả suất chiếu cho một bộ phim
    public function getShowtimes($movie_id)
    {
        $query = "SELECT * FROM showtimes WHERE movie_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$movie_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy tất cả ghế cho một suất chiếu (showtime)
    public function getSeats($showtime_id)
    {
        // Join seat and showtimes tables using cinema_room_id
        $query = "SELECT s.*,s.status, st.seat_type_name, st.price, st.description 
        FROM seat s
        JOIN showtimes sh ON s.cinema_room_id = sh.id_cinema_room
        JOIN seat_type st ON s.seat_type_id = st.id_seat_type
        WHERE sh.showtime_id = ?";
        // var_dump($query);die();
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$showtime_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy tất cả các phòng chiếu (cinema rooms) cho một suất chiếu
    public function getTheaters($showtime_id)
    {
        $query = "SELECT c.* FROM cinema_room c
              JOIN showtimes s ON c.id_cinema_room = s.id_cinema_room
              WHERE s.showtime_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$showtime_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
