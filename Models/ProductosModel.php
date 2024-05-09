<?php 
class ProductosModel extends Query{
    private $codigo, $nombre, $precio_compra, $precio_venta, $medida, $categoria, $id_producto, $name;
    public function __construct(){
       parent::__construct();
    }
    public function getMedidas(){
        $sql = "SELECT * FROM medidas WHERE estado = 1 ";
       $data = $this->selectALL($sql);
        return $data;
    }
    public function getCategorias(){
        $sql = "SELECT * FROM categorias WHERE estado = 1 ";
       $data = $this->selectALL($sql);
        return $data;
    }
    public function getProductos(){
        $sql = "SELECT p.*, m.id_medidas, m.nombre AS medida, c.id_categoria, c.nombre AS categoria FROM productos p INNER JOIN medidas m ON p.id_medida = m.id_medidas INNER JOIN categorias c ON p.id_categoria = c.id_categoria";
       $data = $this->selectALL($sql);
        return $data;
    }
    public function registrarProducto(string $codigo, string $nombre, string $precio_compra, string $precio_venta, int $medida, int $categoria, string $img){
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->precio_compra = $precio_compra;
        $this->precio_venta = $precio_venta;
        $this->medida = $medida;
        $this->categoria = $categoria;
        $this->img = $img;
        $verificar = "SELECT * FROM Productos WHERE codigo = '$this->codigo'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO Productos(codigo,descripcion,precio_compra,precio_venta,id_medida,id_categoria,foto) VALUES (?,?,?,?,?,?,?)";
            $datos = array($this->codigo, $this->nombre, $this->precio_compra, $this->precio_venta, $this->medida,$this->categoria,$this->img);
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
    public function modificarProducto(string $codigo, string $nombre, string $precio_compra, string $precio_venta, int $medida, int $categoria, string $img , int $id){
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->precio_compra = $precio_compra;
        $this->precio_venta = $precio_venta;
        $this->medida = $medida;
        $this->categoria = $categoria;
        $this->img = $img;
        $this->id = $id;

        $sql = "UPDATE Productos SET codigo = ?, descripcion = ?, precio_compra = ?, precio_venta = ?, id_medida = ?, id_categoria = ?, foto = ? WHERE id_producto = ?";
        $datos = array($this->codigo, $this->nombre, $this->precio_compra, $this->precio_venta, $this->medida,$this->categoria,$this->img,$this->id);
        $data = $this->save($sql, $datos);
        if($data == 1){
            $res = "modificado";
        }else{
            $res = "error";
        }

        return $res;
    }
    public function editarPro(int $id_producto){
        $sql = "SELECT * FROM Productos WHERE id_producto = $id_producto";
        $data = $this->select($sql);
        return $data;
    }
    public function accionPro( int $id_producto){
        $this->id_producto = $id_producto;
        $sql = "DELETE FROM Productos WHERE id_producto = ?";
        $datos = array( $this->id_producto);
        $data = $this->save($sql, $datos);
        return $data;
    }
}

?>