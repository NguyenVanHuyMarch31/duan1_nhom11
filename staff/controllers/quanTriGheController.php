<?php
class QuanTriGheController
{
    private $modelSeats;
    private $modelCinemaRooms;

    public function __construct()
    {
        $this->modelSeats = new ModelSeat();
        $this->modelCinemaRooms = new modelRooms(); 
    }

    public function manageSeats()
    {
        $cinemaRoomId = $_GET['cinema_room_id'] ?? null; 
        if ($cinemaRoomId) {
            $seats = $this->modelSeats->getSeatsByRoom($cinemaRoomId);
        
        require_once './views/quanLiPhong/Ghe/adminQuanLiGhe.php';
        }
    }




    public function changeSeatType()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_seat'])) {
            $seatId = (int)$_POST['change_seat'];
            $newSeatTypeId = (int)$_POST['new_seat_type'];

            $updated = $this->modelSeats->updateSeatType($seatId, $newSeatTypeId);

            if ($updated) {
                $_SESSION['success'] = "Loại ghế đã được thay đổi thành công!";
            } else {
                $_SESSION['error'] = "Có lỗi xảy ra khi thay đổi loại ghế.";
            }

            header("Location: " . BASE_URL_ADMIN . "?act=quanTriPhongChieu_LoaiGhe");
            exit;
        }
    }
    public function changeSeatStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_status'])) {
            $seatId = $_POST['change_status'];
            $newStatus = $_POST['seat_status'];

            $this->modelSeats->updateSeatStatus($seatId, $newStatus);

            header("Location: " . BASE_URL_ADMIN . '?act=quanTriPhongChieu_LoaiGhe');
            exit();
        }
    }
}
