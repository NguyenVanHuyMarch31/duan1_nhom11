<?php
class NewsModel {
    private $conn;

    public function __construct() {
        // Giả sử connectDB() là một hàm kết nối cơ sở dữ liệu đã được định nghĩa
        $this->conn = connectDB();
    }

    public function __destruct() {
        $this->conn = null;
    }

    // Lấy tất cả bài viết tin tức
    public function getAllNews() {
        $sql = "SELECT * FROM news";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy một bài viết theo ID
    public function getNewsById($news_id) {
        $sql = "SELECT * FROM news WHERE news_id = :news_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':news_id', $news_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
