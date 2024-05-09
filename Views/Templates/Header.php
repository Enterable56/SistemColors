<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Panel de Administracion</title>
        <link rel="icon" href="logo.jpeg">
        <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url; ?>Assets/css/table.css" rel="stylesheet" />
        <link href="<?php echo base_url; ?>Assets/DataTables/datatables.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link href="<?php echo base_url; ?>Assets/css/select2.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="<?php echo base_url; ?>Assets/js/all.min.js" crossorigin="anonymous"></script>
        
        
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="<?php echo base_url; ?>Administracion/home">Sistem Color's</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->

            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Perfil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url; ?>Usuarios/salir">Cerrar sesion</a>
                    </div>
                </li>
            </ul>
        </nav>
        
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <a class="nav-link" href="<?php echo base_url; ?>Administracion/home">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-house mr-2 fa-2x"></i></div>
                                 Inicio
                            </a>
                        
                            
                            <a class="nav-link" href="<?php echo base_url; ?>Usuarios">
                                <div class="sb-nav-link-icon"><i class="fas fa-user mr-2 fa-2x"></i></div>
                                 Usuarios
                            </a>
                            
                            <a class="nav-link" href="<?php echo base_url; ?>Clientes">
                                <div class="sb-nav-link-icon"><i class="fas fa-user fa-2x"></i></div>
                                 Clientes
                            </a>
                            <?php if($_SESSION['rol'] == 0): ?>
                            <a class="nav-link" href="<?php echo base_url; ?>Categorias">
                                <div class="sb-nav-link-icon"><i class="fas fa-tools fa-2x"></i></div>
                                 Categorias
                            </a>
                            <a class="nav-link" href="<?php echo base_url; ?>Medidas">
                                <div class="sb-nav-link-icon"><i class="fas fa-balance-scale-left mr2 fa-2x"></i></div>
                                 Medidas
                            </a>
                            <a class="nav-link" href="<?php echo base_url; ?>Productos">
                                <div class="sb-nav-link-icon"><i class="fab fa-product-hunt fa-2x"></i></div>
                                 Productos
                            </a>
                         <!-- <  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart fa-2x"></i></div>
                                 Entradas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url; ?>Compras"><i class="fas fa-shopping-cart mr-4 fa-2x"></i> Nueva Compra</a>
                                    <a class="nav-link" href="<?php echo base_url; ?>Compras/historial"><i class="fas fa-list mr-4 fa-2x"></i> Historial Compras</a>
                                </nav>
                                
                                
                        </div>-->
                        <?php endif; ?>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ventas" aria-expanded="false" aria-controls="ventas">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart fa-2x"></i></div>
                                 Salidas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            
                            <div class="collapse" id="ventas" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url; ?>Compras/ventas"><i class="fas fa-shopping-cart mr-4 fa-2x"></i> Nueva Venta</a>
                                    <a class="nav-link" href="<?php echo base_url; ?>Compras/historial_ventas"><i class="fas fa-list mr-4 fa-2x"></i> Historial Ventas</a>
                                </nav>
                        
                        
                    </div>
                    <a class="nav-link" href="<?php echo base_url; ?>Administracion">
                                <div class="sb-nav-link-icon"><i class="fas fa-tools fa-2x"></i></div>
                                 Configuracion
                            </a>
                            <!--<a class="nav-link" href="<?php echo base_url; ?>Backup">
                                <div class="sb-nav-link-icon"><i class="fas fa-tools fa-2x"></i></div>
                                Backup
                           </a>
                           < <a class="nav-link" href="<?php echo base_url; ?>Restaurar">
                                <div class="sb-nav-link-icon"><i class="fas fa-tools fa-2x"></i></div>
                                Restaurar BD
                            </a>-->
                            

                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid mt-2">
                        


                
