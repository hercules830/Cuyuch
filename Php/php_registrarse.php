<?php
// incluir archivo externo
include('db.php'); // Asegúrate de que db.php contiene la configuración de la conexión a la base de datos

// Obtener datos del formulario (asegúrate de validar y limpiar estos datos)
$rol = $_POST['rol'];
$nombre = mysqli_real_escape_string($conectar, $_POST['nombre']);
$apellidos = mysqli_real_escape_string($conectar, $_POST['apellidos']);
$email = mysqli_real_escape_string($conectar, $_POST['email']);
$usuario = mysqli_real_escape_string($conectar, $_POST['usuario']);
$contraseña = $_POST['contraseña'];
if ($rol === 'Administrador') {
    $id_cargo = 1;
} else {
    $id_cargo = 2;
} // Asignar valores a id_cargo según el rol

// Verificar si el usuario ya existe en la base de datos (sensible a mayúsculas y minúsculas)
$sql_verificar_usuario = "SELECT COUNT(*) AS total FROM usuarios WHERE BINARY usuario = ? OR BINARY email = ?";
$stmt_verificar_usuario = $conectar->prepare($sql_verificar_usuario);
$stmt_verificar_usuario->bind_param("ss", $usuario, $email);
$stmt_verificar_usuario->execute();
$result_verificar_usuario = $stmt_verificar_usuario->get_result();
$row_verificar_usuario = $result_verificar_usuario->fetch_assoc();

if ($row_verificar_usuario['total'] > 0) {
    // El usuario o correo electrónico ya existe, puedes mostrar un mensaje de error o redirigir al formulario de registro nuevamente
    // Por ejemplo:
?>
    <script>
        alert("El usuario o correo electrónico ya existe, por favor elige otro.");
        window.location.href = "../Php/registrarse.php";
    </script>
    <?php
} else {
    // Almacenamiento seguro de la contraseña
    $contraseña_hashed = password_hash($contraseña, PASSWORD_BCRYPT);

    // Consulta SQL con la contraseña encriptada
    $sql = "INSERT INTO usuarios (rol, nombre, apellidos, email, usuario, contraseña, id_cargo) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conectar->prepare($sql);
    $stmt->bind_param("ssssssi", $rol, $nombre, $apellidos, $email, $usuario, $contraseña_hashed, $id_cargo);
    $result = $stmt->execute();

    if ($result) {
    ?>
        <script>
            alert("El usuario se ha registrado correctamente.");
            window.location.href = "../Php/login.php";
        </script>
    <?php
    } else {
        // Manejar el caso en que la inserción en la base de datos falle
    ?>
        <script>
            alert("Error al registrar usuario. Por favor, inténtalo de nuevo.");
            window.location.href = "../Php/registrarse.php";
        </script>
<?php
    }
}

// Cierre de la conexión
$stmt_verificar_usuario->close();
$stmt->close();
$conectar->close();
?>