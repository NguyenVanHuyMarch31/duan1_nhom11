<?php
class NewsController {
    private $modelNews;

    public function __construct() {
        $this->modelNews = new NewsModel();
    }

    // Hiển thị danh sách các bài viết
    public function listNews() {
        $newsList = $this->modelNews->getAllNews();
        require_once './views/quanLiRap/adminQuanLiRap.php'; 
    }
    

    // Hiển thị chi tiết bài viết theo ID
    public function viewNews($news_id) {
        $newsDetail = $this->modelNews->getNewsById($news_id);
        require_once './views/newsDetail.php';
    }
}
?>
