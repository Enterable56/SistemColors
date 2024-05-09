  
<?php include "Views/Templates/Header.php";?>
<ol class="breadcrumb mb-4">
     <li class="breadcrumb-item active">Productos</li>
 </ol>
 <button class="btn btn-primary mb-2"  type="button" onclick="frmProducto();"> <i class= "fas fa-plus"></i></button>
 <div class="table-responsive">
 <table class="table table-dark" id="tblProductos">
    <thead class="thead-light">
    
        <tr>
            <th>Id</th>
            <th>Foto</th>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>precio</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

    </tbody>
 </table>
 </div>
 <div id="nuevo_producto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="title">Nuevo Productos</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="frmProducto">

                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="codigo">Codigo de barras</label>
                    <input type="hidden" id="id" name="id">
                    <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Codigo de barras">
                </div> 
                    </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="nombre">Descripcion</label>
                    <input id="nombre" class="form-control" type="text" name="nombre" placeholder="nombre">
                 </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="precio_compra">Precio Compra</label>
                                <input id="precio_compra" class="form-control" type="text" name="precio_compra" placeholder="Precio compra">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="precio_venta">Precio Venta</label>
                                <input id="precio_venta" class="form-control" type="text" name="precio_venta" placeholder="Precio venta">
                            </div>
                        </div>
                    </div>
                   </div>
                   <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                    <label for="medida">Medida</label>
                    <select id="medida" class="form-control" name="medida">
                    <?php foreach($data['medidas'] as $row){ ?>
                        <option value = "<?php echo $row['id_medidas']; ?>"><?php echo $row['nombre'] ?></option>
                        <?php } ?>
                    </select>
                   </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                    <label for="categoria">Categorias</label>
                    <select id="categoria" class="form-control" name="categoria">
                    <?php foreach($data['categorias'] as $row){ ?>
                        <option value = "<?php echo $row['id_categoria']; ?>"><?php echo $row['nombre'] ?></option>
                        <?php } ?>
                    </select>
                   </div>
                        </div>
                       <div class="col-md-12">
                        <div class="form-group">
                            <label>Foto</label>
                           <div class="card border-primary">
                            <div class="card-body">
                            <label for="imagen" class="btn btn-primary" id="icon-image"><i class="fas fa-image"></i></label>
                            <span id="icon-cerrar"></span>
                            <input id="imagen" class="d-none" type="file" name="imagen" onchange="preview(event)">
                            <input type="hidden" id="foto_actual" name="foto_actual">
                            <img class="img-thumbnail" id="img-preview">
                            </div>
                           </div> 
                        </div>
                       </div>
                   </div> 
                   
    
                    <button class="btn btn-primary mt-2" type="button" onclick="registrarPro(event);" id="btnAccion">Registrar</button>
                    <button class="btn btn-danger mt-2" type="button" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
 </div>

<?php include "Views/Templates/Footer.php";?>


