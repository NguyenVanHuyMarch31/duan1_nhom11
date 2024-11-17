<?php
class UserController
{
    public $modelProduct;

    public function __construct()
    {
        $this->modelProduct = new userModel();
    }

    public function trangchu()
    {
        require_once './views/trangchu.php';
    }
    public function formLogin()
    {
        require_once './views/login.php';
    }
    public function formRegister()
    {
        require_once './views/register.php';
    }

    
}

?>