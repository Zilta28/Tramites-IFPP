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
    $nombreExp = $_POST['nombreExp'];
    $nombreEsc = $_POST['nombreEsc'];
    $nombreAlum = $_POST['nombreAlum'];
    $carr = $_POST['carr'];
    $insEdu = $_POST['insEdu'];
    $noC = $_POST['noC'];
    $noHoras = $_POST['noHoras'];

    // Insertar los datos en la tabla "datos"
    $sql = "INSERT INTO cartapresentacionpp (nombreExpide, nombreEscuela, nombreEstudiante, carrera, institucionEdu, noCuenta) VALUES ('$nombreExp', '$nombreEsc', '$nombreAlum', '$carr', '$insEdu', '$noC', '$noHoras)";

    if (mysqli_query($conexion, $sql)) {
        echo 'Datos guardados correctamente.';
    } else {
        echo 'Error al guardar los datos: ' . mysqli_error($conexion);
    }

    // Cerrar la conexión con la base de datos
    mysqli_close($conexion);
}

?>