<?php 
class Usuarios extends Controller{
    public function __construct(){
        session_start();
        if (empty($_SESSION['activo'])) {
            header('location: '.base_url);
        }
        parent::__construct();
    }

    public function listar(){
        $contador = 1;
       $data = $this->model->getUsuarios();
       for ($i=0; $i < count($data); $i++){
        if($data[$i]['estado'] == 1){
            $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
        }else{
            $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';  
        }
        $data[$i]['acciones'] = '<div> 
        <button class="btn btn-primary" type="button" onclick="btnEditarUser('.$data[$i]['id_nombre'].');"><i class= "fas fa-edit"></i></button> 
        <button class="btn btn-danger" type="button" onclick="btnEliminarUser('.$data[$i]['id_nombre'].');"><i class= "fas fa-trash-alt"></i></button>
        
        
        </div>';
        $data[$i]['id'] = $contador++;
        $data[$i]['detalles_personales'];
       }
       echo Json_encode($data, JSON_UNESCAPED_UNICODE );
       die();
    }

    public function index(){
        if (empty($_SESSION['activo'])) {
            header('location: '.base_url);
        }
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
                $_SESSION['rol'] = $data['id_rol'];
                $_SESSION['activo'] = true;
                $msg = "ok";
            }else{
                
                $msg = "no";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar(){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $cedula = $_POST['cedula'];
        $clave = $_POST['clave'];
        $confirmar = $_POST['confirmar'];
        $id = $_POST['id'];
        $hash = hash("SHA256", $clave);
        if (empty($nombre) || empty($apellido) || empty($cedula) || empty($clave) || empty($confirmar)) {
            $msg = array('msg' => 'Todos los campos son obligatorios', 'icono' => 'warning');
            
        }
        
        if (!preg_match("/^[a-zA-Z0-9]{5,12}$/", $clave)) {
            $msg = array('msg' => 'La contraseña debe tener como minimo 5 caracteres, MmN', 'icono' => 'warning');
        }
        else if (!preg_match("/^[1-9]{7,8}$/", $cedula)) {
            $msg = array('msg' => 'La cedula de ir en el formato correcto', 'icono' => 'warning');
            
        }
        
        else{
            if ($id == "") {
                if($clave != $confirmar){
                    $msg = array('msg' => 'Las contraseñas no coinciden', 'icono' => 'warning');
                }else{
                    $data = $this->model->registrarUsuario($nombre, $apellido, $cedula, $hash);
                    if ($data == "ok") {
                     $msg = array('msg' => 'Usuario registrado con exito', 'icono' => 'success');
                    }else if($data == "existe"){
                     $msg = array('msg' => 'La cedula ya existe', 'icono' => 'warning');
                    }else{
                     $msg = array('msg' => 'Error al registrar el usuario', 'icono' => 'error');
                    }
                }   
            }else{
                $data = $this->model->modificarUsuario($nombre, $apellido, $cedula, $id);
                if ($data == "modificado") {
                 $msg = array('msg' => 'Usuario modificado con exito', 'icono' => 'success');
                }else{
                 $msg = array('msg' => 'Error al modificar el Usuario', 'icono' => 'error');
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar(int $id_nombre){
        $data = $this->model->editarUser($id_nombre);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();

    }
    public function eliminar(int $id_nombre){
      $data =  $this->model->accionUser($id_nombre);
      if ($data == 1) {
        $msg = array('msg' => 'Usuario eliminado', 'icono' => 'success');
      }else{
        $msg = array('msg' => 'Error al eliminar el Usuario', 'icono' => 'error');
      }
      echo json_encode($msg, JSON_UNESCAPED_UNICODE);
      die();
    }
    public function cambiarPass(){

        $cedula_pass = $_POST['cedula'];
        if (empty($nombre_c)) {
            $mensaje = array('msg' => 'Todos los campos son obligatorios', 'icono' => 'warning');
        }else{
                $data = $this->model->getUsuarioPass($cedula_pass);
                if (empty($data)) {
                    /*$hash = hash("SHA256", $nueva);
                    $verificar = $this->model->modificarPass(hash($nueva, PASSWORD_DEFAULT), $nombre_c );*/
                    if ($data == 1) {
                        $msg = "ok";
                      }else{
                        $msg = "Error al reingresar el Usuario";
                      }
                    }
            
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

