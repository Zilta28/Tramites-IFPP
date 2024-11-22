<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesone/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <title>Servicio Social</title>


</head>

<body>
    <div class="container">
        <table class="table">
            <caption> Servicio Social </caption>
            <thead>
                <tr>
                <th>ID</th>
                    <th>Directivo</th>
                    <th>Cargo</th>
                    <th>Prestatario</th>
                    <th>Escuela</th>
                    <th>Matricula</th>
                    <th>Horas a realizar</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
                // Establecer el número de registros por página
                $registrosPorPagina = 25;

                // Obtener la página actual (por defecto es la página 1)
                $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

                // Calcular el inicio de la página
                $inicio = ($pagina - 1) * $registrosPorPagina;

                // Consulta SQL con la cláusula LIMIT para obtener solo los primeros 25 registros
                $consulta = "SELECT * FROM aceptacion LIMIT $inicio, $registrosPorPagina";

                // Ejecutar la consulta y mostrar los resultados en la tabla
                include("conexion.php");
                $getmysql = new mysqlconex();
                $getconex = $getmysql->conex();

                $resultado = mysqli_query($getconex, $consulta);

                    
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td>" . $fila["Id_ss"] . "</td>";
                        echo "<td>" . $fila["directivo"] . "</td>";
                        echo "<td>" . $fila["cargo"] . "</td>";
                        echo "<td>" . $fila["prestatario"] . "</td>";
                        echo "<td>" . $fila["escuela"] . "</td>";
                        echo "<td>" . $fila["matricula"] . "</td>";
                        echo "<td>" . $fila["horas"] . "</td>";
                        
                        echo '<td><button class="btn-seleccionar" data-id="' . $fila['Id_ss'] . '"><img src="iconos/doc.svg" alt="Icono" class="icono-svg"></button><button class="btn btn-seleccionar" data-id="' . $fila['Id_ss'] . '"><img src="iconos/id.svg" alt="Icono" class="icono-svg"></button><button class="btn btn-seleccionar" data-id="' . $fila['Id_ss'] . '"><img src="iconos/lib.svg" alt="Icono" class="icono-svg"></button></td>';
    
                    echo '</tr>';
                    }
                
                    //Consulta SQL para obtener el número total de registros
                    $consultaTotal = "SELECT COUNT(*) as total FROM aceptacion";
                    $resultadoTotal = mysqli_query($getconex, $consultaTotal);
                    $filaTotal = mysqli_fetch_assoc($resultadoTotal);
                    $totalRegistros = $filaTotal['total'];

                    mysqli_close($getconex);

                    // Calcular el número total de páginas
                    $totalPaginas = ceil($totalRegistros / $registrosPorPagina);

                    // Mostrar los enlaces de paginación
                    for ($i = 1; $i <= $totalPaginas; $i++) {
                        echo "<a href='?pagina=$i'>$i</a> ";
                    }
                ?>


        </table>
    </div>
    <script>
  // Obtener todos los botones o enlaces de selección
  var botonesSeleccionar = document.querySelectorAll('.btn-seleccionar');

  // Agregar un controlador de eventos a cada botón o enlace
  botonesSeleccionar.forEach(function (boton) {
    boton.addEventListener('click', function () {
      // Obtener el ID de la fila seleccionada
      var idSeleccionado = this.getAttribute('data-id');

      // Redirigir a la página PHP para crear el documento Word
      window.location.href = 'G_Doc.php?id=' + idSeleccionado;
    });
  });
</script>


</body>
</html>