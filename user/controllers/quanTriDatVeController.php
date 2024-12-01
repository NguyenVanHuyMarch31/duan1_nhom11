<?php
class quanTriDatVeController
{
    public $modelDatVe;
    public $modelPhim;

    public function __construct()
    {
        $this->modelDatVe = new modelDatVes();
        $this->modelPhim = new modelPhimDangchieus();
    }

    public function datVe()
    {
        $movie_id = isset($_GET['movie_id']) ? $_GET['movie_id'] : 0;

        // Lấy thông tin phim
        $movie = $this->modelPhim->getMovieById($movie_id);

        // Lấy danh sách suất chiếu
        $showtimes = $this->modelDatVe->getShowtimesByMovieId($movie_id);

        // Lấy danh sách phòng chiếu nếu có suất chiếu được chọn
        $selected_showtime_id = isset($_POST['showtime_id']) ? $_POST['showtime_id'] : null;
        $cinema_rooms = [];
        if ($selected_showtime_id) {
            $cinema_rooms = $this->modelDatVe->getCinemaRoomByShowtimeId($selected_showtime_id);
        }

        // Lấy danh sách ghế nếu có phòng chiếu được chọn
        $selected_cinema_room_id = isset($_POST['cinema_room_id']) ? $_POST['cinema_room_id'] : null;
        $seats = [];
        if ($selected_cinema_room_id) {
            $seats = $this->modelDatVe->getSeatsByCinemaRoomId($selected_cinema_room_id);
        }

        // Gửi dữ liệu sang view
        require_once './views/DonHang/DatHang.php';
    }
}
