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

        $movie = $this->modelPhim->getMovieById($movie_id);

        $showtimes = $this->modelDatVe->getShowtimesByMovieId($movie_id);

        $cinema_rooms = $this->modelDatVe->getCinemaRooms(); 

        $seats = $this->modelDatVe->getSeats();

        require_once './views/DonHang/DatHang.php';
    }

    public function postDatVe()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $movie_id = $_POST['movie_id'] ?? null;
            $showtime_id = $_POST['showtime_id'] ?? null;
            $seat_ids = $_POST['seat_id'] ?? []; 
            $order_date = date('Y-m-d H:i:s'); 
    
            if (empty($movie_id) || empty($showtime_id) || empty($seat_ids)) {
                echo "Vui lòng chọn đầy đủ thông tin!";
                return;
            }
    
            $booking_success = true;
            $failed_seats = [];
    
            foreach ($seat_ids as $seat_id) {
                $ticket = $this->modelDatVe->insertVe($movie_id, $showtime_id, $seat_id, $order_date);
    
                if ($ticket) {
                    $this->modelDatVe->updateSeatStatus($seat_id, 'Đã đặt');
                    $_SESSION['ticket_id'] = $ticket['id_ticket'];
                    $_SESSION['movie_id'] = $ticket['movie_id'];
                } else {
                    $failed_seats[] = $seat_id;
                    $booking_success = false;
                }
            }
    
            if ($booking_success) {
                header("Location: " . BASE_URL_USER . "?act=chiTietDatHang&id_ticket=" . $_SESSION['ticket_id']);
                exit();
            } else {
                $failed_seat_list = implode(", ", $failed_seats);
                echo "Lưu vé thất bại cho các ghế: $failed_seat_list.";
            }
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_account = $_SESSION['user']['id_account'];
            $orderDate = date('Y-m-d H:i:s'); 
            $status = 'Đã thanh toán';
            $ticketId = $_POST['ticket_id']; 
            $quantity = 1; 
            $totalPrice = $_POST['total_price']; 
            

            $orderId = $this->modelDatVe->insertOrder($id_account, $orderDate, $status);

            $this->modelDatVe->insertOrderDetails($orderId, $ticketId, $quantity, $totalPrice);
        }

        require_once './views/camOn.php';
    }
    }
