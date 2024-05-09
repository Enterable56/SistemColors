<?php include "Views/Templates/Header.php";?>
<script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>
<?php 
if (isset($_SESSION['msj'])) {
    $respuesta = $_SESSION['msj'];?>
<script>
    Swal.fire({
    title: "Bien!",
    text: "<?php echo $respuesta; ?>",
    icon: "success"
});
</script>

<?php
    unset($_SESSION['msj']);
}

?>


<div class="card">
    <div class="card-header bg-dark text-white">
        Datos de la empresa
    </div>
    <div class="card-body">
        <form id="frmEmpresa">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input id="id" class="form-control" type="hidden" name="id" value="<?php echo $data['id']; ?>">
                        <label for="ruc">Ruc</label>
                        <input id="ruc" class="form-control" type="text" name="ruc"placeholder="Ingrese el Ruc" value="<?php echo $data['ruc']; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre"placeholder="Ingrese el Nombre" value="<?php echo $data['nombre']; ?>">
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input id="telefono" class="form-control" type="text" name="telefono"placeholder="Ingerese el Telefono" value="<?php echo $data['telefono']; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input id="direccion" class="form-control" type="text" name="direccion"placeholder="Ingrese la Direccion" value="<?php echo $data['direccion']; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mensaje">Mensaje</label>
                        <textarea id="mensaje" class="form-control" name="mensaje" placeholder="Ingrese el mensaje"  rows="3"><?php echo $data['mensaje']; ?></textarea>
                    </div>
                </div>
                
            </div>
            <button class="btn btn-success mt-2" type="button" onclick="modificarEmpresa()">Modificar</button>
            <a href="<?php echo base_url; ?>Config/App/Backup.php" class="btn btn-primary mt-2 ml-5">Crear Copia de la base de datos</a>
            <button class="btn btn-primary mt-2"  type="button" onclick="restaurar();"> Restaurar base de datos</button>
            
        </form>
    </div>
</div>
<!-- Modal -->
<div id="restaurarbd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="title">Nuevo Usuario</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="Config/App/restore.php" id="rest" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Selecciona un punto de restauracion</label>
                        <input class="form-control" type="file" name="file" accept=".sql" id="formFileMultiple" multiple>
                    </div>
                    <br>
                    <button class="btn btn-success mt-2" type="submit" name="restore">Restaurar</button>
                    <button class="btn btn-danger mt-2" type="button" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
 </div>

<?php include "Views/Templates/Footer.php";?>



