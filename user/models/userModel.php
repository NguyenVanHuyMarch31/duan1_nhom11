<?php
class userModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();  // Kết nối cơ sở dữ liệu
    }

    public function __destruct()
    {
        $this->conn = null;  // Đóng kết nối sau khi sử dụng
    }

    // Kiểm tra email đã tồn tại chưa
    public function checkEmailExists($email)
    {
        $stmt = $this->conn->prepare("SELECT id_account FROM account WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->rowCount() > 0;
    }

    // Đăng ký người dùng
    public function registerUser($username, $email, $password)
    {
        // Mã hóa mật khẩu
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Thực hiện truy vấn SQL để chèn dữ liệu vào bảng account
        $stmt = $this->conn->prepare("INSERT INTO account (username, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$username, $email, $hashedPassword]);
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
        $sql = "SELECT a.*, r.role_name
                FROM account a
                JOIN role r ON a.id_role = r.id_role
                WHERE a.id_account = :id_account";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_account', $id_account, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ?: null; 
    }
    public function getAccountById($id_account) {
        $stmt = $this->conn->prepare("SELECT * FROM account WHERE id_account = :id_account");
        $stmt->execute([':id_account' => $id_account]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateAccount($id_account, $username, $email, $full_name, $birth_date, $gender, $thumbnail, $address, $phone) {
        $sql = "UPDATE account SET 
                username = :username, 
                email = :email, 
                full_name = :full_name, 
                birth_date = :birth_date, 
                gender = :gender, 
                thumbnail = :thumbnail, 
                address = :address, 
                phone = :phone
                WHERE id_account = :id_account";
        
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':id_account' => $id_account,
            ':username' => $username,
            ':email' => $email,
            ':full_name' => $full_name,
            ':birth_date' => $birth_date,
            ':gender' => $gender,
            ':thumbnail' => $thumbnail,
            ':address' => $address,
            ':phone' => $phone
        ]);
    }
    
    
}
