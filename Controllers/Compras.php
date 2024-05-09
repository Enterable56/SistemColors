<?php 

Class Compras extends Controller{
    public function __construct() {
        session_start();
        if (empty($_SESSION['activo'])) {
            header('location: '.base_url);
        }else if($_SESSION['rol'] == 1){
            header('location: '.base_url."Usuarios");
        }
        parent::__construct();
    }
    
    public function index(){
        $this->views->getView($this, "index");
    }
    public function ventas(){
        $data = $this->model->getClientes();
        $this->views->getView($this, "ventas", $data);
    }
    public function historial_ventas(){
        $this->views->getView($this, "historial_ventas");
    }
    public function buscarCodigo($cod){
        $data = $this->model->getProCod($cod);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function ingresar(){
        $id = $_POST['id'];
        $datos = $this->model->getProductos($id);
        $id_producto = $datos['id_producto'];
        $id_usuario = $_SESSION['id_usuario'];
        $precio = $datos['precio_compra'];
        $cantidad = $_POST['cantidad'];
        $comprobar = $this->model->consultarDetalle('detalles', $id_producto, $id_usuario);
        if (empty($comprobar)) {
            $sub_total = $precio * $cantidad;
            
            $data = $this->model->registrarDetalle('detalles', $id_producto,$id_usuario,$precio,$cantidad,$sub_total);
            if ($data == "ok") {
                $msg = array('msg' => 'Producto ingresado a la compra', 'icono' => 'success');
            }else{
                $msg = array('msg' => 'Error al ingresar el producto', 'icono' => 'error');
            }
        }else{
            $total_cantidad = $comprobar['cantidad'] + $cantidad;
            $sub_total = $total_cantidad * $precio;
            $data = $this->model->actualizarDetalle('detalles', $precio,$total_cantidad,$sub_total,$id_producto,$id_usuario);
            if ($data == "modificado") {
                $msg = array('msg' => 'Producto actualizado', 'icono' => 'success');
            }else{
                $msg = array('msg' => 'Error al actualizar el producto', 'icono' => 'error');
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function ingresarVenta(){
        $id = $_POST['id'];
        $datos = $this->model->getProductos($id);
        $id_producto = $datos['id_producto'];
        $id_usuario = $_SESSION['id_usuario'];
        $precio = $datos['precio_venta'];
        $cantidad = $_POST['cantidad'];
        $comprobar = $this->model->consultarDetalle('detalle_temp', $id_producto, $id_usuario);
        if (empty($comprobar)) {
            $sub_total = $precio * $cantidad;
            
            $data = $this->model->registrarDetalle('detalle_temp', $id_producto,$id_usuario,$precio,$cantidad,$sub_total);
            if ($data == "ok") {
                $msg = array('msg' => 'Producto ingresado a la Venta', 'icono' => 'success');
            }else{
                $msg = array('msg' => 'Error al ingresar el producto', 'icono' => 'error');
            }
        }else{
            $total_cantidad = $comprobar['cantidad'] + $cantidad;
            $sub_total = $total_cantidad * $precio;
            $data = $this->model->actualizarDetalle('detalle_temp', $precio,$total_cantidad,$sub_total,$id_producto,$id_usuario);
            if ($data == "modificado") {
                $msg = array('msg' => 'Producto actualizado', 'icono' => 'success');
            }else{
                $msg = array('msg' => 'Error al actualizar el producto', 'icono' => 'error');
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function listar($table){
        $id_usuario = $_SESSION['id_usuario'];
        $data['detalles'] = $this->model->getDetalles($table, $id_usuario);

        $data['total_pagar'] = $this->model->calcularCompra($table, $id_usuario);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function delete($id){
        $data = $this->model->deleteDetalle('detalles', $id);
        if($data == "ok"){
            $msg = array('msg' => 'Producto eliminado', 'icono' => 'success');
        }else{
            $msg = array('msg' => 'Error al eliminar el producto', 'icono' => 'error');
        }
        echo json_encode($msg);
        die();
    }
    public function deleteVenta($id){
        $data = $this->model->deleteDetalle('detalle_temp', $id);
        if($data == "ok"){
            $msg = array('msg' => 'Producto eliminado', 'icono' => 'success');
        }else{
            $msg = array('msg' => 'Error al eliminar el producto', 'icono' => 'error');
        }
        echo json_encode($msg);
        die();
    }
    public function registrarCompra(){
        $id_usuario = $_SESSION['id_usuario'];
        $total = $this->model->calcularCompra('detalles', $id_usuario);
        $data = $this->model->registrarCompra($total['total']);
        if ($data == 'ok') {
            $detalle = $this->model->getDetalles('detalles', $id_usuario);
            $id_compra = $this->model->getId('compras');
            foreach($detalle as $row){
                $cantidad = $row['cantidad'];
                $id_pro = $row['id_producto'];
                $precio = $row['precio'];
                $sub_total = $cantidad * $precio;
                $this->model->registrarDetalleCompra($id_compra['id'], $id_pro, $cantidad, $precio, $sub_total);
                $stock_actual = $this->model->getProductos($id_pro);
                $stock =  $stock_actual['cantidad'] + $cantidad;
                $this->model->actualizarStock($stock, $id_pro);
            }
            $vaciar = $this->model->vaciarDetalle('detalles', $id_usuario);
            if ($vaciar == 'ok') {
                $msg = array('msg' => 'ok', 'id_compra' => $id_compra['id']);
            }
        }else{
            $msg = 'error al realizar la compra';
        }
        echo json_encode($msg);
        die();
    }
    public function registrarVenta($id_cliente){
        $id_usuario = $_SESSION['id_usuario'];
        $total = $this->model->calcularCompra('detalle_temp', $id_usuario);
        $data = $this->model->registrarVenta($id_cliente,$total['total']);
        if ($data == 'ok') {
            $detalle = $this->model->getDetalles('detalle_temp', $id_usuario);
            $id_venta = $this->model->getId('ventas');
            foreach($detalle as $row){
                $cantidad = $row['cantidad'];
                $desc = $row['descuento'];
                $id_pro = $row['id_producto'];
                $precio = $row['precio'];
                $sub_total = ($cantidad * $precio) - $desc;
                $this->model->registrarDetalleVenta($id_venta['id'], $id_pro, $cantidad, $desc, $precio, $sub_total);
                $stock_actual = $this->model->getProductos($id_pro);
                $stock =  $stock_actual['cantidad'] - $cantidad;
                $this->model->actualizarStock($stock, $id_pro);
            }
            $vaciar = $this->model->vaciarDetalle('detalle_temp', $id_usuario);
            if ($vaciar == 'ok') {
                $msg = array('msg' => 'ok', 'id_venta' => $id_venta['id']);
            }
        }else{
            $msg = 'error al realizar la venta';
        }
        echo json_encode($msg);
        die();
    }
    public function generarPdf($id_compra){
        $empresa = $this->model->getEmpresas();
        $productos = $this->model->getProCompra($id_compra);
        
        require('Libraries/fpdf/fpdf.php');

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetMargins(5, 0, 0);
        $pdf->SetTitle('reporte de compra');
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(65,9,utf8_decode($empresa['nombre']), 0, 1, 'C');
        //$pdf->image(); Logo para el futuro
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 5, 'Ruc: ', 0, 0, 'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20, 5, $empresa['ruc'], 0, 1, 'L');

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 5, utf8_decode('Teléfono: '), 0, 0, 'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20, 5, $empresa['telefono'], 0, 1, 'L');

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 5, utf8_decode('Dirección: '), 0, 0, 'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20, 5, $empresa['direccion'], 0, 1, 'L');

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 5, utf8_decode('Folio: '), 0, 0, 'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20, 5, $id_compra, 0, 1, 'L');
        $pdf->Ln();
        //Encabezado de productos
        $pdf->SetFillColor(0,0,0);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(10, 5, 'cant', 0, 0, 'L', true);
        $pdf->Cell(35, 5, utf8_decode('Descripción'), 0, 0, 'L', true);
        $pdf->Cell(10, 5, 'precio', 0, 0, 'L', true);
        $pdf->Cell(15, 5, 'sub total', 0, 1, 'L', true);
        $pdf->SetTextColor(0,0,0);
        $total = 0.00;
        foreach($productos as $row){
            $total = $total + $row['sub_total'];
            $pdf->Cell(10, 5, $row['cantidad'], 0, 0, 'L');
            $pdf->Cell(35, 5, utf8_decode($row['descripcion']), 0, 0, 'L');
            $pdf->Cell(10, 5, $row['precio'], 0, 0, 'L');
            $pdf->Cell(15, 5, number_format($row['sub_total'], 2, '.', ','), 0, 1, 'L');
        }
        $pdf->Ln();
        $pdf->Cell(70, 5, 'Total a pagar', 0, 1, 'R');
        $pdf->Cell(70, 5, number_format($total, 2, '.', ','), 0, 1, 'R');



        $pdf->Output();
    }
    public function historial(){
        $this->views->getView($this, "historial");
    }
    public function listar_historial(){
        $data = $this->model->getHistorialCompras();
        for ($i=0; $i < count($data); $i++){
            $data[$i]['acciones'] = '<div> 
            <a class="btn btn-danger" href="'.base_url."Compras/generarPdf/".$data[$i]['id'].'" target="_blank"><i class= "fas fa-file-pdf"></i></a> 
            
            </div>';
           }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function listar_historial_venta(){
        $data = $this->model->getHistorialVentas();
        for ($i=0; $i < count($data); $i++){
            $data[$i]['acciones'] = '<div> 
            <a class="btn btn-danger" href="'.base_url."Compras/generarPdfVenta/".$data[$i]['id'].'" target="_blank"><i class= "fas fa-file-pdf"></i></a> 
            
            </div>';
           }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    
    public function generarPdfVenta($id_venta){
        $empresa = $this->model->getEmpresas();
        $descuento = $this->model->getDescuento($id_venta);
        $productos = $this->model->getProVenta($id_venta);
        require('Libraries/fpdf/fpdf.php');


        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetMargins(17, 17, 17);
        $pdf->SetTitle('reporte de venta');
        $pdf->SetFont('Arial','B',20);
        $pdf->SetXY(30,15);
        $pdf->Cell(150,10,utf8_decode($empresa['nombre']), 0, 1, 'C');
        $pdf->Ln(9);
        //$pdf->image(); Logo para el futuro
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(18, 5, 'Ruc: ', 0, 0, 'L');        
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(20, 5, $empresa['ruc'], 0, 0, 'L');
        $pdf->Ln();
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 5, utf8_decode('Teléfono: '), 0, 0, 'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20, 5, $empresa['telefono'], 0, 0, 'L');
        $pdf->Ln();
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 5, utf8_decode('Dirección: '), 0, 0, 'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20, 5, $empresa['direccion'], 0, 0, 'L');
        $pdf->Ln();
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 5, utf8_decode('Folio: '), 0, 0, 'L');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20, 5, $id_venta, 0, 1, 'L');
        $pdf->Ln();

        //Encabezado de clientes
        $pdf->SetFillColor(0,0,0);
        $pdf->SetTextColor(255,255,255);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(60, 5, 'Nombre', 0, 0, 'C', true);
        $pdf->Cell(60, 5, utf8_decode('Telefono'), 0, 0, 'C', true);
        $pdf->Cell(60, 5, utf8_decode('direccion'), 0, 1, 'C', true);
        $pdf->SetTextColor(0,0,0);
        $clientes = $this->model->clientesVenta($id_venta);
        $pdf->SetFont('Arial','',11);
            $pdf->Cell(60, 5, $clientes['nombre'], 1, 0, 'C');
            $pdf->Cell(60, 5, utf8_decode($clientes['telefono']), 1, 0, 'C');
            $pdf->Cell(60, 5, utf8_decode($clientes['direccion']), 1, 1, 'C');
    

        $pdf->Ln();
        //Encabezado de productos
        $pdf->SetFillColor(0,0,0);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(45, 5, 'cant', 0, 0, 'C', true);
        $pdf->Cell(45, 5, utf8_decode('Descripción'), 0, 0, 'C', true);
        $pdf->Cell(45, 5, 'precio', 0, 0, 'C', true);
        $pdf->Cell(45, 5, 'sub total', 0, 1, 'C', true);
        $pdf->SetTextColor(0,0,0);
        $total = 0.00;
        
        foreach($productos as $row){
            $total = $total + $row['sub_total'];
            $pdf->Cell(45, 5, $row['cantidad'], 1, 0, 'C');
            $pdf->Cell(45, 5, utf8_decode($row['descripcion']), 1, 0, 'C');
            $pdf->Cell(45, 5, $row['precio'], 1, 0, 'C');
            $pdf->Cell(45, 5, number_format($row['sub_total'], 2, '.', ','), 1, 1, 'C');
        }
        $pdf->Ln();
        $pdf->SetXY(160,100);
        $pdf->Cell(70, 5, 'Descuento Total', 0, 1, 'L');
        $pdf->SetXY(160,107);
        $pdf->Cell(70, 5, number_format($descuento['total'], 2, '.', ','), 0, 1, 'L');
        $pdf->SetXY(160,116);
        $pdf->Cell(70, 5, 'Total a pagar', 0, 1, 'L');
        $pdf->SetXY(160,122);
        $pdf->Cell(70, 5, number_format($total, 2, '.', ','), 0, 1, 'L');


        
        $pdf->Output();
    }
    
    
    public function calcularDescuento($datos){
        $array = explode(",", $datos);
        $id = $array[0];
        $desc = $array[1];
        if (empty($id) || empty($desc)) {
            $msg = array('msg' => 'error', 'icono' => 'error');
        }else{
            $descuento_actual = $this->model->verificarDescuento($id);
            $descuento_total = $descuento_actual['descuento'] + $desc;
            $sub_total = ($descuento_actual['cantidad'] * $descuento_actual['precio']) - $descuento_total;
            $data = $this->model->actualizarDescuento($descuento_total, $sub_total, $id);
            if ($data == 'ok') {
                $msg = array('msg' => 'Descuento aplicado', 'icono' => 'success');
            }else{
                $msg = array('msg' => 'error al aplicar el descuento', 'icono' => 'error');
            }
        }
        echo json_encode($msg);
        die();
    }
}




?>