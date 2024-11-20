<?php
class quanTriPhimModel
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

    // Hàm lấy tất cả phim
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

    public function addMovie($movie_name, $duration, $description, $director, $actors, $release_date, $trailer, $file_poster)
    {
        $sql = "INSERT INTO movie (movie_name, duration, description, director, actors, release_date, trailer, poster) 
            VALUES (:movie_name, :duration, :description, :director, :actors, :release_date, :trailer, :poster)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':movie_name' => $movie_name,
            ':duration' => $duration,
            ':description' => $description,
            ':director' => $director,
            ':actors' => $actors,
            ':release_date' => $release_date,
            ':trailer' => $trailer,
            ':poster' => $file_poster
        ]);

        if ($stmt->rowCount() > 0) {
            return $this->conn->lastInsertId();
        }
        return false;
    }

    public function addMovieGenre($movie_id, $genre_id)
    {
        $sql = "INSERT INTO movie_genre (movie_id, genre_id) VALUES (:movie_id, :genre_id)";
        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            ':movie_id' => $movie_id,
            ':genre_id' => $genre_id
        ]);
        return $stmt->rowCount() > 0;
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
    public function getGenresByMovieId($movie_id)
    {
        // Lấy các thể loại của phim
        $sql = "SELECT genre_id FROM movie_genre WHERE movie_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$movie_id]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
    public function updateMovie($movie_id, $movie_name, $genre_id, $duration, $description, $director, $actors, $release_date, $trailer, $poster) {
        $sql = "UPDATE movie 
                SET movie_name = :movie_name, 
                    genre_id = :genre_id, 
                    duration = :duration, 
                    description = :description, 
                    director = :director, 
                    actors = :actors, 
                    release_date = :release_date, 
                    trailer = :trailer, 
                    poster = :poster 
                WHERE movie_id = :movie_id";
    // var_dump($sql);die();
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':movie_name' => $movie_name,
            ':genre_id' => $genre_id, 
            ':duration' => $duration,
            ':description' => $description,
            ':director' => $director,
            ':actors' => $actors,
            ':release_date' => $release_date,
            ':trailer' => $trailer,
            ':poster' => $poster,
            ':movie_id' => $movie_id
        ]);
        return $stmt->rowCount() > 0;
    }
    
    public function updateMovieGenres($movie_id, $genre_ids) {
        // Xóa tất cả các thể loại phim cũ
        $sql = "DELETE FROM movie_genre WHERE movie_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$movie_id]);
    
        // Thêm các thể loại mới
        foreach ($genre_ids as $genre_id) {
            $sql = "INSERT INTO movie_genre (movie_id, genre_id) VALUES (?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$movie_id, $genre_id]);
        }
    }
    public function deleteMovie($movie_id){
        $sql = "DELETE FROM movie WHERE movie_id = :movie_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':movie_id' => $movie_id
        ]);
        return $stmt->rowCount() > 0;
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

    
}
