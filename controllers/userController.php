<?php
    class UserController {
        public $modelLog;

        public function __construct() {
            session_start(); // Bắt đầu session
            $this->modelLog = new UserModel();
        }

        public function trangchu() {
            require_once './views/trangchu.php';
        }

        public function formRegister() {
            require_once './views/register.php';
        }

        public function postRegister() {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            if($this->modelLog->postRegisterSubmit($username, $password, $email)){
                header('Location: '.BASE_URL.'?act=trangchu');
                exit();
            } else {
                echo "Đăng ký thất bại!";
            }
        }

        public function formLogin() {
            require_once './views/login.php';
        }

        public function postLogin() {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->modelLog->getUserLogin($username);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['username'] = $username;
                $_SESSION['role_id'] = $user['role_id'];
                
                if ($user['role_id'] == 1) {
                    header('Location: '.BASE_URL . '?act=trangchu');
                } else if ($user['role_id'] == 2) {
                    header('Location: '.BASE_URL_ADMIN.'?act=/');
                }
                exit();
            } else {
                echo "Tên đăng nhập hoặc mật khẩu không đúng!";
            }
        }
    }
?>