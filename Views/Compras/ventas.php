
<?php include "Views/Templates/Header.php";?>
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4>Nueva Venta</h4>
    </div>
    <div class="card-body">
        <form id="frmVenta">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="codigo"><i class="fas fa-barcode"></i> Codigo de barras</label>
                        <input type="hidden" id="id" name="id">
                        <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Codigo de barras" onkeyup="buscarCodigoVenta(event)">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="nombre">Descripcion</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" disabled>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input id="cantidad" class="form-control" type="number" name="cantidad" onkeyup="calcularPrecioVenta(event)" disabled>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="precion">Precio</label>
                        <input id="precion" class="form-control" type="number" name="precion" placeholder="Precio" disabled>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group mt-2">
                        <label for="sub_total">Sub Total</label>
                        <input id="sub_total" class="form-control" type="number" name="sub_total" placeholder="Sub Total">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<table class="table table-light table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Descripcion</th>
            <th>Cantidad</th>
            <th>Aplicar</th>
            <th>Descuento</th>
            <th>Precio</th>
            <th>Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody id="tblDetalleVenta">

    </tbody>
</table>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="cliente">Seleccionar cliente</label>
            <select id="cliente" class="form-control" name="cliente">
                <?php foreach($data as $row) { ?>
                <option value="<?php echo $row['id_cliente']; ?>"><?php echo $row['nombre']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-md-3 ml-auto">         
        <div class="form-group">
            <label for="total" class="font-weight-bold">Total</label>
            <input id="total" class="form-control" type="number" name="total" placeholder="Total" disabled>
            <button class="btn btn-primary mt-2 btn-block" type="button" onclick="procesar(2)">Generar Venta</button>
        </div>
    </div>
</div>

<?php include "Views/Templates/Footer.php";?>