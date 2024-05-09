<?php 
class Clientes extends Controller{
    public function __construct(){
        session_start();
        if (empty($_SESSION['activo'])) {
            header('location: '.base_url);
        }
        parent::__construct();
    }

    public function listar(){
       
        $data = $this->model->getClientes();
        $contador = 1;
        for ($i=0; $i < count($data); $i++){
         
          

         $data[$i]['acciones'] = '<div> 
         <button class="btn btn-primary" type="button" onclick="btnEditarCli('.$data[$i]['id_cliente'].');"><i class= "fas fa-edit"></i></button> 
         <button class="btn btn-danger" type="button" onclick="btnEliminarCli('.$data[$i]['id_cliente'].');"><i class= "fas fa-trash-alt"></i></button>
         <button class="btn btn-success" type="button" onclick="btnObservar('.$data[$i]['id_cliente'].');"><i class= "fa-solid fa-eye"></i></button>
         
         
         </div>';
         $data[$i]['id'] = $contador++;
         $data[$i]['detalles_personalescli'];
        }
        echo Json_encode($data, JSON_UNESCAPED_UNICODE );
        die();
     }

    public function index(){
        $this->views->getView($this, "index");
    }

    public function registrar(){
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $id = $_POST['id'];

        if  ( empty($dni) || empty($nombre) || empty($apellido) || empty($telefono) || empty($direccion)) {
            $msg = "Todos los campos son obligatorios";
        }
      if (!preg_match("/^[0-9]{7,8}$/", $dni)) {
          $msg = "La cedula debe ir en el formato correcto";
      }
      else if (!preg_match("/^[0-9]{11}$/", $telefono)) {
        $msg = "El telefono debe ir en el formato correcto";
          
      }
        else{
            if ($id == "") {
                    $data = $this->model->registrarCliente($dni, $nombre, $apellido, $telefono, $direccion);
                    if ($data == "ok") {
                     $msg = "si";
                    }else if($data == "existe"){
                     $msg = "La cedula ya existe";
                    }else{
                     $msg = "Error al registrar el Cliente";
                    }
                   
            }else{
                $data = $this->model->modificarCliente($dni, $nombre, $apellido, $telefono, $direccion, $id);
                if ($data == "modificado") {
                 $msg = "modificado";
                }else{
                 $msg = "Error al modificar el Cliente";
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar(int $id_cliente){
        $data = $this->model->editarCli($id_cliente);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();

    }
    public function datos(int $id_cliente){
      $data = $this->model->datosCli($id_cliente);
      echo json_encode($data, JSON_UNESCAPED_UNICODE);
      die();

  }
    public function eliminar(int $id_cliente){
      $data =  $this->model->accionUserCli( $id_cliente);
      if ($data == 1) {
        $msg = "ok";
      }else{
        $msg = "Error al eliminar el Usuario";
      }
      echo json_encode($msg, JSON_UNESCAPED_UNICODE);
      die();
    }
    public function reingresar(int $id_nombre){
        $data =  $this->model->accionUser(1, $id_nombre);
        if ($data == 1) {
          $msg = "ok";
        }else{
          $msg = "Error al reingresar el Usuario";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
      }
      public function salir(){
        session_destroy();
        header('location: '.base_url);
      }
}



?>

