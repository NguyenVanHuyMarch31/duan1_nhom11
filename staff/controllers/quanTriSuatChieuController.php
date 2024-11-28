<?php
class quanTriSuatChieuController
{
    public $modelShowTimes;
    public $modelMovies;
    public $modelCinemaRooms;
    public function __construct()
    {
        $this->modelShowTimes = new modelShowTime();
        $this->modelMovies = new quanTriPhimModel();
        $this->modelCinemaRooms = new modelRooms();
    }

    public function quanTriSuatChieu()
    {
        $listShowtimes = $this->modelShowTimes->getAllShowtimes();
        require_once './views/quanLiSuatChieu/adminQuanLiSuatChieu.php';
    }
    public function themSuatChieu()
    {
        $movies = $this->modelMovies->getMovies();
        $cinema_rooms = $this->modelCinemaRooms->getAllRooms();
        require_once './views/quanLiSuatChieu/themSuatChieu.php';
    }
    public function postSuatChieu()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $movie_id = $_POST['movie_id'];
            $id_cinema_room = $_POST['id_cinema_room'];
            $start_time = $_POST['start_time'];
            $status = $_POST['status'];

            // Lấy thời lượng phim để tính thời gian kết thúc
            $movie = $this->modelMovies->getMovieById($movie_id);
            $duration = $movie['duration']; // Thời lượng phim (phút)
            $end_time = date('Y-m-d H:i:s', strtotime($start_time) + $duration * 60);

            // Gọi model để lưu suất chiếu
            $result = $this->modelShowTimes->addShowtime($movie_id, $id_cinema_room, $start_time, $end_time, $status);

            if ($result) {
                header('Location: ' . BASE_URL_ADMIN . '?act=quanTriSuatChieu');
            } else {
                echo "Thêm suất chiếu thất bại!";
            }
        }
    }
    public function suaSuatChieu()
    {
        $showtime_id = $_GET['showtime_id'];
        $showtime = $this->modelShowTimes->getShowtimeById($showtime_id);
        $movies = $this->modelMovies->getMovies();
        $cinema_rooms = $this->modelCinemaRooms->getAllRooms();
        require_once './views/quanLiSuatChieu/suaSuatChieu.php';
    }
    public function editSuatChieu()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $showtime_id = $_POST['showtime_id'];
            $movie_id = $_POST['movie_id'];
            $id_cinema_room = $_POST['id_cinema_room'];
            $start_time = $_POST['start_time'];
            $status = $_POST['status'];

            $movie = $this->modelMovies->getMovieById($movie_id);
            $duration = $movie['duration'];
            $end_time = date('Y-m-d H:i:s', strtotime($start_time) + $duration * 60);

            $result = $this->modelShowTimes->updateShowtime($showtime_id, $movie_id, $id_cinema_room, $start_time, $end_time, $status);

            if ($result['success']) {
                header('Location: ' . BASE_URL_ADMIN . '?act=quanTriSuatChieu');
            } else {
                echo $result['message'];
            }
        }
    }
    public function deleteSuatChieu()
    {
        $showtime_id = $_GET['showtime_id'];
        if ($showtime_id) {
            $this->modelShowTimes->deleteSuatChieu($showtime_id);
            $_SESSION['success'] = "Xóa suất chiếu thành công!";
        } else {
            $_SESSION['error'] = "Không tìm thấy suất chiếu cần xóa.";
        }
        header('Location: ' . BASE_URL_ADMIN . '?act=quanTriSuatChieu');
    }
}
