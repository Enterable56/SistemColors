<?php 
class CategoriasModel extends Query{
    private $nombre, $id_categoria;
    public function __construct(){
       parent::__construct();
    }

    public function getCategoria(){
        $sql = "SELECT * FROM categorias ";
       $data = $this->selectALL($sql);
        return $data;
    }
    public function registrarCate(string $nombre){
        $this->nombre = $nombre;
        $verificar = "SELECT * FROM categorias WHERE nombre = '$this->nombre'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO categorias(nombre) VALUES (?)";
            $datos = array($this->nombre);
            $data = $this->save($sql, $datos);
            if($data == 1){
                $res = "ok";
            }else{
                $res = "error";
            }
        }else{
            $res = "existe";
        }

        return $res;
    }
    public function modificarCategoria(string $nombre, int $id){
        $this->nombre = $nombre;
        $this->id = $id;

        $sql = "UPDATE categorias SET nombre = ? WHERE id_categoria = ?";
        $datos = array($this->nombre, $this->id);
        $data = $this->save($sql, $datos);
        if($data == 1){
            $res = "modificado";
        }else{
            $res = "error";
        }

        return $res;
    }
    public function editarCate(int $id_categoria){
        $sql = "SELECT * FROM categorias WHERE id_categoria = $id_categoria";
        $data = $this->select($sql);
        return $data;
    }
    public function accionCate(int $id_categoria){
        $this->id_categoria = $id_categoria;
        $sql = "DELETE FROM categorias WHERE id_categoria = ?";
        $datos = array($this->id_categoria);
        $data = $this->save($sql, $datos);
        return $data;
    }
}


?>