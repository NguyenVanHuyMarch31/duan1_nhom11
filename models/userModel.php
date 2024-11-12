
<?php
class userModel
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

    public function postRegisterSubmit($ten_dang_nhap, $mat_khau, $email)
    {
        try {
            $sql = "INSERT INTO acount (ten_dang_nhap, mat_khau, email) VALUES (:ten_dang_nhap, :mat_khau, :email)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_dang_nhap' => $ten_dang_nhap,
                ':mat_khau' => $mat_khau,
                ':email' => $email,
            ]);
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getUserByUsername($ten_dang_nhap)
    {
        $sql = "SELECT * FROM acount WHERE ten_dang_nhap = :ten_dang_nhap";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':ten_dang_nhap' => $ten_dang_nhap]);
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }
}

?>