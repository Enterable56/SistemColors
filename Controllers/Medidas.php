<?php
class Medidas extends Controller{
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
       $data = $this->model->getMedidas();
       for ($i=0; $i < count($data); $i++){
        if($data[$i]['estado'] == 1){
            $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
        }else{
            $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';  
        }
        $data[$i]['acciones'] = '<div> 
        <button class="btn btn-primary" type="button" onclick="btnEditarMedi('.$data[$i]['id_medidas'].');"><i class= "fas fa-edit"></i></button> 
        <button class="btn btn-danger" type="button" onclick="btnEliminarMedi('.$data[$i]['id_medidas'].');"><i class= "fas fa-trash-alt"></i></button>
        
        
        </div>';
       }
       echo Json_encode($data, JSON_UNESCAPED_UNICODE );
       die();
    }

    public function index(){
        $this->views->getView($this, "index");
    }


    public function registrar(){
      $nombre = $_POST['nombre'];
      $nombreC = $_POST['nombreC'];
      $id = $_POST['id'];
      if (empty($nombre) || empty($nombreC)) {
          $msg = "Ingrese un dato para continuars";
      }else{
          if ($id == "") {
                  $data = $this->model->registrarMedi($nombre, $nombreC);
                  if ($data == "ok") {
                   $msg = "si";
                  }else if($data == "existe"){
                   $msg = "el nombre ya existe";
                  }else{
                   $msg = "Error al registrar la categoria";
                  }
                  
          }else{
              $data = $this->model->modificarMedida($nombre, $nombreC, $id);
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
    public function editar(int $id_medidas){
        $data = $this->model->editarMedi($id_medidas);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();

    }
    public function eliminar(int $id_medidas){
      $data =  $this->model->accionMedi( $id_medidas);
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