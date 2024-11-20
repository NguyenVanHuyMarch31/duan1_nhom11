<?php
class modelRooms
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
}
