<?php
session_start();
$usuario = $_SESSION['usuario'];

if (!isset($usuario)) {
    header("location: ../php/login.php");
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clientes";  // Nombre de la base de datos

// Inicializar el arreglo para almacenar el historial
$historial = array();

// Verificar si se ha enviado una búsqueda
if (isset($_GET['cedula_busqueda'])) {
    // Crear una conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión a la base de datos
    if ($conn->connect_error) {
        die("Conexión fallida a la base de datos: " . $conn->connect_error);
    }

    // Obtener la cédula buscada
    $cedulaBusqueda = $_GET['cedula_busqueda'];

    // Definir los meses
    $meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];

    // Consulta SQL para obtener datos de la tabla en la base de datos "clientes"
    $sql = "SELECT Año, Nombre, Programa, Ingreso, Fecha, Mensualidad, MONTHNAME(Fecha) AS Mes FROM (";
    for ($i = 0; $i < count($meses); $i++) {
        $mes = $meses[$i];
        $sql .= "SELECT Año, Nombre, Programa, Ingreso, Fecha, Mensualidad, '$mes' AS Mes FROM t" . ($i + 1) . "_$mes WHERE Cédula = '$cedulaBusqueda' AND Mensualidad IS NOT NULL";
        if ($i < count($meses) - 1) {
            $sql .= " UNION ALL ";
        }
    }
    $sql .= ") AS union_table ORDER BY FIELD(Mes, '" . implode("','", $meses) . "')";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $mes = $row['Mes'];
            unset($row['Mes']); // Elimina la columna Mes de los datos recuperados
            $historial[$mes][] = $row;
        }
    }

    // Cierra la conexión a la base de datos
    $conn->close();
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Historial de información</title>

    <style>
        /* Agrega tus estilos según sea necesario */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        #historial-container {
            margin-top: 20px;
        }

        #mensaje-no-encontrado {
            display: none;
            color: red;
            font-weight: bold;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>

</head>

<body>

    <a id="flecha" href="../Php/administrador.php">
        <img id="regresar" src="../img/programas/regresar.jpg" width="40px" alt="">
    </a>
    <br>
    <button name="export" onclick="exportToExcel()">Exportar a Excel</button>

    <!-- Tu formulario de búsqueda aquí -->
    <form method="GET">
        <label for="cedula_busqueda">Cédula:</label>
        <input type="text" id="cedula_busqueda" name="cedula_busqueda" placeholder="Ingrese el No. de cédula">
        <input type="submit" value="Buscar">
    </form>

    <!-- Muestra el historial del cliente si se ha encontrado -->
    <div id="historial-container">
        <?php
        if (!empty($historial)) {
            foreach ($historial as $mes => $datos) {
                // Verificar si hay datos de mensualidad para este mes
                $mensualidadesPresentes = false;
                foreach ($datos as $dato) {
                    if (!empty($dato['Mensualidad'])) {
                        $mensualidadesPresentes = true;
                        break;
                    }
                }

                // Si hay datos de mensualidad, mostrar la tabla
                if ($mensualidadesPresentes) {
                    echo "<h2>Historial para $mes</h2>";
                    echo "<table id='historial-table'>";
                    echo "<thead>
                    <tr>
                    <th>Año</th>
                    <th>Nombre del Alumno</th>
                    <th>Programa</th>
                    <th>Fecha de pago</th>
                    <th>Mes pagado</th>
                    <th>Mensualidad</th>
                    </tr>
                    </thead>";
                    echo "<tbody>";
                    foreach ($datos as $dato) {
                        if (!empty($dato['Mensualidad'])) {
                            echo "<tr>";
                            echo "<td>{$dato['Año']}</td>";
                            echo "<td>{$dato['Nombre']}</td>";
                            echo "<td>{$dato['Programa']}</td>";
                            echo "<td>{$dato['Fecha']}</td>";
                            echo "<td>{$mes}</td>";
                            echo "<td>{$dato['Mensualidad']}</td>";
                            echo "</tr>";
                        }
                    }
                    echo "</tbody></table>";
                }
            }
        } else {
            echo "<p id='mensaje-no-encontrado'>Cliente no encontrado.</p>";
        }
        ?>
    </div>

    <script>
        function exportToExcel() {
            var wb = XLSX.utils.book_new();
            var ws = XLSX.utils.table_to_sheet(document.getElementById('historial-table'));

            // Filtrar las filas visibles y crear una nueva hoja con ellas
            var filteredRows = Array.from(document.querySelectorAll('#historial-table tbody tr')).filter(function (row) {
                return row.style.display !== 'none';
            });
            var filteredTable = document.createElement('table');
            filteredTable.appendChild(document.querySelector('#historial-table thead').cloneNode(true));
            var filteredTbody = document.createElement('tbody');

            filteredRows.forEach(function (row) {
                filteredTbody.appendChild(row.cloneNode(true));
            });

            filteredTable.appendChild(filteredTbody);

            var filteredWs = XLSX.utils.table_to_sheet(filteredTable);
            XLSX.utils.book_append_sheet(wb, filteredWs, 'Hoja1');
            XLSX.writeFile(wb, 'Tabla_de_informacion.xlsx');
        }
    </script>

</body>

</html>