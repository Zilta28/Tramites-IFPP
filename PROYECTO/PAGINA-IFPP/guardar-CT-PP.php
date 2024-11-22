<?php

// Establecer la conexión con la base de datos MySQL
$host = 'localhost';
$usuario = 'root';
$password = '';
$base_datos = 'pagina_ifpp';

$conexion = mysqli_connect($host, $usuario, $password, $base_datos);

// Comprobar si la conexión ha sido exitosa
if (!$conexion) {
    die('Error de conexión: ' . mysqli_connect_error());
}

// Procesar los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombreExpide = $_POST['nombreExpide'];
    $crg = $_POST['cargoDir'];
    $nameEsc = $_POST['nameEsc'];
    $nameAlum = $_POST['nameAlum'];
    $nameLic = $_POST['nameLic'];
    $noCuenta = $_POST['noCuenta'];
    $area = $_POST['area'];
    $jefe = $_POST['jefe'];
    $hr = $_POST['hr'];
    $periodo = $_POST['periodo'];

    // Insertar los datos en la tabla "datos"
    $sql = "INSERT INTO cartaterminacionpp (nombreExpide, cargoDir, nombreEscuela, nombrePrestatario, nombreLic, noCuenta, area, jefeInmediato, horas, periodo) VALUES ('$nombreExpide','$crg', '$nameEsc', '$nameAlum', '$nameLic', '$noCuenta', '$area', '$jefe', '$hr', '$periodo')";

    if (mysqli_query($conexion, $sql)) {
        echo 'Datos guardados correctamente.';
    } else {
        echo 'Error al guardar los datos: ' . mysqli_error($conexion);
    }

    // Cerrar la conexión con la base de datos
    mysqli_close($conexion);
}

?>