<?php
class UserController
{
    public $userModel;

    public function __construct()
    {
        $this->userModel = new userModel();
    }

    public function trangchu()
    {
        require_once './views/trangchu.php';
    }

    public function formLogin()
    {
        require_once './views/login.php';
    }

    public function formRegister()
    {
        require_once './views/register.php';
    }

    public function postRegister()
    {
        // Start session if not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Kiểm tra nếu yêu cầu là POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = [];

            // Kiểm tra các trường nhập liệu
            if (empty($_POST['username'])) {
                $errors[] = "Tên đăng nhập không được để trống.";
            }
            if (empty($_POST['email'])) {
                $errors[] = "Email không được để trống.";
            }
            if (empty($_POST['password'])) {
                $errors[] = "Mật khẩu không được để trống.";
            }

            // Nếu có lỗi, hiển thị các lỗi và ngừng xử lý
            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo $error . "<br>";
                }
                return;
            }

            // Lấy dữ liệu từ form
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Băm mật khẩu trước khi lưu vào cơ sở dữ liệu
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Đăng ký người dùng
            if ($this->userModel->postRegisterSubmit($username, $hashedPassword, $email)) {
                header('Location: ' . BASE_URL . '?act=trangchu');
                exit;
            } else {
                echo "Đăng ký không thành công.";
            }
        }
    }

    public function postLogin()
    {
        // Start session if not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Kiểm tra nếu yêu cầu là POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = [];

            // Kiểm tra các trường nhập liệu
            if (empty($_POST['username'])) {
                $errors[] = "Tên đăng nhập không được để trống.";
            }
            if (empty($_POST['password'])) {
                $errors[] = "Mật khẩu không được để trống.";
            }

            // Nếu có lỗi, hiển thị các lỗi và ngừng xử lý
            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo $error . "<br>";
                }
                return;
            }

            // Lấy dữ liệu từ form
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Lấy thông tin người dùng từ database
            $user = $this->userModel->getUserByUsername($username);

            // Kiểm tra nếu người dùng tồn tại và mật khẩu đúng
            if ($user && password_verify($password, $user['password'])) {
                // Lưu thông tin vào session
                $_SESSION['ten_dang_nhap'] = $username;
                $_SESSION['role'] = $user['role_id'];

                // Điều hướng theo vai trò
                if ($user['role_id'] == 2) {
                    header('Location: ' . BASE_URL_ADMIN . '?act=/');
                } else if ($user['role_id'] == 1) {
                    header('Location: ' . BASE_URL . '?act=trangchu');
                }
                exit;
            } else {
                echo "Tên đăng nhập hoặc mật khẩu không chính xác.";
            }
        }
    }
}
?>
