<?php
class quanTriLoaiPhimController
{   
    // public $modelGenre_Movies;
    public $modelGenreMovies;
    public function __construct()
    {
        // $this->modelGenre_Movies = new modelGenre_Movies();
        $this->modelGenreMovies = new modelGenreMovies();
    }

    public function quanTriLoaiPhim()
    {
        $listGenreMovies = $this->modelGenreMovies->listGenreMovies();
        require_once './views/quanLiTheloai/adminQuanLiTheLoai.php';
    }
    public function themTheLoai(){
        require_once './views/quanLiTheloai/themTheLoai.php';
    }
    public function postTheLoai() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $genre_name = $_POST['genre_name'] ?? '';
            $description = $_POST['description'] ?? '';
            $error = [];
    
            if (empty($genre_name)) {
                $error['genre_name'] = 'Vui lòng nhập tên thể loại';
            }
    
            if (empty($error)) {
                if ($this->modelGenreMovies->insertGenre($genre_name, $description)) {
                    header("Location: " . BASE_URL_ADMIN . '?act=quanTriLoaiPhim');
                    exit();
                } else {
                    $error['database'] = 'Thêm thể loại thất bại. Vui lòng thử lại.';
                }
            }
    
            $_SESSION['error'] = $error;
            header("Location: " . BASE_URL_ADMIN . '?act=themTheLoai');
            exit();
        }
    }
    public function deleteTheLoai(){
        $genre_id = $_GET['genre_id'];
        $genre = $this->modelGenreMovies->deleteGenre($genre_id);
        header("Location: " . BASE_URL_ADMIN . '?act=quanTriLoaiPhim');
        exit();
    }
    public function suaTheLoai(){
        $genre_id = $_GET['genre_id'];
        if($genre_id){
            $genres = $this->modelGenreMovies->getGenresById($genre_id);
            if($genres){
                require_once './views/quanLiTheloai/suaTheLoai.php';
            }
            else{
                header("Location: ". BASE_URL_ADMIN. '?act=quanTriLoaiPhim');
                exit();
            }
        }
    }
    public function editTheLoai(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $genre_id = $_POST['genre_id']?? null;
            if(!$genre_id){
                header("Location:" . BASE_URL_ADMIN . '?act=quanTriLoaiPhim');
                exit();
            }
            $genre_name = $_POST['genre_name']?? '';
            $description = $_POST['description']?? '';
            $error = [];
            if(empty($error)){
                $updates = $this->modelGenreMovies->uploadGenre($genre_id,$genre_name,$description);
                if($updates){
                    header("Location: ". BASE_URL_ADMIN. '?act=quanTriLoaiPhim');
                    exit();

                }
                else{
                    echo "Có lỗi khi cập nhật thể loại phim";
                }

            }else{
                $_SESSION['error'] = $error;
                header("Location: ". BASE_URL_ADMIN. '?act=suaTheLoai');
                exit();
            }
        }
    }
    
    
    
}
