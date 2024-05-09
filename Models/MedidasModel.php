<?php 
class MedidasModel extends Query{
    private $nombre, $nombreC, $id_medidas;
    public function __construct(){
       parent::__construct();
    }

    public function getMedidas(){
        $sql = "SELECT * FROM medidas ";
       $data = $this->selectALL($sql);
        return $data;
    }
    public function registrarMedi(string $nombre, string $nombreC){
        $this->nombre = $nombre;
        $this->nombreC = $nombreC;
        $verificar = "SELECT * FROM medidas WHERE nombre = '$this->nombre'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO medidas(nombre, nombre_corto) VALUES (?,?)";
            $datos = array($this->nombre, $this->nombreC);
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
    public function modificarMedida(string $nombre, string $nombreC, int $id){
        $this->nombre = $nombre;
        $this->nombreC = $nombreC;
        $this->id = $id;

        $sql = "UPDATE medidas SET nombre = ?, nombre_corto = ? WHERE id_medidas = ?";
        $datos = array($this->nombre, $this->nombreC, $this->id);
        $data = $this->save($sql, $datos);
        if($data == 1){
            $res = "modificado";
        }else{
            $res = "error";
        }

        return $res;
    }
    public function editarMedi(int $id_medidas){
        $sql = "SELECT * FROM medidas WHERE id_medidas = $id_medidas";
        $data = $this->select($sql);
        return $data;
    }
    public function accionMedi(int $id_medidas){
        $this->id_medidas = $id_medidas;
        $sql = "DELETE FROM medidas WHERE id_medidas = ?";
        $datos = array($this->id_medidas);
        $data = $this->save($sql, $datos);
        return $data;
    }
}


?>