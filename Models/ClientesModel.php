<?php 
class ClientesModel extends Query{
    private $dni, $nombre, $apellido, $direccion, $telefono, $id_cliente, $estado;
    public function __construct(){
       parent::__construct();
    }
    public function getClientes(){
        $sql = "SELECT * FROM clientes INNER JOIN detalles_personalescli 
        WHERE clientes.id_cliente = detalles_personalescli.id  ";
        $data = $this->selectALL($sql);
        return $data;
    }

    public function registrarCliente(string $dni, string $nombre, string $apellido, string $telefono, string $direccion){
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $verificar = "SELECT * FROM detalles_personalescli WHERE cedula = '$this->dni'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO detalles_personalescli(cedula,telefono,direccion) VALUES (?,?,?)";
            $datos = array($this->dni, $this->telefono, $this->direccion);
            $data = $this->save($sql, $datos);

            $ultimo_id = $this->con->lastInsertId();

            $this->ultimo_id = $ultimo_id;
            if ($data) {
                $sql = "INSERT INTO clientes(nombre,apellido, detalles_personalescli) VALUES (?,?,?)";
                $datos = array($this->nombre, $this->apellido, $this->ultimo_id);
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
    public function modificarCliente(string $dni, string $nombre, string $apellido, string $telefono, string $direccion, int $id){
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->id = $id;

        $sql = "UPDATE clientes SET nombre = ?, apellido = ? WHERE id_cliente = ?";
        $datos = array($this->nombre, $this->apellido, $this->id);
        $data = $this->save($sql, $datos);


        if ($data) {
            $sql = "UPDATE detalles_personalescli SET cedula = ?, telefono = ?, direccion = ? WHERE id = ?";
            $datos = array($this->dni, $this->telefono, $this->direccion, $this->id);
            $data = $this->save($sql, $datos);
        }

        if($data == 1){
            $res = "modificado";
        }else{
            $res = "error";
        }

        return $res;
    }
    public function editarCli(int $id_cliente){
        $sql = "SELECT * FROM clientes INNER JOIN detalles_personalescli ON clientes.id_cliente = detalles_personalescli.id WHERE clientes.id_cliente = $id_cliente";
        $data = $this->select($sql);
        return $data;
    }
    public function datosCli(int $id_cliente){
        $sql = "SELECT * FROM detalles_personalescli WHERE id = $id_cliente";
        $data = $this->select($sql);
        return $data;
    }
    public function accionUserCli(int $id_cliente){
        $this->id_cliente = $id_cliente;
        $sql = "DELETE c, dtc FROM clientes c INNER JOIN detalles_personalescli dtc ON c.id_cliente = dtc.id WHERE id_cliente = ?";
        $datos = array($this->id_cliente);
        $data = $this->save($sql, $datos);
        return $data;
    }
}


?>