<?php
include 'conectarbdD.php';

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$validar = mysqli_query($conexion, "SELECT * FROM users WHERE usuario = '$usuario' AND clave = '$clave'");

if (mysqli_num_rows(
    $validar
) > 0) {
    header('location: ../home.php');
    exit;
} else {
    echo '
        <script>
        alert("Usuario no encontrado en la base de datos");
        window.location = "../index.php";
        </script>
    ';
}
