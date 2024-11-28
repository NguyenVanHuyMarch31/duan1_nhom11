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

    public function register($username, $email, $password)
    {
        $sql = "INSERT INTO account (username, email, password, id_role) VALUES (:username, :email, :password, :id_role)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        // Mặc định id_role = 2
        $id_role = 2;
        $stmt->bindParam(':id_role', $id_role);

        return $stmt->execute();
    }

    public function checkUsernameExists($username)
    {
        $sql = "SELECT COUNT(*) FROM account WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function checkEmailExists($email)
    {
        $sql = "SELECT COUNT(*) FROM account WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
    public function checkLogin($username, $password)
    {
        // Example: Prepare a query to check if the username and password match
        $stmt = $this->conn->prepare("SELECT * FROM account WHERE username = :username AND password = :password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password); // Make sure you're hashing the password if you're storing it securely
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Returns the user if found, otherwise false
    }
}
