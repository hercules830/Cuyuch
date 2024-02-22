<?php
// Se verifica si el usuario ya ha iniciado sesión
if (isset($_SESSION['usuarioRestringido'])) {
	header('Location: fichaBallet.php');
}

// Se verifica si se ha enviado el formulario
if (isset($_POST['submitRes'])) {
	// Se obtienen los datos ingresados por el usuario
	$usuario = $_POST['usuarioRestringido'];
	$contraseña = $_POST['contraseñaRestringido'];

	// Se conecta a la base de datos
	$conexion = mysqli_connect('localhost', 'root', '', 'usuarios');

	// Se verifica si el usuario y la contraseña son correctos
	$consulta = "SELECT * FROM usuarios_nuevos WHERE usuarioRestringido = '$usuario' AND contraseñaRestringido = '$contraseña'";
	$resultado = mysqli_query($conexion, $consulta);

	if (mysqli_num_rows($resultado) == 1) {
		// Si los datos son correctos, se crea una sesión y se redirige al usuario a la página de inicio
		$_SESSION['usuarioRestringido'] = $usuario;
		header('Location: cuyuch.php');
	} else {
		// Si los datos son incorrectos, se muestra un mensaje de error
		echo "El usuario o la contraseña son incorrectos.";
	}

	// Se cierra la conexión a la base de datos
	mysqli_close($conexion);
}
?>