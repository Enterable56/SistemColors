  
<?php include "Views/Templates/Header.php";?>
<ol class="breadcrumb mb-4">
     <li class="breadcrumb-item active">Medidas</li>
 </ol>
 <button class="btn btn-primary mb-2"  type="button" onclick="frmmedida();"> <i class= "fas fa-plus"></i></button>
 <table class="table table-dark" id="tblMedidas">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>nombre corto</th>
            <th></th>
            
        </tr>
    </thead>
    <tbody>

    </tbody>
 </table>
 <div id="nueva_medida" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="title">Nuevo Usuario</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="frmmedida">
                   <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="hidden" id="id" name="id">
                    <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre">
                   </div> 
                   <div class="form-group">
                    <label for="nombreC">Nombre Corto</label>
                    <input id="nombreC" class="form-control" type="text" name="nombreC" placeholder="Nombre Corto">
                   </div> 

                    <button class="btn btn-primary mt-2" type="button" onclick="registrarMedida(event);" id="btnAccion">Registrar</button>
                    <button class="btn btn-danger mt-2" type="button" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
 </div>

<?php include "Views/Templates/Footer.php";?>


