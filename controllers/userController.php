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

        if (empty($_POST['username'])) {
            $errors[] = "Tên đăng nhập không được để trống.";
        }
        if (empty($_POST['email'])) {
            $errors[] = "Email không được để trống.";
        }
        if (empty($_POST['password'])) {
            $errors[] = "Mật khẩu không được để trống.";
        }        
        var_dump($errors);die();



        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
            return;
        }
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($this->modelProduct->postRegisterSubmit($username, $password, $email)) {
            header('Location: ' . BASE_URL . '?act=trangchu');
            exit;
        } else {
            echo "Đăng ký không thành công.";
        }
    }

    public function postLogin()
{
    // Kiểm tra xem $_POST có dữ liệu không
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    $errors = [];

    if (empty($_POST['username'])) {
        $errors[] = "Tên đăng nhập không được để trống.";
    }
    if (empty($_POST['password'])) {
        $errors[] = "Mật khẩu không được để trống.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        return;
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $this->modelProduct->getUserByUsername($username);

    if ($user && $user['password'] === $password) {
        $_SESSION['ten_dang_nhap'] = $username;
        $_SESSION['role'] = $user['role_id'];

        if ($user['role_id'] == 2) {
            header('Location: ' . BASE_URL_ADMIN . '?act=/');
        } else if ($user['role_id'] == 1) {
            header('Location: ' . BASE_URL . '?act=trangchu');
        }
        exit;
    } else {
        echo "Đăng nhập không thành công. Kiểm tra lại tên đăng nhập hoặc mật khẩu.";
    }
}

}

?>