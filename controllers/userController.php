<?php
class UserController
{
    public $model;
    public $modelPhim;

    public function __construct()
    {
        $this->modelPhim = new modelPhimDangchieus();

        $this->model = new userModel();
    }

    // Trang chủ
    public function trangchu()
    {
        $listMovies = $this->modelPhim->getMovies();
        $listGenres = $this->modelPhim->listGenreMovies();
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
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $user = $this->model->checkLogin($username, $password);
    
        if ($user) {
            // Kiểm tra trạng thái tài khoản
            if ($user['status'] == '0') {
                $_SESSION['login_error'] = "Tài khoản của bạn đã bị vô hiệu hóa!";
                header('Location: ' . BASE_URL . '?act=formLogin');
                exit;
            }
    
            // Nếu tài khoản hợp lệ và chưa bị vô hiệu hóa
            $_SESSION['user'] = [
                'id_account' => $user['id_account'],
                'username' => $user['username'],
                'email' => $user['email'],
            ];
            $_SESSION['login_error'] = null;
    
            // Điều hướng theo vai trò
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
