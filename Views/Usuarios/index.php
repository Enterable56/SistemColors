  
<?php include "Views/Templates/Header.php";?>
<ol class="breadcrumb mb-4">
     <li class="breadcrumb-item active">Usuarios</li>
 </ol>
 <button class="btn btn-primary mb-2"  type="button" onclick="frmUsuario();"> <i class= "fas fa-plus"></i></button>

 <table class="table table-dark" id="tblUsuarios">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cedula</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    
    </tbody>
 </table>
 <div id="nuevo_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="title">Nuevo Usuario</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="frmUsuario">
                   <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="hidden" id="id" name="id">
                    <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre">
                   </div> 
                   <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input id="apellido" class="form-control" type="text" name="apellido" placeholder="Apellido">
                   </div> 
                   <div class="form-group">
                    <label for="cedula">Cedula</label>
                    <input id="cedula" class="form-control" type="text" name="cedula" placeholder="Cedula">
                   </div>
                <div id = "claves">
                   <div class="form-group">
                    <label for="clave">Contraseña</label>
                    <input id="clave" class="form-control" type="password" name="clave" placeholder="contraseña" pattern="[a-zA-Z]{5,10}">
                   </div> 
                   <div class="form-group">
                    <label for="confirmar">Confirmar Contraseña</label>
                    <input id="confirmar" class="form-control" type="password" name="confirmar" placeholder="Confirmar Contraseña">
                   </div> 
                </div>   
                    <button class="btn btn-primary mt-2" type="button" onclick="registrarUser(event);" id="btnAccion">Registrar</button>
                    <button class="btn btn-danger mt-2" type="button" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
 </div>

<?php include "Views/Templates/Footer.php";?>


