<?php
class UserController
{
    public $modelProduct;

    public function __construct()
    {
        $this->modelProduct = new userModel();
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
        $errors = [];

        if (empty($_POST['ten_dang_nhap'])) {
            $errors[] = "Tên đăng nhập không được để trống.";
        }
        if (empty($_POST['email'])) {
            $errors[] = "Email không được để trống.";
        }
        if (empty($_POST['mat_khau'])) {
            $errors[] = "Mật khẩu không được để trống.";
        }

        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo "<script>
                    alert('$error');
                </script>";
            }
            return;
        }

        $ten_dang_nhap = $_POST['ten_dang_nhap'];
        $email = $_POST['email'];
        $mat_khau = $_POST['mat_khau']; 

        if ($this->modelProduct->postRegisterSubmit($ten_dang_nhap, $mat_khau, $email)) {
            header('Location: ' . BASE_URL . '?act=trangchu');
            exit;
        } else {
            echo "Đăng ký không thành công.";
        }
    }

    public function postLogin()
    {
        $errors = [];

        if (empty($_POST['ten_dang_nhap'])) {
            $errors[] = "Tên đăng nhập không được để trống.";
        }
        if (empty($_POST['mat_khau'])) {
            $errors[] = "Mật khẩu không được để trống.";
        }

        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
            return;
        }

        $ten_dang_nhap = $_POST['ten_dang_nhap'];
        $mat_khau = $_POST['mat_khau'];

        $user = $this->modelProduct->getUserByUsername($ten_dang_nhap);

        if ($user && $user['mat_khau'] ===$mat_khau) {
            session_start();
            $_SESSION['ten_dang_nhap'] = $ten_dang_nhap;
            $_SESSION['role'] = $user['id_role'];

            if ($user['id_role'] == 2 || $user['id_role'] == 3) {
                header('Location: ' . BASE_URL_ADMIN . '?act=/'); 
            } else if ($user['id_role'] == 1) {
                header('Location: ' . BASE_URL . '?act=trangchu'); 
            }
            exit;
        } else {
            echo "Đăng nhập không thành công. Kiểm tra lại tên đăng nhập hoặc mật khẩu.";
        }
    }
}
