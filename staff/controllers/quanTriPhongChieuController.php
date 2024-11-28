<?php
class quanTriPhongChieu_LoaiChieu_Controller
{
    public $modelRoom;
    public $modelType;

    public function __construct()
    {
        $this->modelType = new modelTypes();
        $this->modelRoom = new modelRooms();
    }

    public function quanTriPhongChieu_LoaiGhe()
    {
        $types = $this->modelType->getAllTypes();
        $rooms = $this->modelRoom->getAllRooms();
        require_once './views/quanLiPhong/adminQuanLiPhong.php';
    }

    public function themPhong()
    {
        require_once './views/quanLiPhong/Phong/themPhong.php';
    }

    public function postPhong()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $room_name = $_POST['room_name'];
            $seat_count = $_POST['seat_count'];
            $screen = $_POST['screen'];
            $status = $_POST['status'];
            $errors = $this->validateRoomInput($room_name, $seat_count, $status);

            if (empty($errors)) {
                $this->modelRoom->addRoom($room_name, $seat_count,$screen, $status);
                $_SESSION['success'] = "Thêm phòng thành công!";
                header('Location: ' . BASE_URL_ADMIN . '?act=quanTriPhongChieu_LoaiGhe');
                exit;
            }
            require_once './views/quanLiPhong/Phong/themPhong.php';
        }
    }

    public function suaPhong()
    {
        $id_cinema_room = $_GET['id_cinema_room'] ?? null;
        if ($id_cinema_room) {
            $room = $this->modelRoom->getRoomById($id_cinema_room);
            require_once './views/quanLiPhong/Phong/suaPhong.php';
        } else {
            $_SESSION['error'] = "Không tìm thấy phòng cần sửa.";
            header('Location: ' . BASE_URL_ADMIN . '?act=quanTriPhongChieu_LoaiGhe');
            exit;
        }
    }

    public function editPhong()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_cinema_room = $_POST['id_cinema_room'];
            $room_name = $_POST['room_name'];
            $screen = $_POST['screen'];
            $seat_count = $_POST['seat_count'];
            $errors = $this->validateRoomInput($room_name, $seat_count);

            if (empty($errors)) {
                $this->modelRoom->editRoom($id_cinema_room, $room_name,$screen, $seat_count);
                $_SESSION['success'] = "Sửa phòng thành công!";
                header('Location: ' . BASE_URL_ADMIN . '?act=quanTriPhongChieu_LoaiGhe');
                exit;
            }
            require_once './views/quanLiPhong/Phong/suaPhong.php';
        }
    }

    public function xoaPhong()
    {
        $id_cinema_room = $_GET['id_cinema_room'] ?? null;
        if ($id_cinema_room) {
            $this->modelRoom->deleteRoom($id_cinema_room);
            $_SESSION['success'] = "Xóa phòng thành công!";
        } else {
            $_SESSION['error'] = "Không tìm thấy phòng cần xóa.";
        }
        header('Location: ' . BASE_URL_ADMIN . '?act=quanTriPhongChieu_LoaiGhe');
    }

    private function validateRoomInput($room_name, $seat_count)
    {
        $errors = [];
        if (empty($room_name)) {
            $errors['room_name'] = 'Tên phòng không được để trống.';
        }
        if (empty($seat_count) || !is_numeric($seat_count)) {
            $errors['seat_count'] = 'Số ghế phải là số và không được để trống.';
        }
        return $errors;
    }

    public function trangThaiPhong()
    {
        $id_cinema_room = $_GET['id_cinema_room'] ?? null;

        if ($id_cinema_room) {
            $room = $this->modelRoom->getRoomById($id_cinema_room);

            if ($room) {
                $newStatus = $room['status'] === 'Có sẵn' ? 'Bảo trì' : 'Có sẵn';
                $this->modelRoom->updateRoomStatus($id_cinema_room, $newStatus);

                $_SESSION['success'] = "Đã thay đổi trạng thái phòng thành công!";
            } else {
                $_SESSION['error'] = "Không tìm thấy phòng.";
            }
        } else {
            $_SESSION['error'] = "ID phòng không hợp lệ.";
        }

        header('Location: ' . BASE_URL_ADMIN . '?act=quanTriPhongChieu_LoaiGhe');
        exit;
    }


   }
