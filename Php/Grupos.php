<?php
// Verificar si la sesión no está iniciada
if (session_status() === PHP_SESSION_NONE) {
  session_start(); // Iniciar la sesión si no está iniciada

  $usuario = $_SESSION['usuario'];

  if (!isset($usuario)) {
  header("location: ../php/login.php");
  }
}



// Conexión a la base de datos (ajusta estos valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$database = "clientes";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Función para buscar el número de grupo en las tablas y seleccionar el más reciente para cada cliente
function buscarGrupo($conn, $numero_grupo) {
    $clientes = array();
    $clientes_procesados = array();

    // Consultar el año más reciente para cada cliente
    $query = "SELECT Cédula, MAX(Año) AS AñoReciente
              FROM (";
    for ($i = 12; $i >= 1; $i--) {
        $nombreMes = obtenerNombreMes($i);
        $tabla = "t" . $i . "_" . $nombreMes;

        $query .= "SELECT Cédula, Año FROM $tabla WHERE Grupo = '$numero_grupo' UNION ";
    }
    // Eliminar la última "UNION" del string
    $query = rtrim($query, "UNION ");
    $query .= ") AS TodasLasTablas
              GROUP BY Cédula";

    $result = $conn->query($query);
    
    if ($result !== false && $result->num_rows > 0) {
        while ($fila = $result->fetch_assoc()) {
            $cedula = $fila['Cédula'];
            $añoReciente = $fila['AñoReciente'];

            // Ahora, para cada cliente, buscar el registro más reciente
            for ($i = 12; $i >= 1; $i--) {
                $nombreMes = obtenerNombreMes($i);
                $tabla = "t" . $i . "_" . $nombreMes;

                $query = "SELECT Nombre, Cédula, Grupo, Programa, Año, Ingreso, Estado, '$nombreMes' AS MesEnGrupo
                          FROM $tabla
                          WHERE Grupo = '$numero_grupo' AND Cédula = '$cedula' AND Año = $añoReciente
                          ORDER BY Ingreso DESC
                          LIMIT 1";

                $resultRegistro = $conn->query($query);
                if ($resultRegistro !== false && $resultRegistro->num_rows > 0) {
                    $cliente_actual = $resultRegistro->fetch_assoc();

                    if (!isset($clientes_procesados[$cliente_actual['Cédula']])) {
                        $clientes[] = $cliente_actual;
                        $clientes_procesados[$cliente_actual['Cédula']] = true;
                    }
                }
            }
        }
    }

    return $clientes;
}

// Función para obtener el nombre del mes
function obtenerNombreMes($numeroMes)
{
    $meses = array(
        1 => "enero",
        2 => "febrero",
        3 => "marzo",
        4 => "abril",
        5 => "mayo",
        6 => "junio",
        7 => "julio",
        8 => "agosto",
        9 => "septiembre",
        10 => "octubre",
        11 => "noviembre",
        12 => "diciembre"
    );

    return $meses[$numeroMes];
}

// Inicializar el número de grupo
$numero_grupo = '';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el número de grupo desde el formulario
    $numero_grupo_input = $_POST["numero_grupo"];

    // Validar y agregar el numeral si es necesario
    if (!empty($numero_grupo_input)) {
        $numero_grupo = '#' . $numero_grupo_input;
    }
}

// Mostrar el formulario para ingresar el número de grupo
echo '<a id="flecha" href="../Php/administrador.php">
<img id="regresar" src="../img/programas/regresar.jpg" width="40px" alt="">
</a>';
echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
        Número de Grupo: <input type="text" name="numero_grupo">
        <input type="submit" value="Buscar">
      </form>';

// Mostrar los resultados en una tabla HTML
if (!empty($numero_grupo)) {
    $clientes = buscarGrupo($conn, $numero_grupo);

    if (!empty($clientes)) {
        // Agregar estilos para centrar la tabla
        echo '<div style="text-align: center;">';
        echo '<table border="1" style="margin: 0 auto;">';
        echo '<tr>
                <th>No.</th>
                <th>Nombre</th>
                <th>Cédula</th>
                <th>Grupo</th>
                <th>Programa</th>
                <th>Año</th>
                <th>Ingreso</th>
                <th>Estado</th>
                <th>Mes en Grupo</th>
              </tr>';

        $contador = 1;
        foreach ($clientes as $row) {
            echo '<tr>';
            echo '<td>' . $contador . '</td>';
            echo '<td>' . $row['Nombre'] . '</td>';
            echo '<td>' . $row['Cédula'] . '</td>';
            echo '<td>' . $row['Grupo'] . '</td>';
            echo '<td>' . $row['Programa'] . '</td>';
            echo '<td>' . $row['Año'] . '</td>';
            echo '<td>' . $row['Ingreso'] . '</td>';
            echo '<td>' . $row['Estado'] . '</td>';
            echo '<td>' . $row['MesEnGrupo'] . '</td>';
            echo '</tr>';
            $contador++;
        }

        echo '</table>';
        echo '</div>';
    } else {
        echo 'No se encontraron resultados.';
    }
}

// Cerrar conexión
$conn->close();

