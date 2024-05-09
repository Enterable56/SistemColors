<?php 
class Productos extends Controller{
    public function __construct(){
        session_start();
        if (empty($_SESSION['activo'])) {
          header('location: '.base_url);
      }
        parent::__construct();
    }

    public function listar(){
       $data = $this->model->getProductos();
      $contador = 1;
       for ($i=0; $i < count($data); $i++){
        $data[$i]['imagen'] = '<img class="img-thumbnail" src="'. base_url. "Assets/img/". $data[$i]['foto'].'" width = "100">';
        if($data[$i]['estado'] == 1){
            $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
        }else{
            $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';  
        }
        $data[$i]['acciones'] = '<div> 
        <button class="btn btn-primary" type="button" onclick="btnEditarPro('.$data[$i]['id_producto'].');"><i class= "fas fa-edit"></i></button> 
        <button class="btn btn-danger" type="button" onclick="btnEliminarPro('.$data[$i]['id_producto'].');"><i class= "fas fa-trash-alt"></i></button>
        
        
        </div>';
        $data[$i]['id'] = $contador++;
       }
       echo Json_encode($data, JSON_UNESCAPED_UNICODE );
       die();
    }

    public function index(){
        if (empty($_SESSION['activo'])) {
            header('location: '.base_url);
        }
        $data['medidas'] = $this->model->getMedidas();
        $data['categorias'] = $this->model->getCategorias();
        $this->views->getView($this, "index", $data);
    }

    public function registrar(){

        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $precio_compra = $_POST['precio_compra'];
        $precio_venta = $_POST['precio_venta'];
        $medida = $_POST['medida'];
        $categoria = $_POST['categoria'];
        $id = $_POST['id'];
        $img = $_FILES['imagen'];
        $name = $img['name'];
        $tmpname = $img['tmp_name'];
        $fecha = date("YmdHis");
        if (empty($codigo) || empty($nombre) || empty($precio_compra) || empty($precio_venta) || empty($medida) || empty($categoria)) {
            $msg = "Todos los campos son obligatorios";
        }else{
            if (!empty($name)) {
              $imgNombre = $fecha . ".jpg";
              $destino = "Assets/img/" . $imgNombre;
            }else if(!empty($_POST['foto_actual']) && empty($name)){
              $imgNombre = $_POST['foto_actual'];
            }else{
              $imgNombre = "default.png";
            }
            if ($id == "") {
                    $data = $this->model->registrarProducto($codigo, $nombre, $precio_compra, $precio_venta, $medida, $categoria, $imgNombre);
                    if ($data == "ok") {
                      if (!empty($name)) {
                        move_uploaded_file($tmpname, $destino);
                      }
                     $msg = "si";
                     
                    }else if($data == "existe"){
                     $msg = "el producto ya existe";
                    }else{
                     $msg = "Error al registrar el Producto";
                    }
            }else{
              $imgDelete = $this->model->editarPro($id);
              if($imgDelete['foto'] != 'default.png'){
                if(file_exists("Assets/img/" . $imgDelete['foto'])){
                  unlink("Assets/img/" . $imgDelete['foto']);
                }
              }
              $data = $this->model->modificarProducto($codigo, $nombre, $precio_compra, $precio_venta, $medida, $categoria, $imgNombre, $id);
              if ($data == "modificado") {
                if (!empty($name)) {
                  move_uploaded_file($tmpname, $destino);
                }
               $msg = "modificado";
              }else{
               $msg = "Error al modificar el Producto";
              }

            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar(int $id_producto){
        $data = $this->model->editarPro($id_producto);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();

    }
    public function eliminar(int $id_producto){
      $data =  $this->model->accionPro( $id_producto);
      if ($data == 1) {
        $msg = "ok";
      }else{
        $msg = "Error al eliminar el Producto";
      }
      echo json_encode($msg, JSON_UNESCAPED_UNICODE);
      die();
    }
    public function reingresar(int $id_nombre){
        $data =  $this->model->accionUser(1, $id_nombre);
        if ($data == 1) {
          $msg = "ok";
        }else{
          $msg = "Error al reingresar el Producto";
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