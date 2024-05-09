
<?php include "Views/Templates/Header.php";?>
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4>Nueva Compra</h4>
    </div>
    <div class="card-body">
        <form id="frmCompra">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="codigo"><i class="fas fa-barcode"></i> Codigo de barras</label>
                        <input type="hidden" id="id" name="id">
                        <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Codigo de barras" onkeyup="buscarCodigo(event)">
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
                        <input id="cantidad" class="form-control" type="number" name="cantidad" onkeyup="calcularPrecio(event)" disabled>
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
            <th>Precio</th>
            <th>Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody id="tblDetalle">

    </tbody>
</table>
<div class="row">
    <div class="col-md-4 ml-auto">

                
        <div class="form-group">
            <label for="total" class="font-weight-bold">Total</label>
            <input id="total" class="form-control" type="number" name="total" placeholder="Total" disabled>
            <button class="btn btn-primary mt-2 btn-block" type="button" onclick="procesar(1)">Generar Compra</button>
        </div>
    </div>
</div>

<?php include "Views/Templates/Footer.php";?>