<?php

// Conexión a la base de datos (ajusta estos valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clientes";

while (true) {
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    // Consulta SQL para obtener datos de la tabla en la base de datos "clientes"
    $meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];

    for ($i = 0; $i < count($meses); $i++) {
        $mes = $meses[$i];
        $sql = "SELECT Nombre, Ingreso, Mensualidad FROM t" . ($i + 1) . "_$mes";  // Selecciona explícitamente las columnas necesarias
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Recorrer los resultados
            while ($row = $result->fetch_assoc()) {
                $fechaIngreso = strtotime($row['Ingreso']);

                // Calcular la fecha del siguiente mes
                $fechaSiguienteMes = strtotime('+1 month', $fechaIngreso);
                $fechaSiguienteMesFormat = date('m/d/Y', $fechaSiguienteMes);

                // Verificar si hay un valor en la columna Mensualidad
                if (empty($row['Mensualidad'])) {
                    // Actualizar la columna Estado a Pendiente
                    $updateSql = "UPDATE t" . ($i + 1) . "_$mes SET Estado = 'Pendiente' WHERE Nombre = '" . $row['Nombre'] . "'";
                    $conn->query($updateSql);

                    // Puedes realizar otras acciones aquí si es necesario

                    echo "Cliente Nombre " . $row['Nombre'] . " en t" . ($i + 1) . "_$mes actualizado a Pendiente.\n";
                } else {
                    echo "Cliente Nombre " . $row['Nombre'] . " en t" . ($i + 1) . "_$mes tiene Mensualidad, no se requiere actualización.\n";
                }

            }
        } else {
            echo "No se encontraron registros en la tabla t" . ($i + 1) . "_$mes.\n";
        }
    }

    // Cerrar la conexión
    $conn->close();

    // Esperar antes de la próxima iteración (ajusta según tus necesidades)
    sleep(3600); // Espera 1 hora antes de la próxima iteración
}
