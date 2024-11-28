<?php
class modelPhimDangchieus
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
    public function getMovies()
    {
        $sql = "SELECT m.*, GROUP_CONCAT(g.genre_name SEPARATOR ', ') as genres
        FROM movie m
        LEFT JOIN movie_genre mg ON m.movie_id = mg.movie_id
        LEFT JOIN genre g ON mg.genre_id = g.genre_id
        GROUP BY m.movie_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function listGenreMovies()
    {
        $sql = "SELECT * FROM genre";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getMovieGenres($movie_id)
    {
        $sql = "SELECT g.genre_id, g.genre_name 
                FROM movie_genre mg
                JOIN genre g ON mg.genre_id = g.genre_id
                WHERE mg.movie_id = :movie_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':movie_id' => $movie_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getMovieById($movie_id)
    {
        $sql = "SELECT m.*, GROUP_CONCAT(g.genre_name SEPARATOR ', ') as genres
        FROM movie m
        LEFT JOIN movie_genre mg ON m.movie_id = mg.movie_id
        LEFT JOIN genre g ON mg.genre_id = g.genre_id
        WHERE m.movie_id = :movie_id
        GROUP BY m.movie_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':movie_id' => $movie_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}