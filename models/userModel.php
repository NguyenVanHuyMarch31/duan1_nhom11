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

    public function postRegisterSubmit($username, $password, $email)
    {
        try {
            $sql = "INSERT INTO accounts (username, password, email) VALUES (:username, :password, :email)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':username' => $username,
                ':password' => $password,
                ':email' => $email,
            ]);
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function getUserByUsername($username)
    {
        $sql = "
        SELECT accounts.*, account_role.role_id 
        FROM accounts
        LEFT JOIN account_role ON accounts.account_id = account_role.account_id
        WHERE accounts.username = :username
    ";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([':username' => $username]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>