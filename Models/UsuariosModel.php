<?php 
class UsuariosModel extends Query{
    private $nombre, $apellido, $cedula, $clave, $id_nombre;
    public function __construct(){
       parent::__construct();
    }
    public function getUsuario(string $usuario, string $clave){
        $sql = "SELECT * FROM tb_usuarios WHERE nombre = '$usuario' AND clave = '$clave' ";
       $data = $this->select($sql);
        return $data;
    }
    public function getUsuarioPass(string $cedula_pass){
        $sql = "SELECT * FROM dettalles_personales WHERE cedula = '$cedula_pass' ";
       $data = $this->select($sql);
        return $data;
    }
    public function getUsuarios(){
        $sql = "SELECT * FROM tb_usuarios INNER JOIN detalles_personales ON tb_usuarios.detalles_personales = detalles_personales.id where tb_usuarios.id_nombre = detalles_personales.id ";
       $data = $this->selectALL($sql);
        return $data;
    }
    public function registrarUsuario(string $nombre, string $apellido, int $cedula, string $clave){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->cedula = $cedula;
        $this->clave = $clave;
        $verificar = "SELECT * FROM detalles_personales WHERE cedula = '$this->cedula'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO detalles_personales(cedula) VALUES (?)";
            $datos = array($this->cedula);
            $data = $this->save($sql, $datos);

            $ultimo_id = $this->con->lastInsertId();

            $this->ultimo_id = $ultimo_id;
                
        if ($data) {
            $sql = "INSERT INTO tb_usuarios(nombre,apellido,clave,detalles_personales) VALUES (?,?,?,?)";
            $datos = array($this->nombre, $this->apellido, $this->clave,$this->ultimo_id);
            $data = $this->save($sql, $datos);
        }    

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
    public function modificarUsuario(string $nombre, string $apellido, int $cedula, int $id){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->cedula = $cedula;
        $this->id = $id;

        $sql = "UPDATE tb_usuarios SET nombre = ?, apellido = ? WHERE id_nombre = ?";
        $datos = array($this->nombre, $this->apellido,$this->id);
        $data = $this->save($sql, $datos);

        if ($data) {
            $sql = "UPDATE detalles_personales SET cedula = ? WHERE id_nombre = ?";
            $datos = array($this->cedula,$this->id);
            $data = $this->save($sql, $datos);
        }

        if($data == 1){
            $res = "modificado";
        }else{
            $res = "error";
        }

        return $res;
    }
    public function editarUser(int $id_nombre){
        $sql = "SELECT * FROM tb_usuarios INNER JOIN detalles_personales ON tb_usuarios.id_nombre = detalles_personales.id WHERE tb_usuarios.id_nombre = $id_nombre";
        $data = $this->select($sql);
        return $data;
    }
    public function accionUser(int $id_nombre){
        $this->id_nombre = $id_nombre;
        $sql = "DELETE u, dt FROM tb_usuarios u INNER JOIN detalles_personales dt ON u.id_nombre = dt.id WHERE id_nombre = ?";
        $datos = array($this->id_nombre);
        $data = $this->save($sql, $datos);

        return $data;


    }
    public function modificarPass(string $clave, string $nombre_c){
        $sql = "UPDATE tb_usuarios SET clave = ? WHERE nombre = ?";
        $datos = array($clave, $nombre_c);
        $data = $this->save($sql, $datos);
        return $data;
    }
    
}


?>