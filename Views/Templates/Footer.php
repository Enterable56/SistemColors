</div>
</main>
<footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Raul Sanchez <?php echo date("Y") ?></div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <div id="cambiarPass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title" id="">Modificar contraseña</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="frmCambiarPass">
                            <div class="form-group">
                                <label for="clave_actual">Contraseña Actual</label>
                                <input id="clave_actual" class="form-control" type="password" name="clave_actual"placeholder="contraseña Actual">
                            </div>
                            <div class="form-group">
                                <label for="clave_nueva">Contraseña Nueva</label>
                                <input id="clave_nueva" class="form-control" type="password" name="clave_nueva" placeholder="Nueva contraseña">
                            </div>
                            <div class="form-group">
                                <label for="confirmar_clave">Confirmar Contraseña</label>
                                <input id="confirmar_clave" class="form-control" type="password" name="confirmar_clave" placeholder="Confirmar contraseña">
                            </div>
                            <button class="btn btn-primary" type="submit">Modificar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        //modal de categorias
        <div id="nueva_categoria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="title">Nuevo Usuario</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="frmCategoria">
                   <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="hidden" id="id" name="id">
                    <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre">
                   </div> 
                </div>   
                    <button class="btn btn-primary   m-2" type="button" onclick="registrarCategoria(event);" id="btnAccion">Registrar</button>
                    <button class="btn btn-danger  m-2" type="button" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
 </div>

        <script src="<?php echo base_url; ?>Assets/js/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min3R.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>
        <script src="<?php echo base_url; ?>Assets/DataTables/datatables.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/demo/datatables-demo.js"></script>
        <script src="<?php echo base_url; ?>Assets/js/chart.js"></script>
        <script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>
        <script src="<?php echo base_url; ?>Assets/js/select2.min.js"></script>
        <script>
            const base_url = "<?php echo base_url; ?>";
        </script>
        <script src="<?php echo base_url; ?>Assets/js/funciones.js"></script>
    </body>
</html>