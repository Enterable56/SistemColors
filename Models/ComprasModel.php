<?php 
class ComprasModel extends Query{
    private $nombre, $id_categoria;
    public function __construct(){
    parent::__construct();
    }
    public function getClientes(){
        $sql = "SELECT * FROM clientes";
        $data = $this->selectALL($sql);
        return $data;
    }
    public function getProCod(string $cod){
        $sql = "SELECT * FROM productos WHERE codigo = '$cod'";
        $data = $this->select($sql);
        return $data;
    }
    public function getProductos(int $id){
        $sql = "SELECT * FROM productos WHERE id_producto = $id";
        $data = $this->select($sql);
        return $data;
    }
    public function registrarDetalle(string $table, int $id_producto, int $id_usuario, string $precio, int $cantidad, string $sub_total){
        $sql = "INSERT INTO $table (id_producto, id_usuario, precio, cantidad, sub_total) VALUES (?,?,?,?,?)";
        $datos = array($id_producto, $id_usuario, $precio, $cantidad, $sub_total);
        $data = $this->save($sql, $datos);
        if($data == 1){
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function getDetalles(string $table, int $id_usuario){
        $sql = "SELECT d.*, p.id_producto, p.descripcion FROM $table d INNER JOIN productos p ON d.id_producto = p.id_producto  WHERE d.id_usuario = $id_usuario";
        $data = $this->selectALL($sql);
        return $data;
    }
    public function calcularCompra(string $table, int $id_usuario){
        $sql = "SELECT sub_total, SUM(sub_total) AS total FROM $table WHERE id_usuario = $id_usuario";
        $data = $this->select($sql);
        return $data;
    }
    public function deleteDetalle(string $table, int $id){
        $sql = "DELETE FROM $table WHERE id = ?";
        $datos = array($id);
        $data = $this->save($sql, $datos);
        if($data == 1){
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function consultarDetalle(string $table, int $id_producto, int $id_usuario){
        $sql = "SELECT * FROM $table WHERE id_producto = $id_producto AND id_usuario = $id_usuario";
        $data = $this->select($sql);
        return $data;
    }
    public function actualizarDetalle(string $table, string $precio, int $cantidad, string $sub_total, int $id_producto, int $id_usuario){
        $sql = "UPDATE $table SET precio = ?, cantidad = ?, sub_total = ? WHERE id_producto = ? AND id_usuario = ? ";
        $datos = array($precio, $cantidad, $sub_total, $id_producto, $id_usuario   );
        $data = $this->save($sql, $datos);
        if($data == 1){
            $res = "modificado";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function registrarCompra(string $total){
        $sql = "INSERT INTO compras (total) VALUES (?)";
        $datos = array($total);
        $data = $this->save($sql, $datos);
        if($data == 1){
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function registrarVenta(int $id_cliente, string $total){
        $sql = "INSERT INTO ventas (id_cliente,total) VALUES (?,?)";
        $datos = array($id_cliente,$total);
        $data = $this->save($sql, $datos);
        if($data == 1){
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function getId(string $table){
        $sql = "SELECT MAX(id) AS id FROM $table";
        $data = $this->select($sql);
        return($data);

    }
    public function registrarDetalleCompra(int $id_compra, int $id_pro, string $cantidad, string $precio, string $sub_total){
        $sql = "INSERT INTO detalle_compra (id_compra, id_producto, cantidad, precio, sub_total) VALUES (?,?,?,?,?)";
        $datos = array($id_compra, $id_pro, $cantidad, $precio, $sub_total);
        $data = $this->save($sql, $datos);
        if($data == 1){
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function registrarDetalleVenta(int $id_venta, int $id_pro, int $cantidad, string $desc, string $precio, string $sub_total){
        $sql = "INSERT INTO detalle_ventas (id_venta, id_producto, cantidad, descuento, precio, sub_total) VALUES (?,?,?,?,?,?)";
        $datos = array($id_venta, $id_pro, $cantidad, $desc, $precio, $sub_total);
        $data = $this->save($sql, $datos);
        if($data == 1){
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function getEmpresas(){
        $sql = "SELECT * FROM configuracion";
        $data = $this->select($sql);
        return $data;
    }
    public function vaciarDetalle(string $table, int $id_usuario){
        $sql = "DELETE FROM $table WHERE id_usuario = ?";
        $datos = array($id_usuario);
        $data = $this->save($sql, $datos);
        if($data == 1){
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function getProCompra(int $id_compra){
        $sql = "SELECT C.*, d.*, p.id_producto, p.descripcion FROM compras c INNER JOIN detalle_compra d ON c.id = d.id_compra INNER JOIN productos p ON p.id_producto = d.id_producto WHERE c.id = $id_compra ";
        $data = $this->selectALL($sql);
        return $data;
    }
    public function getProVenta(int $id_venta){
        $sql = "SELECT v.*, d.*, p.id_producto, p.descripcion FROM ventas v INNER JOIN detalle_ventas d ON v.id = d.id_venta INNER JOIN productos p ON p.id_producto = d.id_producto WHERE v.id = $id_venta ";
        $data = $this->selectALL($sql);
        return $data;
    }
    public function getHistorialCompras(){
        $sql = "SELECT * FROM compras";
        $data = $this->selectALL($sql);
        return $data;
    }
    public function getHistorialVentas(){
        $sql = "SELECT c.id_cliente, c.nombre, v.* FROM clientes c INNER JOIN  ventas v ON v.id_cliente = c.id_cliente";
        $data = $this->selectALL($sql);
        return $data;
    }
    public function actualizarStock(int $cantidad, int $id_pro){
        $sql = "UPDATE productos SET cantidad = ? WHERE id_producto = ?";
        $datos = array($cantidad, $id_pro);
        $data = $this->save($sql, $datos);
        return $data;
    }
    public function clientesVenta(int $id){
        $sql = "SELECT v.id, v.id_cliente, dt.telefono,dt.direccion, c.* FROM ventas v INNER JOIN clientes c ON c.id_cliente = v.id_cliente INNER JOIN detalles_personalescli dt ON c.id_cliente = dt.id  WHERE v.id = $id";
        $data = $this->select($sql);
        return $data;
    }
    public function verificarDescuento(int $id){
        $sql = "SELECT * FROM detalle_temp WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }

    public function actualizarDescuento(string $desc, string $sub_total, int $id){
        $sql = "UPDATE detalle_temp SET descuento = ?, sub_total = ? WHERE id = ?";
        $datos = array($desc, $sub_total, $id);
        $data = $this->save($sql, $datos);
        if($data == 1){
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function getDescuento(int $id_venta){
        $sql = "SELECT descuento, SUM(descuento) AS total FROM detalle_ventas WHERE id_venta = $id_venta";
        $data = $this->select($sql);
        return $data;
    }


}


?>