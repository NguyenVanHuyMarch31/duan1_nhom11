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
        require_once './views/quanLiTinTuc/adminQuanLiTinTuc.php';
    }

    public function themTinTuc()
    {
        require_once './views/quanLiTinTuc/themTinTuc.php';
    }
    public function suaTinTuc()
    {
        require_once './views/quanLiTinTuc/suaTinTuc.php';
    }

    public function postTinTuc()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $author = $_POST['author'] ?? '';
            $publish_date = $_POST['publish_date'] ?? '';
            $content = $_POST['content'] ?? '';
            $error = [];

            if (empty($title)) {
                $error['title'] = 'Tên tin tức không được để trống.';
            }
            if (empty($author)) {
                $error['author'] = 'Tác giả không được để trống.';
            }
            if (empty($publish_date)) {
                $error['publish_date'] = 'Ngày nhập không được để trống.';
            }

            $thumbnail = $_FILES['thumbnail'] ?? null;
            $file_thumb = null;

            if ($thumbnail && $thumbnail['error'] == UPLOAD_ERR_OK) {
                $file_thumb = uploadFile($thumbnail, './uploads/');

                if (!$file_thumb) {
                    $error['thumbnail'] = 'Có lỗi khi tải lên ảnh sản phẩm. Vui lòng kiểm tra lại.';
                }
            } else {
                $error['thumbnail'] = 'Hình ảnh không đúng định dạng hoặc quá lớn.';
            }

            if (empty($error)) {
                if ($this->modelNews->insertNew($title, $author, $publish_date, $content, $file_thumb)) {
                    header("Location: " . BASE_URL_ADMIN . '?act=quanTriTinTuc');
                    exit();
                } else {
                    $error['database'] = 'Thêm tin tức thất bại. Vui lòng thử lại.';
                }
            }

            $_SESSION['error'] = $error;
            header("Location: " . BASE_URL_ADMIN . '?act=themTinTuc');
            exit();
        }
    }

    public function uploadFile($file, $uploadDir)
    {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($file['type'], $allowedTypes)) {
            return null; 
        }

        if ($file['size'] > 2 * 1024 * 1024) {
            return null; 
        }

        $fileName = basename($file['name']);
        $filePath = $uploadDir . $fileName;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); 
        }

        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            return $fileName; 
        }

        return null; 
    }
    public function deleteTinTuc(){
        $news_id = $_GET['news_id'];
        $news = $this->modelNews->get_list_news($news_id);
        
        header("Location: ". BASE_URL_ADMIN. '?act=quanTriTinTuc');
        exit();
    }
}
?>
