<?php
    class UserModel {
        public $conn;

        public function __construct() {
            $this->conn = connectDB();
        }

        public function __destruct() {
            $this->conn = null;
        }

        public function postRegisterSubmit($username, $password, $email) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO accounts (username, password, email) VALUES (:username, :password, :email)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':username' => $username,
                ':password' => $hashedPassword,
                ':email' => $email,
            ]);
            return true;
        }

        public function getUserLogin($username) {
            $sql = "SELECT accounts.*, account_role.role_id 
                    FROM accounts
                    LEFT JOIN account_role ON accounts.account_id = account_role.account_id
                    WHERE accounts.username = :username";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':username' => $username]);
            return $stmt->fetch(PDO::FETCH_ASSOC); 
        }
    }
?>