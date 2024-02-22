<?php

// Configurar la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clientes";

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

// Inicializar contadores para activos e inactivos
$activos = 0;
$inactivos = 0;
$pendiente = 0;

// Crear una consulta SQL para obtener los datos de activos e inactivos
$sql = "SELECT Estado, COUNT(*) AS Total FROM t1_enero WHERE Estado IN ('Activo', 'Inactivo', 'Pendiente') GROUP BY Estado";

// Ejecutar la consulta
$result = $conn->query($sql);

// Verificar si la consulta fue exitosa
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $estado = $row["Estado"];
        $total = $row["Total"];

        // Acumular los datos en los contadores correspondientes
        if ($estado == "Activo") {
            $activos += $total;
        } elseif ($estado == "Inactivo") {
            $inactivos += $total;
        } elseif ($estado == "Pendiente") {
            $pendiente += $total;
        }
    }
}

// Crear una consulta SQL para obtener la lista de programas
$sqlProgramas = "SELECT DISTINCT Programa FROM t1_enero";
$resultProgramas = $conn->query($sqlProgramas);

// Verificar si la consulta fue exitosa
if ($resultProgramas->num_rows > 0) {
    // Almacenar los programas en un array
    $programas = [];
    while ($rowProgramas = $resultProgramas->fetch_assoc()) {
        $programas[] = $rowProgramas["Programa"];
    }
}

// Cerrar la conexión a la base de datos después de obtener todos los datos
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Gráficas de Pastel - Estado de Matrícula</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <style>
    canvas {
      max-width: 100%;
      height: auto;
    }
  </style>
</head>

<body>
<a id="flecha" href="../Php/administrador.php">
<img id="regresar" src="../img/programas/regresar.jpg" width="40px" alt="">
</a>
  <h1 style="text-align: center;">Gráfica de los programas</h1>

  <!-- Formulario para seleccionar un programa -->
  <form id="programaForm">

  
      <label for="programaSelect">Selecciona un programa:</label>
      <select id="programaSelect" name="programa">
          <?php
          // Agregar una opción adicional para ver la gráfica general
          echo "<option value='all'>Todos los Programas</option>";

          foreach ($programas as $programa) {
              echo "<option value=\"" . htmlspecialchars($programa) . "\">$programa</option>";
          }
          ?>
      </select>
      <button type="button" onclick="updateChart()">Actualizar Gráfico</button>
  </form>

  <!-- Contenedor para el gráfico -->
  <div id="chartContainer">
      <canvas id="chart" style= "width: 100%; height: 550px;"></canvas>
  </div>

  <script>
    // Obtener el contexto del lienzo de la gráfica general
    var ctx = document.getElementById("chart").getContext("2d");
    var chart;

    // Función para actualizar el gráfico al seleccionar un programa
    function updateChart() {
        // Obtener el valor seleccionado del menú desplegable
        var selectedPrograma = document.getElementById("programaSelect").value;

        // Verificar si se seleccionó la opción 'Todos los Programas'
        if (selectedPrograma === 'all') {
            // Crear una nueva consulta SQL para obtener los datos generales
            var sqlGeneral = "SELECT Estado, COUNT(*) AS Total FROM t1_enero WHERE Estado IN ('Activo', 'Inactivo', 'Pendiente') GROUP BY Estado";

            // Realizar la consulta AJAX para obtener los nuevos datos generales
            $.ajax({
                type: "POST",
                url: "graficaAjax.php",
                data: { query: sqlGeneral },
                success: function(data) {
                    try {
                        var newData = JSON.parse(data);
                        updateChartWithData(newData);
                    } catch (e) {
                        console.error("Error al procesar la respuesta AJAX: ", e);
                    }
                },
                error: function(error) {
                    console.error("Error en la consulta AJAX: ", error);
                }
            });
        } else {
            // Escapar el valor para prevenir inyecciones SQL
            selectedPrograma = selectedPrograma.replace(/['"\\]/g, "\\$&");

            // Crear una nueva consulta SQL para obtener los datos del programa seleccionado
            var sqlPrograma = "SELECT Estado, COUNT(*) AS Total FROM t1_enero WHERE Programa = '" + selectedPrograma + "' AND Estado IN ('Activo', 'Inactivo', 'Pendiente') GROUP BY Estado";

            // Realizar la consulta AJAX para obtener los nuevos datos del programa seleccionado
            $.ajax({
                type: "POST",
                url: "graficaAjax.php",
                data: { query: sqlPrograma },
                success: function(data) {
                    try {
                        var newData = JSON.parse(data);
                        updateChartWithData(newData);
                    } catch (e) {
                        console.error("Error al procesar la respuesta AJAX: ", e);
                    }
                },
                error: function(error) {
                    console.error("Error en la consulta AJAX: ", error);
                }
            });
        }
    }

    // Función para actualizar el gráfico con nuevos datos
    function updateChartWithData(newData) {
        if (chart) {
            chart.destroy(); // Destruir el gráfico anterior si existe
        }

        chart = new Chart(ctx, {
            type: "pie",
            data: {
                labels: ["Activo", "Inactivo", "Pendientes"],
                datasets: [{
                    data: [newData.Activo, newData.Inactivo, newData.Pendiente],
                    backgroundColor: ["#36A2EB", "#FF5733", "#FFFF00"]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: true
                }
            }
        });
    }
  </script>
</body>

</html>

