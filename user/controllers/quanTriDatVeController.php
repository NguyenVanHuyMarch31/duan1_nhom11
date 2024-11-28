<?php
class quanTriDatVeController
{
    public $modelDatVe;

    public function __construct()
    {
        $this->modelDatVe = new modelDatVes();
    }

    // Trang chủ
    public function trangchu()
    {
        require_once './views/trangchu.php';
    }

    public function datVe()
    {
        // Lấy thông tin movie_id từ URL (nếu có)
        $movie_id = isset($_GET['movie_id']) ? $_GET['movie_id'] : 1;

        // Lấy thông tin phim từ model
        $movie_details = $this->modelDatVe->getMovieDetails($movie_id);

        // Lấy tất cả suất chiếu của phim
        $showtimes = $this->modelDatVe->getShowtimes($movie_id);

        // Mảng để lưu thông tin phòng chiếu và ghế cho mỗi suất chiếu
        $showtimeDetails = [];

        foreach ($showtimes as $showtime) {
            // Lấy thông tin phòng chiếu cho suất chiếu
            $theaters = $this->modelDatVe->getTheaters($showtime['showtime_id']);

            // Lấy thông tin ghế cho suất chiếu
            $seats = $this->modelDatVe->getSeats($showtime['showtime_id']);

            // Lưu thông tin phòng chiếu và ghế vào mảng
            $showtimeDetails[] = [
                'showtime' => $showtime,
                'theaters' => $theaters,
                'seats' => $seats
            ];
        }

        // Truyền dữ liệu tới view
        require_once './views/DonHang/DatHang.php';
    }
}


