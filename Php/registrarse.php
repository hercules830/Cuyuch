<?php
session_start();


// Verificar si la cookie está establecida
$adminDisabled = isset($_COOKIE['admin_disabled']) && $_COOKIE['admin_disabled'];



?>



<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/clases_generales.css">
  <link rel="stylesheet" type="text/css" href="../css/principal.css">
  <link rel="stylesheet" type="text/css" href="../css/login.css">
  <link rel="stylesheet" href="../css/registrarse.css">
  <link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
  <title>Nuevo Usuario</title>
</head>

<body class="flex flex--centrarh flex--centrarv">

  <form name="form" action="php_registrarse.php" method="post" class="Nuevo Usuario flex flex--centrarh flex--centrarv">
    <div class="login flex flex--centrarh">

      <div class="login-form flex flex--centrarh flex--centrarv izq-der">
        <div>
          <h2><strong>Crear una cuenta</strong></h2>
          <img src="../img/principal/usuario.png" width="30px" alt="">
          <h2>Regístrate para continuar</h2>

          <label for="mostrarForm">Ser administrador:</label>
          <input type="checkbox" id="mostrarForm" onclick="mostrarFormulario()">

          <br>

          <label for="rol">Rol:</label>
          <select id="rol" name="rol">
            <option value="Usuario">Usuario</option>
            <option id="serAdmin" value="Administrador" <?php if ($adminDisabled) echo 'disabled'; ?>>Administrador</option>

          </select>






          <input type="text" minlength="10" maxlength="50" name="nombre" id="Nombre" placeholder="Nombre"
            required /><br>

          <input type="text" maxlength="50" name="apellidos" id="Apellidos" placeholder="Apellidos" required />

          <input type="email" minlength="10" maxlength="50" name="email" id="email" placeholder="Email" required />

          <input type="text" minlength="10" maxlength="25" name="usuario" id="Usuario" placeholder="Usuario" required />

          <input type="password" minlength="10" maxlength="50" name="contraseña" id="contraseña"
            placeholder="Contraseña" required />

          <input type="submit" value="Registrarse" id="registrarse" class="login-button"><br>
          <a href="../Php/login.php" class="">Ya tengo una cuenta</a>
        </div>

      </div>
    </div>
  </form>

  <!-- Formulario de inicio de sesión -->
  <form id="loginForm" style="display: none;" onsubmit="validarClaveMaestra(event)">
    <label for="claveMaestra">Ingrese la clave maestra:</label>
    <input type="password" id="claveMaestra" required />
    <input type="submit" value="Ingresar" />
    <br>
    <button type="button" onclick="ocultarFormulario()">Cerrar</button>
  </form>

  <script>
    // JavaScript
    function mostrarFormulario() {
      var checkbox = document.getElementById("mostrarForm");
      var formulario = document.getElementById("loginForm");
      var selectRol = document.getElementById("rol");

      if (checkbox.checked) {
        formulario.style.display = "block";
      } else {
        formulario.style.display = "none";
      }
    }

    function validarClaveMaestra(event) {
      event.preventDefault();

      var claveMaestraInput = document.getElementById("claveMaestra");
      var claveMaestra = claveMaestraInput.value;

      // Obtiene la clave maestra almacenada en el almacenamiento local
      var claveMaestraGuardada = localStorage.getItem("claveMaestra");

      // Verifica si la clave ingresada coincide con la clave maestra almacenada
      if (claveMaestra === claveMaestraGuardada) {
        // Clave maestra correcta
        var checkbox = document.getElementById("mostrarForm");
        checkbox.checked = true; // Marcamos la casilla para mostrar el formulario
        mostrarFormulario(); // Mostramos el formulario de inicio de sesión
        alert("Clave maestra correcta. Opción Administrador habilitada.");

        // Habilitar la opción Administrador
        var selectRol = document.getElementById("rol");
        selectRol.options[1].disabled = false;
      } else {
        // Clave maestra incorrecta
        alert("Clave maestra incorrecta");
      }
    }

    function ocultarFormulario() {
      var formulario = document.getElementById("loginForm");
      formulario.style.display = "none";
      var checkbox = document.getElementById("mostrarForm");
      checkbox.checked = false; // Desmarcar la casilla de selección
    }

    // Función para deshabilitar el formulario de inicio de sesión por defecto
    ocultarFormulario();

    // Verificar si la opción Administrador está habilitada temporalmente y mostrar el formulario si es necesario
    document.addEventListener("DOMContentLoaded", function () {
      var rolSeleccionadoGuardado = sessionStorage.getItem("rolSeleccionado");
      if (rolSeleccionadoGuardado === "administrador") {
        document.getElementById("rol").options[1].disabled = false; // Habilitar opción Administrador
      }
    });
  </script>


</body>

</html>