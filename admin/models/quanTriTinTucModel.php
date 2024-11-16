<?php
class quanTriTinTucModel {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function __destruct() {
        $this->conn = null;
    }

    public function getAllNews() {
        $sql = "SELECT * FROM news";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertNew($title, $author, $publish_date, $content, $file_thumb)
{
    try {
        $sql = "INSERT INTO news (title, author, publish_date, content, thumbnail) 
                VALUES (:title, :author, :publish_date, :content, :thumbnail)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':title' => $title,
            ':author' => $author,
            ':publish_date' => $publish_date,
            ':content' => $content,
            ':thumbnail' => $file_thumb
        ]);
        return $stmt->rowCount() > 0;
    } catch (Exception $e) {
        error_log("Error inserting news: " . $e->getMessage());
        return false;
    }
}
public function get_list_news($news_id) {
    $sql = "DELETE FROM news WHERE news_id = :news_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([':news_id' => $news_id]);
    return $stmt->rowCount() > 0;
}
    
}

?>
