  
<?php include "Views/Templates/Header.php";?>
<ol class="breadcrumb mb-4">
     <li class="breadcrumb-item active">Clientes</li>
 </ol>
 <button class="btn btn-primary mb-2"  type="button" onclick="frmCliente();"> <i class= "fas fa-plus"></i></button>
 <table class="table table-dark" id="tblClientes">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>apellido</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

    </tbody>
 </table>
 <div id="nuevo_cliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="bgmodal" class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="title">Nuevo Cliente</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="frmCliente">
                   <div class="form-group">
                    <label for="dni">Cedula</label>
                    <input type="hidden" id="id" name="id">
                    <input id="dni" class="form-control" type="text" name="dni" placeholder="Cedula">
                   </div> 
                   <div class="form-group">
                   <label for="nombre" id="lnombre">Nombre</label>
                    <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre">
                   </div> 
                   <div class="form-group">
                    <label for="apellido" id="lapellido">Apellido</label>
                    <input id="apellido" class="form-control" type="text" name="apellido" placeholder="Apellido">
                   </div> 
                   <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Telefono">
                   </div>
                   <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <textarea id="direccion" class="form-control" name="direccion" placeholder="Direccion" rows="3"></textarea>
                   </div>
                    <button class="btn btn-primary mt-2" type="button" onclick="registrarCli(event);" id="btnAccion">Registrar</button>
                    <button class="btn btn-danger mt-2" type="button" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
 </div>


 <div id="nuevo_cliente2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="bgmodal" class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="title2">Nuevo Cliente</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="frmCliente2">
                   <div class="form-group">
                    <label for="dni">Cedula</label>
                    <input type="hidden" id="id" name="id">
                    <input id="dni" class="form-control" type="text" name="dni" placeholder="Cedula">
                   </div> 
                   <div class="form-group">
                   <label for="nombre" >Nombre</label>
                    <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre">
                   </div> 
                   <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input id="apellido" class="form-control" type="text" name="apellido" placeholder="Apellido">
                   </div> 
                   <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Telefono">
                   </div>
                   <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <textarea id="direccion" class="form-control" name="direccion" placeholder="Direccion" rows="3"></textarea>
                   </div>
                    <button class="btn btn-primary mt-2" type="button" onclick="registrarCli(event);" id="btnAccion2">Registrar</button>
                    <button class="btn btn-danger mt-2" type="button" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
 </div>

<?php include "Views/Templates/Footer.php";?>


