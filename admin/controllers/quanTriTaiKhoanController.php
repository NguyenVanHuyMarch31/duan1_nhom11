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

            if ($account === null) {
                echo "Account not found!";
                return;
            }

            $newStatus = $account['status'] == 1 ? 0 : 1;
            $this->modelTaiKhoan->doiTrangThaiTaiKhoan($id_account, $newStatus);
            header("Location: " . BASE_URL_ADMIN . "?act=quanTriTaiKhoan");
            exit();
        }
    }
    public function phanQuyen()
    {
        if (isset($_GET['id'])) {
            $id_account = $_GET['id'];
            $account = $this->modelTaiKhoan->layTaiKhoanById($id_account);
    
            if ($account === null) {
                echo "Account not found!";
                return;
            }
    
            // Lấy ID vai trò hiện tại của tài khoản
            $currentRoleId = $account['id_role'];
    
            // Điều kiện thay đổi vai trò (dựa vào ID vai trò)
            if ($currentRoleId == 1) {
                $newRoleId = 2;  // Nếu vai trò hiện tại là Admin (id_role = 1), chuyển thành User (id_role = 2)
            } elseif ($currentRoleId == 2) {
                $newRoleId = 3;  // Nếu vai trò hiện tại là User (id_role = 2), chuyển thành Staff (id_role = 3)
            } elseif ($currentRoleId == 3) {
                $newRoleId = 1;  // Nếu vai trò hiện tại là Staff (id_role = 3), chuyển thành Admin (id_role = 1)
            } else {
                $newRoleId = 2;  
            }
    
            // Cập nhật vai trò mới cho tài khoản
            $this->modelTaiKhoan->capNhatVaiTroTaiKhoan($id_account, $newRoleId);
    
            // Điều hướng lại trang quản trị tài khoản
            header("Location: " . BASE_URL_ADMIN . "?act=quanTriTaiKhoan");
            exit();
        } else {
            echo "No account ID provided!";
        }
    }
    
    public function chiTietTaiKhoan()
    {
        if (isset($_GET['id'])) {
            $id_account = $_GET['id'];
            $account = $this->modelTaiKhoan->layTaiKhoanById($id_account);

            if ($account === null) {
                // Error handling if the account is not found
                echo "Account not found!";
                return;
            }

            require_once './views/quanLiTaiKhoan/chiTietTaiKhoan.php';
        }
    }

    public function formThemTaiKhoan(){
        $roles = $this->modelTaiKhoan->getRoles();
        require_once './views/quanLiTaiKhoan/themTaiKhoan.php';
    }
    public function themTaiKhoan() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $username = $_POST['username'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = '123456';  // Mật khẩu mặc định là "123456"
            $role_id = $_POST['role_id'] ?? '';
            $status = $_POST['status'] ?? '';
        
            if (empty($username) || empty($email)) {
                echo "Tất cả các trường là bắt buộc!";
                return;
            }
        
            $result = $this->modelTaiKhoan->themTaiKhoan($username, $email, $password, $role_id, $status);
            header('Location:' .BASE_URL_ADMIN. '?act=quanTriTaiKhoan');
            exit();
        } else {
            echo "Phương thức yêu cầu không hợp lệ.";
        }
    }
     public function formSuaTaiKhoan() {
        $id_account = $_GET['id'];
        $account = $this->modelTaiKhoan->getAccountById($id_account);
        
        require_once './views/quanLiTaiKhoan/suaTaiKhoan.php';
    }

    public function postEditTaiKhoan() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $id_account = $_POST['id_account'];
            $existingAccount = $this->modelTaiKhoan->getAccountById($id_account);
            $file_old = $existingNews['thumbnail'] ?? null;
            $username = $_POST['username'];
            $email = $_POST['email'];
            $full_name = $_POST['full_name'];
            $birth_date = $_POST['birth_date'];  // Make sure the birth date is in the correct format
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
                $updateStatus = $this->modelTaiKhoan->updateAccount(
                    $id_account, $username, $email, $full_name, $birth_date, $gender, 
                    $new_file, $address, $phone
                );
                
                if ($updateStatus) {
                    header('Location: ' . BASE_URL_ADMIN . '?act=quanTriTaiKhoan');
                    exit();
                } else {
                    $error['update'] = 'Có lỗi xảy ra khi cập nhật tài khoản.';
                }
            }
        }
    }
    
    public function uploadFile($file, $uploadDir) {
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
    
}
