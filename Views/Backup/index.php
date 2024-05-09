<script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>
<?php include "Views/Templates/Header.php";?>
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
<ol class="breadcrumb mb-4">
     <li class="breadcrumb-item active">Crear Copia</li>
 </ol>

<a href="<?php echo base_url; ?>Config/App/Backup.php" class="btn btn-primary mb-2">Creae Copia</a>


<?php include "Views/Templates/Footer.php";?>
