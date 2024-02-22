<?php
session_start();
$usuario = $_SESSION['usuario'];

if (!isset($usuario)) {
	header("location: ../php/login.php");
}

// Función para cambiar el estado de la opción Administrador
function cambiarEstadoAdmin()
{
	// Aquí puedes agregar la lógica para cambiar el estado de la opción Administrador en la base de datos o en cualquier otro lugar
	// Por ejemplo, podrías establecer el estado en una cookie sin fecha de vencimiento
	$admin_disabled = isset($_COOKIE['admin_disabled']) ? !$_COOKIE['admin_disabled'] : true;
	setcookie('admin_disabled', $admin_disabled, 0, "/"); // Cookie sin fecha de vencimiento
}

// Verificar si se ha enviado una solicitud para cambiar el estado de la opción Administrador
if (isset($_POST['cambiar_estado_admin'])) {
	cambiarEstadoAdmin();
}


?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Extracurriculares Cuyuch</title>
	<link rel="stylesheet" href="../css/pagina_principal.css">

	<style type="text/css">
		/* Reset de estilos */
		body,
		h1,
		h2,
		h3,
		h4,
		h5,
		h6,
		p,
		ul,
		li,
		a,
		button {
			margin: 0;
			padding: 0;
		}

		/* Estilos del encabezado */
		header {
			background-color: #005dff;
			color: #fff;
			text-align: center;
			padding: 2em;
		}

		h1 {
			font-size: 3em;
			margin-bottom: 0.5em;
		}

		/* Estilos del menú de navegación */
		nav {
			background-color: #333;
		}

		nav ul {
			list-style: none;
			margin: 0;
			padding: 0;
			position: relative;
			z-index: 1;
		}

		nav li {
			display: inline-block;
			position: relative;
			background-color: #333;
			transition: background-color 0.3s ease-in-out;
		}

		nav li:hover {
			background-color: #555;
		}

		nav ul li a {
			display: block;
			padding: 1em;
			text-decoration: none;
			white-space: nowrap;
			color: #fff;
		}

		nav ul ul {
			display: none;
			position: absolute;
			top: 100%;
			left: 0;
			background-color: #555;
			min-width: 200px;
			opacity: 0;
			visibility: hidden;
			transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
			transform: translateY(10px);
		}

		nav ul ul li {
			position: relative;
		}

		nav ul ul li a {
			padding: 10px;
			color: #fff;
		}

		nav ul li:hover>ul {
			display: inherit;
			opacity: 1;
			visibility: visible;
			transform: translateY(0);
		}

		nav a:active,
		nav a:focus {
			background-color: #aaa;
			color: #fff;
		}

		/* Estilos del contenido principal */
		main {
			margin-top: 2rem;
			text-align: center;
		}

		p {
			font-size: 1.2em;
			margin-bottom: 1em;
		}

		/* Estilos del botón de exportar a Excel */
		form {
			text-align: center;
		}

		button {
			background-color: #005dff;
			color: #fff;
			border: none;
			padding: 1em 2em;
			font-size: 1em;
			cursor: pointer;
			transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
		}

		button:hover {
			background-color: #3d7dff;
			transform: scale(1.05);
		}

		button:active {
			transform: scale(0.95);
		}
	</style>
	<!-- Asegúrate de incluir jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
	<header>
		<h1>Extracurriculares Cuyuch</h1>
	</header>
	<nav>
		<ul>
			<li><a href="#">Todas las Matrículas</a>
				<ul>
					<li><a href="../Php/fichaProgramas.php">Ingresar</a></li>
					<li><a href="#">Modificar</a></li>
					<li><a href="#">Eliminar</a></li>
				</ul>
			</li>
			<li><a href="../Php/Grupos.php">Grupos</a>
				<ul>
					<!-- Agrega más opciones de clases aquí -->
				</ul>
			</li>
			<li><a href="secciones_eventos.php">Eventos</a>
				<ul>
					<li><a href="registrar_evento.php">Crear Evento</a></li>
					<li><a href="modificar_evento.php">Modificar Evento</a></li>
					<li><a href="#">Eliminar Evento</a></li>
				</ul>
			</li>
			<li><a href="#">Asistencia</a>
				<ul>
					<li><a href="asistencia_alumno.php">Registrar Asistencia</a></li>
					<li><a href="#">Modificar Asistencia</a></li>
					<li><a href="#">Eliminar Asistencia</a></li>
				</ul>
			</li>
			<li><a href="tabla_info.php">Estadísticas</a>
				<ul>
					<li><a href="grafica.php">Gráfica de clientes</a></li>
					<li><a href="reporteIndividual.php">Generar reporte individual</a></li>
				</ul>
			</li>
			<!-- <li>

				<form action="actualizarClientes.php">
					<button type="submit">Actualizar clientes</button>
				</form>

			</li> -->
			<li><a href="#">Configuración</a>
				<ul>
					<li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
					<li><button id="matriculaGratis" onclick="showLoginForm()">Clave maestra</button></li>
					<li>
						<form id="loginForm" action="">


							<?php
							// Comprobar si el usuario ha iniciado sesión y tiene un rol definido
							if (isset($_SESSION['usuario']) && isset($_SESSION['rol'])) {


								if ($_SESSION['rol'] === 'Administrador') {
									echo '<label for="nuevaClave">Ingrese la nueva clave maestra:</label>';
									echo '<input type="password" id="nuevaClave" />';
									echo '<input type="submit" value="Guardar" onclick="crearClaveMaestra(event)" />';
								}
							}
							?>

							<button type="button" onclick="ocultarFormulario()">Cerrar</button>
						</form>
					</li>
					<form method="post">
						<button type="submit" name="cambiar_estado_admin">Cambiar Estado Administrador</button>
					</form>



				</ul>

			</li>
		</ul>
	</nav>
	<main>
		<p>Bienvenido a Extracurriculares Cuyuch. Aquí podrás administrar las matrículas, clases, eventos, asistencia y
			estadísticas de los estudiantes que participan en actividades extracurriculares. Utiliza el menú de
			navegación para acceder a las diferentes funcionalidades del sistema.</p>
	</main>


	<script src="../js/matriculaGratis.js"></script>


</body>

</html>