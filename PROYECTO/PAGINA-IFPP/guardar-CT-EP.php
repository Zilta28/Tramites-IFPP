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
    $nameExpide = $_POST['nameExpide'];
    $cargoo = $_POST['cargoo'];
    $nomEsc = $_POST['nomEsc'];
    $nomAlum = $_POST['nomAlum'];
    $Lic = $_POST['Lic'];
    $numeroC = $_POST['numeroC'];
    $cons = $_POST['cons'];
    $ar = $_POST['ar'];
    $jefein = $_POST['jefein'];
    $nhr = $_POST['nhr'];
    $per = $_POST['per'];

    // Insertar los datos en la tabla "datos"
    $sql = "INSERT INTO cartaterminacionep (nombreExpide, nameCargo, nombreEscuela, nombrePrestatario, nombreLic, noCuenta, presto, area, jefeInmediato, noHoras, periodo) VALUES ('$nameExpide', '$cargoo', $nomEsc', '$nomAlum', '$Lic', '$numeroC', '$cons', '$ar', '$jefein', '$nhr', '$per')";

    if (mysqli_query($conexion, $sql)) {
        echo 'Datos guardados correctamente.';
    } else {
        echo 'Error al guardar los datos: ' . mysqli_error($conexion);
    }

    // Cerrar la conexión con la base de datos
    mysqli_close($conexion);
}

?>