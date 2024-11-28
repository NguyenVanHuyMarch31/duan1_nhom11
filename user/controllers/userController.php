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
        
    }
     // Logout function
     public function logout() {
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

    
}
?>
