<?php
session_start();
require('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    // Utilizamos BINARY para que la comparación sea sensible a mayúsculas y minúsculas.
    $query = "SELECT id_cargo, contraseña FROM usuarios WHERE BINARY usuario = ?";
    $consulta = $conectar->prepare($query);
    $consulta->bind_param("s", $usuario);
    $consulta->execute();
    $consulta->store_result();

    if ($consulta->num_rows > 0) {
        $consulta->bind_result($id_cargo, $contraseña_hashed);
        $consulta->fetch();

        if (password_verify($contraseña, $contraseña_hashed)) {
            // Contraseña válida, permitir el inicio de sesión
            $_SESSION['usuario'] = $usuario;

            if ($id_cargo == 1) {
                $_SESSION['rol'] = 'Administrador';
                header("location: ../Php/administrador.php");
                exit();
            } elseif ($id_cargo == 2) {
                $_SESSION['rol'] = 'Usuario';
                header("location: ../Php/fichaProgramas.php");
                exit();
            }
        }
    }

    // Si el inicio de sesión falla, muestra un mensaje de error.
    ?>
    <script>
        alert("Usuario o contraseña incorrectos. Por favor, inténtalo de nuevo.");
        window.location.href = "../Php/login.php";
    </script>
    <?php
}

// Cierre de la conexión
$consulta->close();
$conectar->close();
?>
