<?php
class quanTriTaiKhoanController
{
    public $modelTaiKhoan;

    public function __construct()
    {
        $this->modelTaiKhoan = new quanTriTaiKhoanModel();
    }

    public function quanTriTaiKhoan()
    {
        $accountList = $this->modelTaiKhoan->layDanhSachTaiKhoan();

        require_once './views/quanLiTaiKhoan/adminQuanLiThongTin.php';
    }

    public function doiTrangThai()
    {
        if (isset($_GET['id'])) {
            $id_account = $_GET['id'];
            $account = $this->modelTaiKhoan->layTaiKhoanById($id_account);

            $newStatus = $account['status'] == 1 ? 0 : 1;

            $this->modelTaiKhoan->doiTrangThaiTaiKhoan($id_account, $newStatus);

            header("Location: " . BASE_URL_ADMIN . "?act=quanTriTaiKhoan");
            exit();
        }
    }
    public function chiTietTaiKhoan()
    {
        if (isset($_GET['id'])) {
            $id_account = $_GET['id'];
            $account = $this->modelTaiKhoan->layTaiKhoanById($id_account);

            require_once './views/quanLiTaiKhoan/chiTietTaiKhoan.php';
        }
    }
}
