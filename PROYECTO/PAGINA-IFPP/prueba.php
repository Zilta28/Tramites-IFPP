<?php
require_once 'vendor/autoload.php'; // Ruta al archivo autoload.php de PHPWord
use PhpOffice\PhpWord\TemplateProcessor;

// Conexión a la base de datos y consulta para obtener los datos del cliente

include("conexion.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

$idSeleccionado = $_GET['id'];

$consulta = "SELECT * FROM aceptacion WHERE Id_ss = $idSeleccionado";
$resultado = mysqli_query($getconex, $consulta);

if ($fila = mysqli_fetch_assoc($resultado)) {
    $documento = new TemplateProcessor('CARTA DE ACEPTACIÓN DE SERVICIO SOCIAL.docx');

    // Rellenar los campos del documento con los datos del cliente
    $documento->setValue('nombre_directivo', $fila['directivo']);
    $documento->setValue('cargo_directivo', $fila['cargo']);
    $documento->setValue('n_escuela', $fila['escuela']);
    $documento->setValue('n_prestatario', $fila['prestatario']);
    $documento->setValue('n_carrera', $fila['carrera']);
    $documento->setValue('matricula', $fila['matricula']);
    $documento->setValue('nom_horas', $fila['horas']);

    // Guardar el documento modificado
    header('Content-Disposition: attachment; filename="Documento.docx"');
    $documento->saveAs("php://output");
} else {
    echo "No se encontraron datos para el cliente especificado.";
}

$conexion->close();
?>
