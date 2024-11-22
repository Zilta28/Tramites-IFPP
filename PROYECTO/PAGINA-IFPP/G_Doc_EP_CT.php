<?php
require_once 'vendor/autoload.php'; // Ruta al archivo autoload.php de PHPWord
use PhpOffice\PhpWord\TemplateProcessor;

// Conexión a la base de datos y consulta para obtener los datos del cliente

include("conexion.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

$idSeleccionado = $_GET['id'];

$consulta = "SELECT * FROM cartaterminacionep WHERE Id_ss = $idSeleccionado";
$resultado = mysqli_query($getconex, $consulta);

if ($fila = mysqli_fetch_assoc($resultado)) {
    $documento = new TemplateProcessor('CARTA DE TERMINACIÓN DE ESTADÍA PROFESIONAL.docx');

    // Rellenar los campos del documento con los datos del cliente
    $documento->setValue('name_directivo', $fila['nombreExpide']);
    $documento->setValue('carg_directivo', $fila['nameCargo']);
    $documento->setValue('name_escuela', $fila['nombreEscuela']);
    $documento->setValue('name_estudiante', $fila['nombrePrestatario']);
    $documento->setValue('na_lic', $fila['nombreLic']);
    $documento->setValue('number_account', $fila['noCuenta']);
    $documento->setValue('aep', $fila['area']);
    $documento->setValue('name_jefe', $fila['jefeInmediato']);
    $documento->setValue('number_hrs', $fila['noHoras']);
    $documento->setValue('periodoep', $fila['periodo']);

    // Guardar el documento modificado
    header('Content-Disposition: attachment; filename="Documento.docx"');
    $documento->saveAs("php://output");
} else {
    echo "No se encontraron datos para el cliente especificado.";
}

$conexion->close();
?>