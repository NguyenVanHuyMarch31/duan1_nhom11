<?php
class quanTriTaiKhoanModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function __destruct()
    {
        $this->conn = null;
    }

    public function layDanhSachTaiKhoan()
    {
        $sql = "
        SELECT a.id_account, a.username, a.email, a.full_name, a.thumbnail, 
        r.role_name AS role_names, a.status
        FROM account a
        LEFT JOIN role r ON a.id_role = r.id_role;
    ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function layTaiKhoanById($id_account)
    {
        $sql = "SELECT a.*,r.role_name
                FROM account a
                JOIN role r ON a.id_role = r.id_role
                WHERE a.id_account = :id_account;
                ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_account', $id_account, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Hàm cập nhật vai trò của tài khoản
    public function capNhatVaiTroTaiKhoan($id_account, $newRoleId)
    {
        $sql = "UPDATE account SET id_role = :newRoleId WHERE id_account = :id_account";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':newRoleId', $newRoleId, PDO::PARAM_INT);
        $stmt->bindParam(':id_account', $id_account, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function layIdVaiTroTheoTen($roleName)
    {
        $sql = "SELECT id_role FROM role WHERE role_name = :role_name";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':role_name', $roleName);
        $stmt->execute();
        return $stmt->fetchColumn(); // Trả về ID của vai trò
    }



    public function doiTrangThaiTaiKhoan($id_account, $newStatus)
    {
        $sql = "UPDATE account SET status = :status WHERE id_account = :id_account";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':status', $newStatus);
        $stmt->bindParam(':id_account', $id_account);
        return $stmt->execute();
    }

    public function layDanhSachVaiTro()
    {
        $sql = "SELECT id_role, role_name FROM role";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getRoles() {
        $sql = "SELECT id_role, role_name FROM role";  
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    }
    public function themTaiKhoan($username, $email, $password, $role_id, $status) {
        $defaultPassword = '123456';  
    
        $sql = "INSERT INTO account (username, email, password, id_role, status) 
                VALUES (:username, :email, :password, :role_id, :status)";
    
        $stmt = $this->conn->prepare($sql);
    
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $defaultPassword);
        $stmt->bindParam(':role_id', $role_id);
        $stmt->bindParam(':status', $status);
    
        return $stmt->execute();
    }
    
    
}
