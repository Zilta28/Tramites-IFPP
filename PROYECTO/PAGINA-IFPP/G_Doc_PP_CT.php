<?php
require_once 'vendor/autoload.php'; // Ruta al archivo autoload.php de PHPWord
use PhpOffice\PhpWord\TemplateProcessor;

// Conexión a la base de datos y consulta para obtener los datos del cliente

include("conexion.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

$idSeleccionado = $_GET['id'];

$consulta = "SELECT * FROM cartaterminacionpp WHERE Id_ss = $idSeleccionado";
$resultado = mysqli_query($getconex, $consulta);

if ($fila = mysqli_fetch_assoc($resultado)) {
    $documento = new TemplateProcessor('CARTA DE TERMINACIÓN DE PRÁCTICAS PROFESIONALES.docx');

    // Rellenar los campos del documento con los datos del cliente
    $documento->setValue('n_directivo', $fila['nombreExpide']);
    $documento->setValue('c_directivo', $fila['cargoDir']);
    $documento->setValue('n_escuela', $fila['nombreEscuela']);
    $documento->setValue('nombre_estudiante', $fila['nombrePrestatario']);
    $documento->setValue('n_lic', $fila['nombreLic']);
    $documento->setValue('numero_cuenta', $fila['noCuenta']);
    $documento->setValue('area', $fila['area']);
    $documento->setValue('nombre_jefe', $fila['jefeInmediato']);
    $documento->setValue('no_hrs', $fila['horas']);
    $documento->setValue('periodopp', $fila['periodo']);

    // Guardar el documento modificado
    header('Content-Disposition: attachment; filename="Documento.docx"');
    $documento->saveAs("php://output");
} else {
    echo "No se encontraron datos para el cliente especificado.";
}

$conexion->close();
?>
