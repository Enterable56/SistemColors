<?php 
Class Administracion extends Controller{
    public function __construct(){
        session_start();
        if (empty($_SESSION['activo'])) {
            header('location: '.base_url);
        }else if($_SESSION['rol'] == 1){
            header('location: '.base_url."Usuarios");
        }
        parent::__construct();
    }
    public function index(){
        $data = $this->model->getEmpresa();
        $this->views->getView($this, "index", $data);
    }
    public function home(){
        $data['usuarios'] = $this->model->getDatos("tb_usuarios");
        $data['clientes'] = $this->model->getDatos("clientes");
        $data['productos'] = $this->model->getDatos("productos");
        $this->views->getView($this, "home", $data);
    }
    public function modificar(){
        $ruc = $_POST['ruc'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $mensaje = $_POST['mensaje'];
        $id = $_POST['id'];
        $data = $this->model->modificar($ruc, $nombre, $telefono, $direccion, $mensaje, $id);
        if($data == 'ok'){
            $msg = 'ok';
        }else{
            $msg = 'error';
        }
        echo json_encode($msg);
        die();
    }
    public function reporteStock(){
        $data = $this->model->getStockMinimo();
        echo json_encode($data);
        die();
    }
    public function reporteProductos(){
        $data = $this->model->getProductosVendidos();
        echo json_encode($data);
        die();
    }
}




?>