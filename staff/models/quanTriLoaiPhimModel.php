<?php
class quanTriLoaiPhimModel
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
    public function listGenreMovies()
    {
        $sql = "SELECT * FROM genre";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insertGenre($genre_name, $description)
    {
        try {
            $sql = "INSERT INTO genre (genre_name, description) VALUES (:genre_name, :description)";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([
                ':genre_name' => $genre_name,
                ':description' => $description
            ]);
        } catch (PDOException $e) {
            // Ghi log lỗi nếu cần thiết
            error_log("Error inserting genre: " . $e->getMessage());
            return false;
        }
    }
    public function deleteGenre($genre_id)
    {
        try {
            $sql = "DELETE FROM genre WHERE genre_id = :genre_id";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([':genre_id' => $genre_id]);
        } catch (PDOException $e) {
            // Ghi log lỗi
            error_log("Error deleting genre: " . $e->getMessage());
            return false;
        }
    }
    public function getGenresById($genre_id){
        $sql = "SELECT * FROM genre WHERE genre_id = :genre_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':genre_id' => $genre_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function uploadGenre($genre_id,$genre_name,$description){
        $sql = "UPDATE genre SET genre_name = :genre_name, description = :description WHERE genre_id = :genre_id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':genre_name' => $genre_name,
            ':description' => $description,
            ':genre_id' => $genre_id
        ]);
        return false;
    }
}
