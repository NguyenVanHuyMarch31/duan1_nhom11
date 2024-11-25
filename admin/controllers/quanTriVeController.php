<?php
class quanTriVeController 
{    
    public $modelTicket;
    public function __construct()
    {
        $this->modelTicket = new modelTickets();
    }

    public function quanTriVe()
    {
        $ticket = $this->modelTicket->getAllTicket();
        require_once './views/quanLiDanhSachVe/adminQuanLiDanhSachVe.php';
    }
    public function suaVe(){

    }
    public function xoaVe(){

    }
    public function themVe(){
        require_once './views/';
    }
    
}
