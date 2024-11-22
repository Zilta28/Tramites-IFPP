<?php
require_once 'vendor/autoload.php'; // Ruta al archivo autoload.php de PHPWord
use PhpOffice\PhpWord\TemplateProcessor;

// Conexión a la base de datos y consulta para obtener los datos del cliente

include("conexion.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

$idSeleccionado = $_GET['id'];

$consulta = "SELECT * FROM cartapresentacionpp WHERE Id_ss = $idSeleccionado";
$resultado = mysqli_query($getconex, $consulta);

if ($fila = mysqli_fetch_assoc($resultado)) {
    $documento = new TemplateProcessor('CARTA DE ACEPTACIÓN DE PRÁCTICAS PROFESIONALES.docx');

    // Rellenar los campos del documento con los datos del cliente
    $documento->setValue('name_directivo', $fila['nameExpide']);
    $documento->setValue('cargo_direc', $fila['cargoPer']);
    $documento->setValue('name_escuela', $fila['nombreEscuela']);
    $documento->setValue('name', $fila['nombreEstudiante']);
    $documento->setValue('name_lic', $fila['carrera']);
    $documento->setValue('no_cuenta', $fila['noCuenta']);
    $documento->setValue('no_horas', $fila['numHoras']);

    // Guardar el documento modificado
    header('Content-Disposition: attachment; filename="Documento.docx"');
    $documento->saveAs("php://output");
} else {
    echo "No se encontraron datos para el cliente especificado.";
}

$conexion->close();
?>
