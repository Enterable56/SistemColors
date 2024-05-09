<?php include "Views/Templates/Header.php";?>
<div class="row d-flex justify-content-between">
    <!-- Usuarios -->
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary">
            <div class="card-body d-flex text-white">
                Usuarios
                <i class="fas fa-user fa-2x ml-auto"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between ">
                <a href="<?php echo base_url; ?>Usuarios" class="text-white">Ver detalle</a>
                <span class="text-white"><?php echo $data['usuarios']['total'] ?></span>
            </div>
        </div>
    </div>
    <!-- Clientes -->
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success">
            <div class="card-body d-flex text-white">
                Clientes
                <i class="fas fa-users fa-2x ml-auto"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between ">
                <a href="<?php echo base_url; ?>Clientes" class="text-white">Ver detalle</a>
                <span class="text-white"><?php echo $data['clientes']['total'] ?></span>
            </div>
        </div>
    </div>
    <!-- Productos -->
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger">
            <div class="card-body d-flex text-white">
                Productos
                <i class="fab fa-product-hunt fa-2x ml-auto"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between ">
                <a href="<?php echo base_url; ?>Productos" class="text-white">Ver detalle</a>
                <span class="text-white"><?php echo $data['productos']['total'] ?></span>
            </div>
        </div>
    </div>
</div>
<div class="row mt-2 mb-3 d-flex">
    <!--
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Stock minimo
                
            </div>
            <div class="card-body">
            <canvas id="stock"></canvas>
            </div>
        </div>
    </div>-->
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Productos mas vendidos
            </div>
            <div class="card-body">
            <canvas id="masVendido"></canvas>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/Footer.php";?>