<?php 
class AdministracionModel extends Query{
    private $dni, $nombre, $apellido, $direccion, $telefono, $id_cliente, $estado;
    public function __construct(){
       parent::__construct();
    }
    public function getEmpresa(){
        $sql = "SELECT * FROM configuracion";
       $data = $this->select($sql);
        return $data;
    }
    public function getDatos(string $table){
        $sql = "SELECT COUNT(*) AS total FROM $table";
        $data = $this->select($sql);
        return $data;
    }
    public function modificar(string $ruc, string $nombre, string $telefono, string $direccion, string $mensaje, int $id){
        
            $sql = "UPDATE configuracion SET ruc = ?, nombre = ?, telefono = ?, direccion = ?, mensaje = ? WHERE id = ?";
            $datos = array($ruc, $nombre, $telefono, $direccion, $mensaje, $id);
            $data = $this->save($sql, $datos);
            if($data == 1){
                $res = "ok";
            }else{
                $res = "error";
            }
        
        return $res;
    }
    public function getStockMinimo(){
        $sql = "SELECT * FROM productos WHERE cantidad < 15 ORDER BY cantidad DESC LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getProductosVendidos(){
        $sql = "SELECT d.id_producto, d.cantidad, p.id_producto, p.descripcion, SUM(d.cantidad) AS total FROM detalle_ventas d INNER JOIN productos p ON p.id_producto = d.id_producto GROUP BY d.id_producto ORDER BY d.cantidad DESC LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }

}


?>