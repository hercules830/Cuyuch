<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/clases_generales.css">
  <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
    <title>Ingresar Cuyuch</title>
</head>
<body class="flex flex--centrarh flex--centrarv">


  <a id="casa" href="../Php/index.php" >
    <img id="regresar"  src="../img/login/img/casa-de-perro.png" alt="">
  </a>


    <form name="form" action="phpLogin.php" method="post">
        <div class="login">
            <div class="login-header">
              <h1>Bienvenido</h1>
            </div>
            <div class="login-form">
              
              <input type="text" id="usuario" name="usuario" placeholder="Usuario" required><br>
            
              <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña" required>

              <br>
              <br>
              <button type="submit" onclick="ir()" id="login" class="login-button">Iniciar Sesión</button>

              <br>
              <br>
              <br>
              <a href="../php/registrarse.php" class="sign-up">¿No tienes cuenta? Regístrate!</a>

              <br>
            </div>
          </div>
    </form>
</body>

</html>