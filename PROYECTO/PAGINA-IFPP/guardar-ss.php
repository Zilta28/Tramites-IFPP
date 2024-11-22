<?php
$host = 'localhost';
$usuario = 'root';
$password = '';
$base_datos = 'pagina_ifpp';

// Crea la conexión
$conn = mysqli_connect($host, $usuario, $password, $base_datos);
// Verifica la conexión
if (!$conn) {
  die("La conexión falló: " . mysqli_connect_error());
}
// Procesar los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $directivo = $_POST['directivo'];
  $cargo = $_POST['cargo'];
  $escuela = $_POST['escuela'];
  $prestatario = $_POST['prestatario'];
  $carrera = $_POST['carrera'];
  $matricula = $_POST['matricula'];
  $horas = $_POST['horas'];
  // Insertar los datos en la tabla "datos"
  $sql = "INSERT INTO aceptacion (directivo, cargo, escuela, prestatario, carrera, matricula, horas) VALUES ('$directivo', $cargo, '$escuela', '$prestatario', '$carrera', '$matricula', $horas)";

  if (mysqli_query($conn, $sql)) {
    echo 'Datos guardados correctamente.';
} else {
    echo 'Error al guardar los datos: ' . mysqli_error($conn);
}

// Cerrar la conexión con la base de datos
mysqli_close($conn);
}

?>