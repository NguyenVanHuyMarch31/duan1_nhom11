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
        GROUP_CONCAT(r.role_name) AS role_names, a.status
        FROM account a
        LEFT JOIN account_role ar ON a.id_account = ar.id_account
        LEFT JOIN role r ON ar.id_role = r.id_role
        GROUP BY a.id_account;

    ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function layTaiKhoanById($id_account)
    {
        $sql = "
        SELECT a.*, 
        GROUP_CONCAT(r.role_name) AS role_names, a.status
        FROM account a
        LEFT JOIN account_role ar ON a.id_account = ar.id_account
        LEFT JOIN role r ON ar.id_role = r.id_role
        WHERE a.id_account = :id_account
        GROUP BY a.id_account;
    ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_account', $id_account);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function doiTrangThaiTaiKhoan($id_account, $newStatus)
    {
        $sql = "UPDATE account SET status = :status WHERE id_account = :id_account";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':status', $newStatus);
        $stmt->bindParam(':id_account', $id_account);
        return $stmt->execute();
    }
    public function capNhatPhanQuyen($id_account, $roles)
    {
        $sql = "DELETE FROM account_role WHERE id_account = :id_account";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_account', $id_account);
        $stmt->execute();

        foreach ($roles as $role_id) {
            $sql = "INSERT INTO account_role (id_account, id_role) VALUES (:id_account, :id_role)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_account', $id_account);
            $stmt->bindParam(':id_role', $role_id);
            $stmt->execute();
        }

        return true;
    }
}
