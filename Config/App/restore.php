<?php
include '../Config.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistemcolors";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}


$file = $_FILES['file']['tmp_name'];


if (empty($file)) {
    die("Por favor, selecciona un archivo para restaurar.");
}


$content = file_get_contents($file);


if ($conn->multi_query($content) === TRUE) {
    header('location: '.base_url.'Administracion');
            session_start();
            $_SESSION['msj'] = "Base de Datos restaurada con exito. Si no aprecia ningun cambio, cierre session y vuelva a entrar ;)";
} else {
    echo "Error al restaurar la base de datos: " . $conn->error;
}


$conn->close();
?>