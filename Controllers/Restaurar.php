<?php 
class Restaurar extends Controller{
    public function __construct(){
        session_start();
        if (empty($_SESSION['activo'])) {
            header('location: '.base_url);
        }
        parent::__construct();
    }

    public function index(){
        if (empty($_SESSION['activo'])) {
            header('location: '.base_url);
        }
        $this->views->getView($this, "index");
    }
}




?>