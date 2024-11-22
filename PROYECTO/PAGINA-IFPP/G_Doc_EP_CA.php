<?php
require_once 'vendor/autoload.php'; // Ruta al archivo autoload.php de PHPWord
use PhpOffice\PhpWord\TemplateProcessor;

// Conexión a la base de datos y consulta para obtener los datos del cliente

include("conexion.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

$idSeleccionado = $_GET['id'];

$consulta = "SELECT * FROM cartaaceptacionep WHERE Id_ss = $idSeleccionado";
$resultado = mysqli_query($getconex, $consulta);

if ($fila = mysqli_fetch_assoc($resultado)) {
    $documento = new TemplateProcessor('CARTA DE ACEPTACIÓN DE ESTADÍA PROFESIONAL.docx');

    // Rellenar los campos del documento con los datos del cliente
    $documento->setValue('nom_directivo', $fila['nameExpide']);
    $documento->setValue('crg_direc', $fila['cargoP']);
    $documento->setValue('nom_school', $fila['nombreEscuela']);
    $documento->setValue('nom_prestatario', $fila['nombrePrestatario']);
    $documento->setValue('nom_lic', $fila['nomLic']);
    $documento->setValue('no_cuen', $fila['noCuenta']);
    $documento->setValue('hrs', $fila['horas']);

    // Guardar el documento modificado
    header('Content-Disposition: attachment; filename="Documento.docx"');
    $documento->saveAs("php://output");
} else {
    echo "No se encontraron datos para el cliente especificado.";
}

$conexion->close();
?>
