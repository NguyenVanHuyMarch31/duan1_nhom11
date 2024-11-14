<?php
class yourController
{    
    public $modelProduct;
    public function __construct()
    {
        $this->modelProduct = new yourModel();
    }

    public function trangchu()
    {
        require_once './views/trangchu.php';
    }
    
}
