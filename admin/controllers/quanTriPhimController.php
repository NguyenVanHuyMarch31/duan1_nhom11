<?php

class quanTriPhimController
{
    public $modelMovies;
    public $modelGenreMovies;

    public function __construct()
    {
        $this->modelMovies = new quanTriPhimModel();
        $this->modelGenreMovies = new quanTriLoaiPhimModel();
    }

    public function quanTriPhim()
    {
        // Lấy danh sách phim từ model
        $listMovies = $this->modelMovies->getMovies();
        // var_dump($listMovies);die();
        require_once './views/quanLiPhim/adminQuanLiPhim.php';
    }


    public function themPhim()
    {
        $listGenreMovies = $this->modelGenreMovies->listGenreMovies();
        // var_dump($listGenreMovies);die();
        require_once './views/quanLiPhim/themPhim.php';
    }

    
    public function postPhim()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $movie_name = $_POST['movie_name'];
            $duration = $_POST['duration'];
            $description = $_POST['description'];
            $director = $_POST['director'];
            $actors = $_POST['actors'];
            $release_date = $_POST['release_date'];
            $trailer = $_POST['trailer'];
            $genre_ids = $_POST['genre_id'] ?? [];

            $error = [];
            if (empty($movie_name)) {
                $error['movie_name'] = 'Tên phim không được để trống';
            }
            if (empty($duration)) {
                $error['duration'] = 'Thời lượng phim không được để trống';
            }
            if (empty($director)) {
                $error['director'] = 'Đạo diễn phim không được để trống';
            }
            if (empty($actors)) {
                $error['actors'] = 'Diễn viên phim không được để trống';
            }
            if (empty($release_date)) {
                $error['release_date'] = 'Ngày phát hành phim không được để trống';
            }
            if (empty($trailer)) {
                $error['trailer'] = 'Link trailer phim không được để trống';
            }

            $poster = $_FILES['poster'];
            $file_poster = null;
            if ($poster && $poster['error'] == UPLOAD_ERR_OK) {
                $file_poster = uploadFile($poster, './uploads/');
                if (!$file_poster) {
                    $error['poster'] = 'Upload ảnh poster không thành công';
                }
            } else {
                $error['poster'] = "Hình ảnh không đúng định dạng hoặc quá lớn.";
            }

            if (empty($error)) {
                $movie_id = $this->modelMovies->addMovie($movie_name, $duration, $description, $director, $actors, $release_date, $trailer, $file_poster);

                if ($movie_id) {
                    foreach ($genre_ids as $genre_id) {
                        if ($genre_id) {
                            $this->modelMovies->addMovieGenre($movie_id, $genre_id);
                        } else {
                            error_log("Thể loại không hợp lệ: $genre_id");
                        }
                    }

                    header('Location: ' . BASE_URL_ADMIN . '?act=quanTriPhim');
                    exit();
                } else {
                    echo "Thêm phim thất bại";
                }
            }

            $_SESSION['error'] = $error;
            header('Location: ' . BASE_URL_ADMIN . '?act=themPhim');
            exit();
        }
    }
    public function suaPhim() {
        $movie_id = $_GET['movie_id'];  
        if($movie_id) {
            $movie = $this->modelMovies->getMovieById($movie_id);
            $listGenreMovies = $this->modelGenreMovies->listGenreMovies(); 
            $selectedGenres = $this->modelMovies->getGenresByMovieId($movie_id);  
    
            if($movie) {
                require_once './views/quanLiPhim/suaPhim.php';
            } else {
                header('Location: '. BASE_URL_ADMIN. '?act=quanTriPhim');
                exit();
            }
        }
    }
    
    

    public function editPhim() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $movie_id = $_POST['movie_id'];
            $movie_name = $_POST['movie_name'];
            $genre_id = isset($_POST['genre_id']) ? $_POST['genre_id'] : [];
            $duration = $_POST['duration'];
            $description = $_POST['description'];
            $director = $_POST['director'];
            $actors = $_POST['actors'];
            $release_date = $_POST['release_date'];
            $trailer = $_POST['trailer'];
            $poster = $_FILES['poster'];
    
            $errors = [];
    
            if (empty($movie_name)) {
                $errors['movie_name'] = "Tên phim không được để trống.";
            }
    
            if (empty($duration)) {
                $errors['duration'] = "Thời lượng không được để trống.";
            }
            if (empty($director)) {
                $error['director'] = 'Đạo diễn phim không được để trống';
            }
            if (empty($actors)) {
                $error['actors'] = 'Diễn viên phim không được để trống';
            }
            if (empty($release_date)) {
                $error['release_date'] = 'Ngày phát hành phim không được để trống';
            }
            if (empty($trailer)) {
                $error['trailer'] = 'Link trailer phim không được để trống';
            }
    
            
    
            if ($poster['error'] == 0) {
                $poster_name = $poster['name'];
                $poster_tmp = $poster['tmp_name'];
                $poster_path = './uploads/' . $poster_name;
                move_uploaded_file($poster_tmp, $poster_path);
            } else {
                $poster_name = null; 
            }
    
            if (empty($errors)) {
                $updated = $this->modelMovies->updateMovie($movie_id, $movie_name, $genre_id, $duration, $description, $director, $actors, $release_date, $trailer, $poster_name);
    
                if (!empty($genre_id)) {
                    $this->modelMovies->updateMovieGenres($movie_id, $genre_id);
                }
    
                if ($updated) {
                    header('Location: ' . BASE_URL_ADMIN . '?act=quanTriPhim');
                    exit();
                } else {
                    $errors['update'] = "Có lỗi khi cập nhật phim.";
                }
            }
    
            $_SESSION['error'] = $errors;
            header('Location: ' . BASE_URL_ADMIN . '?act=suaPhim&movie_id=' . $movie_id);
            exit();
        }
    }
    
    public function deletePhim() {

    }

    public function chiTietPhim() {

    }
}
