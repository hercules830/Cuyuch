<?php

// configuracion necesaria para acceder a la base de datos



$hostname = "localhost";
$usuariodb = "root";
$contraseña = "";
$dbname = "cuyuch";


// generando la conexion con el servidor

$conectar = mysqli_connect($hostname, $usuariodb, $contraseña, $dbname);

?>