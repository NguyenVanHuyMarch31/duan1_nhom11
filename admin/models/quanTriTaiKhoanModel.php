<?php
    class quanTriTaiKhoanModel {
        public $conn;
        public function __construct(){
            $this->conn = connectDB();
        }
        public function __destruct(){
            $this->conn = null;
        }
        public function getAllTaiKhoan(){
            try {
                $sql = "SELECT * FROM accounts";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log("Error in getAllTaiKhoan: " . $e->getMessage());
                return [];
            }
        }
        
    }
?>