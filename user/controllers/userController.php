<?php
class UserController
{
    public $model;

    public function __construct()
    {
        $this->model = new userModel();
    }

    // Trang chủ
    public function trangchu()
    {
        require_once './views/trangchu.php';
    }

    // Form đăng nhập
    public function formLogin()
    {
        require_once './views/login.php';
    }

    // Form đăng ký
    public function formRegister()
    {
        require_once './views/register.php';
    }

    // Xử lý đăng ký
    public function postRegister() {}
    // Logout function
    public function logout()
    {
        session_start();

        session_unset();

        session_destroy();

        header('Location: ' . BASE_URL . '/?act=formLogin');
        exit();
    }
    public function quanTriTaiKhoan()
    {
        $accountList = $this->model->layDanhSachTaiKhoan();
        require_once './views/TaiKhoan/ThongtinTaiKhoan.php';
    }

    public function thongTinTaiKhoan()
    {
        // session_start();

        // Kiểm tra người dùng đã đăng nhập chưa
        if (isset($_SESSION['user']['id_account'])) {
            $id_account = $_SESSION['user']['id_account'];
           


            // Lấy thông tin tài khoản từ model
            $account = $this->model->layTaiKhoanById($id_account);
            // var_dump($account);die();
            // Truyền dữ liệu sang View
            require_once './views/TaiKhoan/ThongtinTaiKhoan.php';
        } else {
            // Nếu chưa đăng nhập, chuyển hướng về form login
            header('Location: ' . BASE_URL . '?act=formLogin');
            exit();
        }
    }
    public function thongbao()
    {
        require_once './views/TaiKhoan/ThongBao.php';
    }
    public function suaTaiKhoan()
    {
        $id_account = $_GET['id'];
        $account = $this->model->getAccountById($id_account);

        require_once './views/TaiKhoan/suaTaiKhoan.php';
    }
    public function postTaiKhoan()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id_account = $_POST['id_account'];
            $existingAccount = $this->model->getAccountById($id_account);
            $file_old = $existingNews['thumbnail'] ?? null;
            $username = $_POST['username'];
            $email = $_POST['email'];
            $full_name = $_POST['full_name'];
            $birth_date = $_POST['birth_date'];  
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];

            $new_file = $file_old;
            $thumbnail = $_FILES['thumbnail'] ?? null;
            if (isset($thumbnail) && $thumbnail['error'] == UPLOAD_ERR_OK) {
                $new_file = uploadFile($thumbnail, './uploads/');
                if ($new_file) {
                    if ($file_old) {
                        deleteFile($file_old);
                    }
                } else {
                    $error['thumbnail'] = 'Có lỗi khi tải lên ảnh mới.';
                }
            }

            if (empty($error)) {
                $updateStatus = $this->model->updateAccount(
                    $id_account,
                    $username,
                    $email,
                    $full_name,
                    $birth_date,
                    $gender,
                    $new_file,
                    $address,
                    $phone
                );

                if ($updateStatus) {
                    header('Location: ' . BASE_URL_USER . '?act=thongTinTaiKhoan&id=' . $_SESSION['user']['id_account']);
                    exit;
                } else {
                    $error['update'] = 'Có lỗi xảy ra khi cập nhật tài khoản.';
                }
            }
        }
    }

    public function uploadFile($file, $uploadDir)
    {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($file['type'], $allowedTypes)) {
            return null;
        }

        if ($file['size'] > 2 * 1024 * 1024) {
            return null;
        }

        $fileName = uniqid() . '-' . basename($file['name']);
        $filePath = $uploadDir . $fileName;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            return $fileName;
        }

        return null;
    }
    public function doiMatKhau(){
        require_once './views/TaiKhoan/doiMatKhau.php';
    }
    public function lichSuDatVe(){
        require_once './views/TaiKhoan/lichSuDatVe.php';
    }
}
