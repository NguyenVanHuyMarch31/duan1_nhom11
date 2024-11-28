<?php
class quanTriTinTucController
{
    private $modelNews;

    public function __construct()
    {
        $this->modelNews = new quanTriTinTucModel();
    }

    public function tinTuc()
    {
        $newsList = $this->modelNews->getAllNews();
        require_once './views/TinTuc/tintuc.php';
    }

    
    public function chiTietTinTuc() {
        $news_id = $_GET['news_id'];
        if ($news_id) {
            $news = $this->modelNews->getNewsById($news_id);
            if ($news) {
                require_once './views/TinTuc/chiTietTinTuc.php';
            } else {
                header('Location: ' . BASE_URL_USER . '?act=tinTuc');
                exit();
            }
        } else {
            header('Location: ' . BASE_URL_USER . '?act=tinTuc');
            exit();
        }
    }
    
}
