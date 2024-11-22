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
    $nameExp = $_POST['nameExp'];
    $carg = $_POST['carg'];
    $nameSchool = $_POST['nameSchool'];
    $name = $_POST['name'];
    $nameCarr = $_POST['nameCarr'];
    $numC = $_POST['numC'];
    $hrs = $_POST['hrs'];

    // Insertar los datos en la tabla "datos"
    $sql = "INSERT INTO cartaaceptacionep (nombreExpide, cargoP, nombreEscuela, nombrePrestatario, nombreLic, noCuenta, horas) VALUES ('$nameExp', '$carg', $nameSchool', '$name', '$nameCarr', '$numC', '$hrs')";

    if (mysqli_query($conexion, $sql)) {
        echo 'Datos guardados correctamente.';
    } else {
        echo 'Error al guardar los datos: ' . mysqli_error($conexion);
    }

    // Cerrar la conexión con la base de datos
    mysqli_close($conexion);
}

?>