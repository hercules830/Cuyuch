<?php
// Verificar si la sesión no está iniciada
if (session_status() === PHP_SESSION_NONE) {
  session_start(); // Iniciar la sesión si no está iniciada

  $usuario = $_SESSION['usuario'];

  if (!isset($usuario)) {
  header("location: ../php/login.php");
  }
}

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

// Obtener la consulta SQL enviada por AJAX
$query = $_POST['query'];

// Ejecutar la consulta
$result = $conn->query($query);

// Verificar si la consulta fue exitosa
if ($result) {
    // Inicializar los valores por defecto
    $response = ['Activo' => 0, 'Inactivo' => 0, 'Pendiente' => 0];

    while ($row = $result->fetch_assoc()) {
        $estado = $row["Estado"];
        $total = $row["Total"];

        // Actualizar los valores según el estado
        if ($estado == "Activo") {
            $response['Activo'] = $total;
        } elseif ($estado == "Inactivo") {
            $response['Inactivo'] = $total;
        } elseif ($estado == "Pendiente") {
            $response['Pendiente'] = $total;
        }
    }

    echo json_encode($response);
} else {
    echo json_encode(['Activo' => 0, 'Inactivo' => 0, 'Pendiente' => 0]);
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
