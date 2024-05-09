<?php
class Categorias extends Controller{
    public function __construct(){
        session_start();
        if (empty($_SESSION['activo'])) {
            header('location: '.base_url);
        }else if($_SESSION['rol'] == 1){
            header('location: '.base_url."Usuarios");
        }
        parent::__construct();
    }

    public function listar(){
       $data = $this->model->getCategoria();
       for ($i=0; $i < count($data); $i++){
        if($data[$i]['estado'] == 1){
            $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
        }else{
            $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';  
        }
        $data[$i]['acciones'] = '<div> 
        <button class="btn btn-primary" type="button" onclick="btnEditarCate('.$data[$i]['id_categoria'].');"><i class= "fas fa-edit"></i></button> 
        <button class="btn btn-danger" type="button" onclick="btnEliminarCate('.$data[$i]['id_categoria'].');"><i class= "fas fa-trash-alt"></i></button>
        
        
        </div>';
       }
       echo Json_encode($data, JSON_UNESCAPED_UNICODE );
       die();
    }

    public function index(){
        $this->views->getView($this, "index");
    }

    public function validar(){
        if(empty($_POST['usuario']) || empty($_POST['clave'])){
            $msg = "Los campos estan vacios";
        }else{
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];
            $hash = hash("SHA256", $clave);
            $data = $this->model->getUsuario($usuario, $hash);
            if($data){
                $_SESSION['id_usuario'] = $data['id_nombre'];
                $_SESSION['nombre'] = $data['nombre'];
                $_SESSION['apellido'] = $data['apellido'];
                $_SESSION['rol'] = $data['id_rol'];
                $_SESSION['activo'] = true;
                $msg = "ok";
            }else{
                $msg = "Usuario o contraseña incorrecta";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar(){
        $nombre = $_POST['nombre'];
        $id = $_POST['id'];
        if (empty($nombre)) {
            $msg = "Ingrese un dato para continuars";
        }else{
            if ($id == "") {
                    $data = $this->model->registrarCate($nombre);
                    if ($data == "ok") {
                     $msg = "si";
                    }else if($data == "existe"){
                     $msg = "el nombre ya existe";
                    }else{
                     $msg = "Error al registrar la categoria";
                    }
                    
            }else{
                $data = $this->model->modificarCategoria($nombre,$id);
                if ($data == "modificado") {
                 $msg = "modificado";
                }else{
                 $msg = "Error al modificar el Usuario";
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar(int $id_categoria){
        $data = $this->model->editarCate($id_categoria);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();

    }
    public function eliminar(int $id_categoria){
      $data =  $this->model->accionCate( $id_categoria);
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