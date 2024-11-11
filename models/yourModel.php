<?php
include './includes/connect_db.php';
class YourModel
{
    public $db;
    public function __construct()
    {
        $this->db = connectDB();
    }
}