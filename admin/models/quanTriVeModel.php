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
    public function getAllTicket()
    {
        $sql = "
            SELECT 
                showtimes.showtime_id,
                movie.movie_name,
                tickets.id_ticket,
                cinema_room.room_name,
                showtimes.start_time, 
                showtimes.end_time, 
                (SELECT COUNT(seat.id_seat) 
                FROM seat 
                WHERE seat.cinema_room_id = cinema_room.id_cinema_room) AS total_seats,
                (SELECT COUNT(seat.id_seat) 
                FROM seat 
                WHERE seat.cinema_room_id = cinema_room.id_cinema_room AND seat.status = '1') AS reserved_seats,
                MAX(seat.ticket_price) AS ticket_price
            FROM
                showtimes
            LEFT JOIN tickets ON showtimes.showtime_id = tickets.showtime_id
            LEFT JOIN seat ON tickets.seat_id = seat.id_seat
            INNER JOIN cinema_room ON showtimes.id_cinema_room = cinema_room.id_cinema_room
            INNER JOIN movie ON showtimes.movie_id = movie.movie_id
            GROUP BY 
                showtimes.showtime_id, 
                movie.movie_name, 
                tickets.id_ticket,
                cinema_room.room_name, 
                showtimes.start_time, 
                showtimes.end_time
            ORDER BY 
                showtimes.start_time ASC;

        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
