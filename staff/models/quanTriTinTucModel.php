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

public function deleteNews($news_id) {
    $sql = "DELETE FROM news WHERE news_id = :news_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([':news_id' => $news_id]);
    return $stmt->rowCount() > 0;
}

public function getNewsById($news_id) {
    $sql = "SELECT * FROM news WHERE news_id = :news_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([':news_id' => $news_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
public function uploadNew($news_id, $title, $author, $publish_date, $content, $thumbnail)
{
    $sql = "UPDATE news SET title = :title, author = :author, publish_date = :publish_date, content = :content ,thumbnail = :thumbnail
            WHERE news_id = :news_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
        ':news_id' => $news_id,
        ':title' => $title,
        ':author' => $author,
        ':publish_date' => $publish_date,
        ':content' => $content,
        ':thumbnail' => $thumbnail
    ]);
    return true;
}

}

?>
