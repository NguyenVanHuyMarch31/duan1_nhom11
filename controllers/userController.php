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
    public function postRegister()
    {
        // var_dump($_SERVER['REQUEST_METHOD']); die(); // Dùng để kiểm tra phương thức HTTP (có thể xóa sau khi kiểm tra)

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Kiểm tra các trường hợp lỗi
            if ($this->model->checkUsernameExists($username)) {
                echo "Tên đăng nhập đã tồn tại.";
                return;
            }

            if ($this->model->checkEmailExists($email)) {
                echo "Email đã được sử dụng.";
                return;
            }

            // Thêm vào cơ sở dữ liệu
            if ($this->model->register($username, $email, $password)) {
                header('Location:' . BASE_URL . '?act=formLogin');
                exit;
            } else {
                echo "Đăng ký thất bại.";
            }
        } else {
            echo "Phương thức không được hỗ trợ.";
        }
    }
    public function postLogin()
    {
        // var_dump($_POST); // Xem nội dung của $_POST để biết liệu các dữ liệu có được gửi đúng không.


        $username = $_POST['username'];
        $password = $_POST['password'];

        // Kiểm tra tài khoản và mật khẩu
        $user = $this->model->checkLogin($username, $password);
        // var_dump($user);
        // die();


        if ($user) {
            // $_SESSION['user'] = $user;
            $_SESSION['user'] = [
                'id_account' => $user['id_account'],
                'username' => $user['username'],
                'email' => $user['email'],
            ];
            $_SESSION['login_error'] = null;

            // Redirect đến trang phù hợp dựa trên vai trò
            switch ($user['id_role']) {
                case 1:
                    header('Location:' . BASE_URL_ADMIN . '?act=/'); // Admin
                    break;
                case 2:
                    header('Location:' . BASE_URL_USER . '?act=/'); // User
                    break;
                case 3:
                    header('Location:' . BASE_URL_STAFF . '?act=/'); // Staff
                    break;
                default:
                    header('Location:' . BASE_URL . '?act=/');
                    break;
            }
            exit;
        } else {
            $_SESSION['login_error'] = "Tên đăng nhập hoặc mật khẩu không đúng!";
            header('Location: ' . BASE_URL . '?act=formLogin');
            exit;
        }
    }


    // Đăng xuất
    public function logout()
    {
        session_destroy();
        header('Location: ' . BASE_URL . '?act=formLogin');
        exit;
    }
}
