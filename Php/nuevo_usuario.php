<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="clases_generales.css">
  <link rel="stylesheet" type="text/css" href="login.css">
  <link rel="stylesheet" type="text/css" href="principal.css">
  <link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
  <title>Nuevo Usuario</title>
</head>

<body class="flex flex--centrarh flex--centrarv">
  <form name="form" action="registrarse.php" method="post" class="Nuevo Usuario flex flex--centrarh flex--centrarv">
    <div class="login flex flex--centrarh">

      <div class="login-form flex flex--centrarh flex--centrarv izq-der">
        <figure class="login-header">
          <img src="..\img/Nuevo_usuario/logo.jpg" width="200px" alt="">
          <figcaption class="eslogan">"Fomentamos y desarrollamos tu talento"</figcaption>
        </figure>
        <div>
          <h2><strong>Crear una cuenta</strong></h2>
          <img src="..\img/principal/usuario.png" width="50px" alt="">
          <h2>Regístrate para continuar</h2>
          <input type="text" name="nombre" id="Nombre" placeholder="Nombre" required /><br>
          <input type="text" name="apellidos" id="Apellidos" placeholder="Apellidos" required />
          <input type="email" name="email" id="email" placeholder="Email" required />
          <input type="text" name="usuario" id="Usuario" placeholder="Usuario" required />
          <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña" required />

          <input type="submit" value="registrarse" class="login-button">
        </div>

      </div>
    </div>
  </form>

</body>

</html>