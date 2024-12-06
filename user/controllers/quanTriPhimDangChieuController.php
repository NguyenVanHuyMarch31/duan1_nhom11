<?php
class quanTriPhimDangChieuController
{
    public $modelPhim;

    public function __construct()
    {
        $this->modelPhim = new modelPhimDangchieus();
    }

    // Trang chủ
    public function trangchu()
    {
        require_once './views/trangchu.php';
    }

    public function phimdangchieu()
    {
        $listMovies = $this->modelPhim->getMovies();
        $selectedGenre = isset($_GET['genre']) ? $_GET['genre'] : ''; 
    $listMovies = $this->modelPhim->getMovie($selectedGenre); 

        
        $listGenres = $this->modelPhim->listGenreMovies();

        require_once './views/Phim/phimdangchieu.php';
    }
    // Xem chi tiết phim
    public function chiTietPhim()
    {
        $movie_id = $_GET['movie_id'];
        if ($movie_id) {
            $movie = $this->modelPhim->getMovieById($movie_id);

            if ($movie) {
                $movie_genres = $this->modelPhim->getMovieGenres($movie_id);

                require_once './views/Phim/chitietPhim.php';
            } else {
                $_SESSION['error'] = "Phim không tồn tại.";
                header('Location: ' . BASE_URL_USER . '?act=phimdangchieu');
                exit();
            }
        } else {
            $_SESSION['error'] = "Không có ID phim được cung cấp.";
            header('Location: ' . BASE_URL_USER . '?act=phimdangchieu');
            exit();
        }
    }
}
