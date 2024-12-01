<?php
class modelTickets
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
    public function getTickets()
    {
        $sql = "SELECT 
        MIN(t.id_ticket) AS id_ticket, -- Chọn ID nhỏ nhất trong nhóm
        m.movie_name,
        s.start_time,
        GROUP_CONCAT(st.seat_name ORDER BY st.seat_name SEPARATOR ', ') AS seats,
        t.price
    FROM 
        tickets t
    JOIN 
        movie m ON t.movie_id = m.movie_id
    JOIN 
        showtimes s ON t.showtime_id = s.showtime_id
    JOIN 
        seat st ON t.seat_id = st.id_seat
    GROUP BY 
        m.movie_name, s.start_time, t.price
    ORDER BY 
        s.start_time, m.movie_name
            ";
            
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}
