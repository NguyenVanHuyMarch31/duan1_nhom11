<?php
class quanTriDatVeController
{
    public $modelDatVe;
    public $modelPhim;
    public $model;


    public function __construct()
    {
        $this->modelDatVe = new modelDatVes();
        $this->modelPhim = new modelPhimDangchieus();
        $this->model = new userModel();
    }

    public function datVe()
    {
        $movie_id = isset($_GET['movie_id']) ? $_GET['movie_id'] : 0;

        // Lấy thông tin phim
        $movie = $this->modelPhim->getMovieById($movie_id);

        // Lấy danh sách suất chiếu
        $showtimes = $this->modelDatVe->getShowtimesByMovieId($movie_id);

        // Lấy danh sách phòng chiếu
        $cinema_rooms = $this->modelDatVe->getCinemaRooms(); // Bạn có thể lấy danh sách phòng chiếu ở đây nếu cần

        $seats = $this->modelDatVe->getSeats();

        // Gửi tất cả dữ liệu sang view
        require_once './views/DonHang/DatHang.php';
    }

    public function postDatVe()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $movie_id = $_POST['movie_id'] ?? null;
            $showtime_id = $_POST['showtime_id'] ?? null;
            $seat_ids = $_POST['seat_id'] ?? []; // Mảng ghế đã chọn

            // Kiểm tra nếu thiếu thông tin
            if (empty($movie_id) || empty($showtime_id) || empty($seat_ids)) {
                echo "Vui lòng chọn đầy đủ thông tin!";
                return;
            }

            // Xử lý từng ghế một
            foreach ($seat_ids as $seat_id) {
                // Lưu thông tin vé và nhận mảng trả về
                $ticket = $this->modelDatVe->insertVe($movie_id, $showtime_id, $seat_id);

                if ($ticket) {
                    // Cập nhật trạng thái ghế
                    if (!$this->modelDatVe->updateSeatStatus($seat_id, 'Đã đặt')) {
                        echo "Cập nhật trạng thái ghế $seat_id thất bại!<br>";
                    }

                    // Lưu thông tin vé vào session
                    $_SESSION['ticket_id'] = $ticket['id_ticket']; // Lưu id_ticket
                    $_SESSION['movie_id'] = $ticket['movie_id']; // Lưu movie_id

                    header("Location: " . BASE_URL_USER . "?act=chiTietDatHang&id_ticket=" . $ticket['id_ticket']);
                    exit();
                } else {
                    echo "Lưu vé thất bại cho ghế $seat_id!";
                }
            }

            echo "Đặt vé thất bại!";
        }
    }



    public function chiTietDatHang()
    {
        $id_account = $_SESSION['user']['id_account'];
       $account = $this->model->layTaiKhoanById($id_account); 
       $id_ticket = $_SESSION['ticket_id'];       
       $ticketDetails = $this->modelDatVe->layChiTietVeById($id_ticket);  
       require_once './views/DonHang/chiTietDatHang.php';
    }
    



    public function camOn()
    {
        require_once './views/camOn.php';
    }
}
