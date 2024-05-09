<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php base_url; ?>Assets/css/styleL.css">
    <link rel="stylesheet" href="<?php base_url; ?>Assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php base_url; ?>Assets/css/box.css">
    <script src="<?php echo base_url; ?>Assets/js/all.min.js" crossorigin="anonymous"></script>
    
    <script src="<?php echo base_url; ?>Views/Templates/modal.php"></script>

    <title>Login</title>
</head>
<body>

    <div class="container-form register">

        <div class="information">
            <div class="info-childs">
                <h2>Bienvenido</h2>
                <p>Ingresa tus datos para poder inciar sesion!</p>
                
            </div>
        </div>
        <div class="trabajador-information">
            <div class="trabajador-childs">
                <h2>Iniciar Sesion </h2>
                

                <form method="POST" class="form-admin" id="frmLogin">
                    <label>
                    <i class="fas fa-user"></i>
                        <input type="text" placeholder="Nombre" id="usuario" name="usuario">
                    </label>
                    <label>
                    <i class="fas fa-key "> </i>
                        <input type="password" placeholder="Contraseña" id="clave" name="clave">
                    </label>
                    <input type="submit"  onclick="frmLogin(event);" value="Iniciar Sesion">
                </form>
                <br>
                <!--<a href="" class="mt-4" data-bs-toggle="modal" data-bs-target="#cambiarPass">Olvidaste tu contraseña gafo san ?</a>-->
            </div>
        </div>
    </div>



   
    <script src="<?php echo base_url; ?>Assets/js/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min3R.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>
        <script src="<?php echo base_url; ?>Assets/js/select2.min.js"></script>
        <script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>
        <script>
            const base_url = "<?php echo base_url ?>";
        </script>
        
        <script src="<?php echo base_url; ?>Assets/js/funciones.js"></script>
        <script src="<?php echo base_url; ?>Assets/js/login.js"></script>
</body>
</html>

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
                        <form id="frmCambiarPass" onsubmit="frmCambiarPass(event);">
                            <div class="form-group">
                                <label for="cedula">Cedula</label>
                                <input id="cedula" class="form-control" type="text" name="cedula"placeholder="Ingrese su cedula">
                            </div>
                            <button class="btn btn-primary mt-2" type="submit" >Modificar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="cambiarPass2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title" id="">Modificar contraseña</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="frmCambiarPass" onsubmit="frmCambiarPass(event);">
                            <div class="form-group">
                                <label for="clave">Contraseña</label>
                                <input id="clave" class="form-control" type="password" name="clave"placeholder="Ingrese su cedula">
                            </div>
                            <div class="form-group">
                                <label for="claveC">Confirmar Contraseña</label>
                                <input id="claveC" class="form-control" type="password" name="claveC"placeholder="Ingrese su cedula">
                            </div>
                            <button class="btn btn-primary mt-2" type="submit">Modificar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>