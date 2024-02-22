<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

// Definir las credenciales de la base de datos
$hostname = "localhost";
$usuariodb = "root";
$contraseña = "";
$dbname = "clientes";

// Conexión a la base de datos
$conexion = new mysqli($hostname, $usuariodb, $contraseña, $dbname);

if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $accion = $_POST['accion'];

  if ($accion === "insert") {
    // Obtener el nombre y año del cliente enviado desde el formulario
    $nombre = $conexion->real_escape_string($_POST["nombre"]);
    $año = $conexion->real_escape_string($_POST["año"]);
    $cedula = $conexion->real_escape_string($_POST["cedula"]);
    $programa = $conexion->real_escape_string($_POST["programa"]);

    // Verificar si el cliente ya existe en la base de datos
    $sql = "SELECT * FROM t1_enero WHERE Nombre = '$nombre' AND Cédula = '$cedula' AND Año = '$año' AND Programa = '$programa'";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {

      // Éxito al registrar el cliente
      header("Location: ../Php/fichaProgramas.php?mensaje=existe");
    } else {
      // No existe un registro con el mismo nombre y año, puedes proceder a la inserción
      // Realiza la inserción de datos en la base de datos aquí



      // El cliente no existe, proceder a procesar los datos

      // Obtener los datos del formulario

      if (isset($_POST['año'])) {
        $año = $_POST['año'];
        // Procesar el valor seleccionado aquí
      }

      if (isset($_POST['programa'])) {
        $programa = $_POST['programa'];
        // Procesar el valor seleccionado aquí
      }

      $estado = isset($_POST['estado']) ? $_POST['estado'] : '';



      $responsable = $_POST['responsable'];

      if (isset($_POST['instituto'])) {
        $instituto = $_POST['instituto'];
        // Procesar el valor seleccionado aquí
      }

      $cedula = $_POST['cedula'];

      $nacimiento = $_POST['nacimiento'];
      $direccion = $_POST['direccion'];
      $correo = $_POST['email'];
      $celular1 = $_POST['celular1'];
      $celular2 = $_POST['celular2'];
      $ingreso = $_POST['ingreso'];

      if (isset($_POST['horario'])) {
        $horario = $_POST['horario'];
        // Procesar el valor seleccionado aquí
      }

      $entrada = $_POST['entrada'];
      $salida = $_POST['salida'];




      $matricula1 = $_POST['matricula1'];
      $mensualidad1 = $_POST['mensualidad1'];
      $factura1 = $_POST['factura1'];
      $promo1 = $_POST['promo1'];
      $descuento1 = $_POST['descuento1'];
      $grupo1 = $_POST['grupo1'];
      $membresia1 = $_POST['membresia1'];
      $fecha1 = $_POST['fecha1'];
      $ticket1 = $_POST['ticket1'];
      $cupon1 = $_POST['cupon1'];
      $agente1 = $_POST['agente1'];

      $matricula2 = $_POST['matricula2'];
      $mensualidad2 = $_POST['mensualidad2'];
      $factura2 = $_POST['factura2'];
      $promo2 = $_POST['promo2'];
      $descuento2 = $_POST['descuento2'];
      $grupo2 = $_POST['grupo2'];
      $membresia2 = $_POST['membresia2'];
      $fecha2 = $_POST['fecha2'];
      $ticket2 = $_POST['ticket2'];
      $cupon2 = $_POST['cupon2'];
      $agente2 = $_POST['agente2'];

      $matricula3 = $_POST['matricula3'];
      $mensualidad3 = $_POST['mensualidad3'];
      $factura3 = $_POST['factura3'];
      $promo3 = $_POST['promo3'];
      $descuento3 = $_POST['descuento3'];
      $grupo3 = $_POST['grupo3'];
      $membresia3 = $_POST['membresia3'];
      $fecha3 = $_POST['fecha3'];
      $ticket3 = $_POST['ticket3'];
      $cupon3 = $_POST['cupon3'];
      $agente3 = $_POST['agente3'];

      $matricula4 = $_POST['matricula4'];
      $mensualidad4 = $_POST['mensualidad4'];
      $factura4 = $_POST['factura4'];
      $promo4 = $_POST['promo4'];
      $descuento4 = $_POST['descuento4'];
      $grupo4 = $_POST['grupo4'];
      $membresia4 = $_POST['membresia4'];
      $fecha4 = $_POST['fecha4'];
      $ticket4 = $_POST['ticket4'];
      $cupon4 = $_POST['cupon4'];
      $agente4 = $_POST['agente4'];

      $matricula5 = $_POST['matricula5'];
      $mensualidad5 = $_POST['mensualidad5'];
      $factura5 = $_POST['factura5'];
      $promo5 = $_POST['promo5'];
      $descuento5 = $_POST['descuento5'];
      $grupo5 = $_POST['grupo5'];
      $membresia5 = $_POST['membresia5'];
      $fecha5 = $_POST['fecha5'];
      $ticket5 = $_POST['ticket5'];
      $cupon5 = $_POST['cupon5'];
      $agente5 = $_POST['agente5'];

      $matricula6 = $_POST['matricula6'];
      $mensualidad6 = $_POST['mensualidad6'];
      $factura6 = $_POST['factura6'];
      $promo6 = $_POST['promo6'];
      $descuento6 = $_POST['descuento6'];
      $grupo6 = $_POST['grupo6'];
      $membresia6 = $_POST['membresia6'];
      $fecha6 = $_POST['fecha6'];
      $ticket6 = $_POST['ticket6'];
      $cupon6 = $_POST['cupon6'];
      $agente6 = $_POST['agente6'];

      $matricula7 = $_POST['matricula7'];
      $mensualidad7 = $_POST['mensualidad7'];
      $factura7 = $_POST['factura7'];
      $promo7 = $_POST['promo7'];
      $descuento7 = $_POST['descuento7'];
      $grupo7 = $_POST['grupo7'];
      $membresia7 = $_POST['membresia7'];
      $fecha7 = $_POST['fecha7'];
      $ticket7 = $_POST['ticket7'];
      $cupon7 = $_POST['cupon7'];
      $agente7 = $_POST['agente7'];

      $matricula8 = $_POST['matricula8'];
      $mensualidad8 = $_POST['mensualidad8'];
      $factura8 = $_POST['factura8'];
      $promo8 = $_POST['promo8'];
      $descuento8 = $_POST['descuento8'];
      $grupo8 = $_POST['grupo8'];
      $membresia8 = $_POST['membresia8'];
      $fecha8 = $_POST['fecha8'];
      $ticket8 = $_POST['ticket8'];
      $cupon8 = $_POST['cupon8'];
      $agente8 = $_POST['agente8'];

      $matricula9 = $_POST['matricula9'];
      $mensualidad9 = $_POST['mensualidad9'];
      $factura9 = $_POST['factura9'];
      $promo9 = $_POST['promo9'];
      $descuento9 = $_POST['descuento9'];
      $grupo9 = $_POST['grupo9'];
      $membresia9 = $_POST['membresia9'];
      $fecha9 = $_POST['fecha9'];
      $ticket9 = $_POST['ticket9'];
      $cupon9 = $_POST['cupon9'];
      $agente9 = $_POST['agente9'];

      $matricula10 = $_POST['matricula10'];
      $mensualidad10 = $_POST['mensualidad10'];
      $factura10 = $_POST['factura10'];
      $promo10 = $_POST['promo10'];
      $descuento10 = $_POST['descuento10'];
      $grupo10 = $_POST['grupo10'];
      $membresia10 = $_POST['membresia10'];
      $fecha10 = $_POST['fecha10'];
      $ticket10 = $_POST['ticket10'];
      $cupon10 = $_POST['cupon10'];
      $agente10 = $_POST['agente10'];

      $matricula11 = $_POST['matricula11'];
      $mensualidad11 = $_POST['mensualidad11'];
      $factura11 = $_POST['factura11'];
      $promo11 = $_POST['promo11'];
      $descuento11 = $_POST['descuento11'];
      $grupo11 = $_POST['grupo11'];
      $membresia11 = $_POST['membresia11'];
      $fecha11 = $_POST['fecha11'];
      $ticket11 = $_POST['ticket11'];
      $cupon11 = $_POST['cupon11'];
      $agente11 = $_POST['agente11'];

      $matricula12 = $_POST['matricula12'];
      $mensualidad12 = $_POST['mensualidad12'];
      $factura12 = $_POST['factura12'];
      $promo12 = $_POST['promo12'];
      $descuento12 = $_POST['descuento12'];
      $grupo12 = $_POST['grupo12'];
      $membresia12 = $_POST['membresia12'];
      $fecha12 = $_POST['fecha12'];
      $ticket12 = $_POST['ticket12'];
      $cupon12 = $_POST['cupon12'];
      $agente12 = $_POST['agente12'];


      // Aquí deberías insertar los datos del cliente en la base de datos
      // Por ejemplo: $sql_insert = "INSERT INTO clientes (nombre, edad, telefono) VALUES ('$nombre_cliente', $edad, '$telefono')";

      // Inserción en t1_enero
      $sql1 = "INSERT INTO t1_enero (Año, Programa, Estado, Nombre, Responsable, Instituto, Cédula, Nacimiento, Dirección, Email, Celular1, Celular2, Ingreso, Horario, Entrada, Salida, Matrícula, Mensualidad, Factura, Promo, Descuento, Grupo, Membresía, Fecha, Ticket, Cupón, Agente)
VALUES ('$año', '$programa', '$estado', '$nombre', '$responsable', '$instituto', '$cedula', '$nacimiento', '$direccion', '$correo', '$celular1', '$celular2', '$ingreso', '$horario', '$entrada', '$salida', '$matricula1', '$mensualidad1', '$factura1', '$promo1', '$descuento1', '$grupo1', '$membresia1', '$fecha1', '$ticket1', '$cupon1', '$agente1')";





      // --------------------------------------------------------------


      // Inserción en t2_febrero
      $sql2 = "INSERT INTO t2_febrero (Año, Programa, Estado, Nombre, Responsable, Instituto, Cédula,Nacimiento, Dirección, Email, Celular1, Celular2, Ingreso, Horario, Entrada, Salida, Matrícula, Mensualidad, Factura, Promo, Descuento, Grupo, Membresía, Fecha, Ticket, Cupón, Agente)
VALUES ('$año', '$programa', '$estado', '$nombre', '$responsable', '$instituto', '$cedula', '$nacimiento', '$direccion', '$correo', '$celular1', '$celular2', '$ingreso', '$horario', '$entrada', '$salida', '$matricula2', '$mensualidad2', '$factura2', '$promo2', '$descuento2', '$grupo2', '$membresia2', '$fecha2', '$ticket2', '$cupon2', '$agente2')";




      // ------------------------------------------------------------

      // Inserción en t3_marzo
      $sql3 = "INSERT INTO t3_marzo (Año, Programa, Estado, Nombre, Responsable, Instituto, Cédula,Nacimiento, Dirección, Email, Celular1, Celular2, Ingreso, Horario, Entrada, Salida, Matrícula, Mensualidad, Factura, Promo, Descuento, Grupo, Membresía, Fecha, Ticket, Cupón, Agente)
VALUES ('$año', '$programa', '$estado', '$nombre', '$responsable', '$instituto', '$cedula', '$nacimiento', '$direccion', '$correo', '$celular1', '$celular2', '$ingreso', '$horario', '$entrada', '$salida', '$matricula3', '$mensualidad3', '$factura3', '$promo3', '$descuento3', '$grupo3', '$membresia3', '$fecha3', '$ticket3', '$cupon3', '$agente3')";



      // Inserción en t4_abril
      $sql4 = "INSERT INTO t4_abril (Año, Programa, Estado, Nombre, Responsable, Instituto, Cédula,Nacimiento, Dirección, Email, Celular1, Celular2, Ingreso, Horario, Entrada, Salida, Matrícula, Mensualidad, Factura, Promo, Descuento, Grupo, Membresía, Fecha, Ticket, Cupón, Agente)
VALUES ('$año', '$programa', '$estado', '$nombre', '$responsable', '$instituto', '$cedula', '$nacimiento', '$direccion', '$correo', '$celular1', '$celular2', '$ingreso', '$horario', '$entrada', '$salida', '$matricula4', '$mensualidad4', '$factura4', '$promo4', '$descuento4', '$grupo4', '$membresia4', '$fecha4', '$ticket4', '$cupon4', '$agente4')";


      // Inserción en t5_mayo
      $sql5 = "INSERT INTO t5_mayo (Año, Programa, Estado, Nombre, Responsable, Instituto, Cédula,Nacimiento, Dirección, Email, Celular1, Celular2, Ingreso, Horario, Entrada, Salida, Matrícula, Mensualidad, Factura, Promo, Descuento, Grupo, Membresía, Fecha, Ticket, Cupón, Agente)
VALUES ('$año', '$programa', '$estado', '$nombre', '$responsable', '$instituto', '$cedula', '$nacimiento', '$direccion', '$correo', '$celular1', '$celular2', '$ingreso', '$horario', '$entrada', '$salida', '$matricula5', '$mensualidad5', '$factura5', '$promo5', '$descuento5', '$grupo5', '$membresia5', '$fecha5', '$ticket5', '$cupon5', '$agente5')";


      // Inserción en t6_junio
      $sql6 = "INSERT INTO t6_junio (Año, Programa, Estado, Nombre, Responsable, Instituto, Cédula,Nacimiento, Dirección, Email, Celular1, Celular2, Ingreso, Horario, Entrada, Salida, Matrícula, Mensualidad, Factura, Promo, Descuento, Grupo, Membresía, Fecha, Ticket, Cupón, Agente)
VALUES ('$año', '$programa', '$estado', '$nombre', '$responsable', '$instituto', '$cedula', '$nacimiento', '$direccion', '$correo', '$celular1', '$celular2', '$ingreso', '$horario', '$entrada', '$salida', '$matricula6', '$mensualidad6', '$factura6', '$promo6', '$descuento6', '$grupo6', '$membresia6', '$fecha6', '$ticket6', '$cupon6', '$agente6')";





      // Inserción en t7_julio
      $sql7 = "INSERT INTO t7_julio (Año, Programa, Estado, Nombre, Responsable, Instituto, Cédula,Nacimiento, Dirección, Email, Celular1, Celular2, Ingreso, Horario, Entrada, Salida, Matrícula, Mensualidad, Factura, Promo, Descuento, Grupo, Membresía, Fecha, Ticket, Cupón, Agente)
VALUES ('$año', '$programa', '$estado', '$nombre', '$responsable', '$instituto', '$cedula', '$nacimiento', '$direccion', '$correo', '$celular1', '$celular2', '$ingreso', '$horario', '$entrada', '$salida', '$matricula7', '$mensualidad7', '$factura7', '$promo7', '$descuento7', '$grupo7', '$membresia7', '$fecha7', '$ticket7', '$cupon7', '$agente7')";



      // Inserción en t8_agosto
      $sql8 = "INSERT INTO t8_agosto (Año, Programa, Estado, Nombre, Responsable, Instituto, Cédula,Nacimiento, Dirección, Email, Celular1, Celular2, Ingreso, Horario, Entrada, Salida, Matrícula, Mensualidad, Factura, Promo, Descuento, Grupo, Membresía, Fecha, Ticket, Cupón, Agente)
VALUES ('$año', '$programa', '$estado', '$nombre', '$responsable', '$instituto', '$cedula', '$nacimiento', '$direccion', '$correo', '$celular1', '$celular2', '$ingreso', '$horario', '$entrada', '$salida', '$matricula8', '$mensualidad8', '$factura8', '$promo8', '$descuento8', '$grupo8', '$membresia8', '$fecha8', '$ticket8', '$cupon8', '$agente8')";



      // Inserción en t9_septiembre
      $sql9 = "INSERT INTO t9_septiembre (Año, Programa, Estado, Nombre, Responsable, Instituto, Cédula,Nacimiento, Dirección, Email, Celular1, Celular2, Ingreso, Horario, Entrada, Salida, Matrícula, Mensualidad, Factura, Promo, Descuento, Grupo, Membresía, Fecha, Ticket, Cupón, Agente)
VALUES ('$año', '$programa', '$estado', '$nombre', '$responsable', '$instituto', '$cedula', '$nacimiento', '$direccion', '$correo', '$celular1', '$celular2', '$ingreso', '$horario', '$entrada', '$salida', '$matricula9', '$mensualidad9', '$factura9', '$promo9', '$descuento9', '$grupo9', '$membresia9', '$fecha9', '$ticket9', '$cupon9', '$agente9')";



      // Inserción en t10_octubre
      $sql10 = "INSERT INTO t10_octubre (Año, Programa, Estado, Nombre, Responsable, Instituto, Cédula,Nacimiento, Dirección, Email, Celular1, Celular2, Ingreso, Horario, Entrada, Salida, Matrícula, Mensualidad, Factura, Promo, Descuento, Grupo, Membresía, Fecha, Ticket, Cupón, Agente)
VALUES ('$año', '$programa', '$estado', '$nombre', '$responsable', '$instituto', '$cedula', '$nacimiento', '$direccion', '$correo', '$celular1', '$celular2', '$ingreso', '$horario', '$entrada', '$salida', '$matricula10', '$mensualidad10', '$factura10', '$promo10', '$descuento10', '$grupo10', '$membresia10', '$fecha10', '$ticket10', '$cupon10', '$agente10')";



      // Inserción en t11_noviembre
      $sql11 = "INSERT INTO t11_noviembre (Año, Programa, Estado, Nombre, Responsable, Instituto, Cédula,Nacimiento, Dirección, Email, Celular1, Celular2, Ingreso, Horario, Entrada, Salida, Matrícula, Mensualidad, Factura, Promo, Descuento, Grupo, Membresía, Fecha, Ticket, Cupón, Agente)
VALUES ('$año', '$programa', '$estado', '$nombre', '$responsable', '$instituto', '$cedula', '$nacimiento', '$direccion', '$correo', '$celular1', '$celular2', '$ingreso', '$horario', '$entrada', '$salida', '$matricula11', '$mensualidad11', '$factura11', '$promo11', '$descuento11', '$grupo11', '$membresia11', '$fecha11', '$ticket11', '$cupon11', '$agente11')";






      //--------------------------------------------------------------------------- 

      // Inserción en t12_diciembre
      $sql12 = "INSERT INTO t12_diciembre (Año, Programa, Estado, Nombre, Responsable, Instituto, Cédula,Nacimiento, Dirección, Email, Celular1, Celular2, Ingreso, Horario, Entrada, Salida, Matrícula, Mensualidad, Factura, Promo, Descuento, Grupo, Membresía, Fecha, Ticket, Cupón, Agente)
VALUES ('$año', '$programa', '$estado', '$nombre', '$responsable', '$instituto', '$cedula', '$nacimiento', '$direccion', '$correo', '$celular1', '$celular2', '$ingreso', '$horario', '$entrada', '$salida', '$matricula12', '$mensualidad12', '$factura12', '$promo12', '$descuento12', '$grupo12', '$membresia12', '$fecha12', '$ticket12', '$cupon12', '$agente12')";






      $sql = $sql1 . ";" . $sql2 . ";" . $sql3 . ";" . $sql4 . ";" . $sql5 . ";" . $sql6 . ";" . $sql7 . ";" . $sql8 . ";" . $sql9 . ";" . $sql10 . ";" . $sql11 . ";" . $sql12 . ";";

      // Actualiza registros anteriores con el mismo nombre a 'Inactivo'
      $sql_actualizar = "UPDATE t1_enero SET Estado = 'Inactivo' WHERE Nombre = ? AND Cédula = ? AND Año < ? AND Programa = ?";
      $stmt_actualizar = $conexion->prepare($sql_actualizar);
      $stmt_actualizar->bind_param("ssis", $nombre, $cedula, $año, $programa);
      $stmt_actualizar->execute();

      if ($conexion->multi_query($sql) === TRUE) {
        // Éxito al registrar el cliente
        // Después de la inserción, cambiar campos HTML a readonly usando JavaScript
      echo "<script>
      document.getElementById('Responsable').readOnly = true;
      document.getElementById('Instituto').readOnly = true;
      document.getElementById('Cédula').readOnly = true;
    </script>";
        header("Location: ../Php/fichaProgramas.php?mensaje=exito");
        exit();
      } else {
        // Error al registrar el cliente
        header("Location: ../Php/fichaProgramas.php?mensaje=error&error_message=" . urlencode($conn->error));
        exit();
      }
    }
    $conexion->close();
  } elseif ($accion === "update") {


    $nombre = $_POST['nombre'];
    $año = $_POST['año'];
    $cedula = $_POST['cedula'];
    if (isset($_POST['programa'])) {
      $programa = $_POST['programa'];
      // Procesar el valor seleccionado aquí
    }

    // Definir un array con los nombres de los meses
    $meses = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");


    // Realizar una consulta para verificar si el cliente ya existe
    $existeCliente = false; // Variable para indicar si el cliente existe, inicialmente se asume que no existe

    // Realiza la consulta en tu base de datos
    $hostname = "localhost";
    $usuariodb = "root";
    $contraseña = "";
    $dbname = "clientes";

    $conn = new mysqli($hostname, $usuariodb, $contraseña, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
      die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para verificar si el cliente ya existe con el mismo nombre y año
    $consultaExistencia = "SELECT * FROM t1_enero WHERE Nombre = ? AND Cédula = ? AND Año = ? AND Programa = ?";

    // Utilizar sentencias preparadas para evitar SQL injection
    $stmt = $conn->prepare($consultaExistencia);
    $stmt->bind_param("ssis", $nombre, $cedula, $año, $programa);
    $stmt->execute();

    $resultadoExistencia = $stmt->get_result();

    if ($resultadoExistencia->num_rows > 0) {
      $existeCliente = true;
    }

    // Cerrar la sentencia preparada
    $stmt->close();

    if ($existeCliente) {
      // Aquí procedes con la actualización de los datos, ya que el cliente existe con el mismo nombre y año
      // ... Tu código de actualización aquí .....


      // Crear un array para almacenar los valores de los grupos
      $grupos = array();

      // Recorrer los doce grupos
      for ($i = 1; $i <= 12; $i++) {
        // Obtener el valor del input correspondiente
        $nombreGrupo = "grupo" . $i;
        $valorGrupo = $_POST[$nombreGrupo]; // Ajusta según tu formulario

        // Almacenar el valor en el array
        $grupos[$i] = $valorGrupo;
      }

      for ($i = 1; $i <= 12; $i++) {
        $nombreTabla = "t" . $i . "_" . $meses[$i - 1];  // Utiliza el nombre del mes correspondiente
        $consultaPendiente = "SELECT * FROM $nombreTabla WHERE Grupo = ? AND Estado = 'Pendiente'";

        $stmtPendiente = $conn->prepare($consultaPendiente);
        $stmtPendiente->bind_param("i", $grupo);
        $stmtPendiente->execute();
        $resultadoPendiente = $stmtPendiente->get_result();

        if ($resultadoPendiente->num_rows > 0) {
          $clientePendiente = true;
          break;  // Salir del bucle si se encuentra un cliente pendiente
        }

        $stmtPendiente->close();
      }

      if ($clientePendiente) {
        // Mostrar mensaje y botones para confirmar el proceso
        echo "El cliente con nombre: $nombre y número de cédula: $cedula está pendiente de pago. ¿Desea seguir con el proceso de pago?";
        echo '<button onclick="cancelarProceso()">Cancelar</button>';
        echo '<button onclick="verificarClaveMaestra()">Procesar</button>';
        exit();  // No procesar los datos aún
      }

      // Resto del código para la actualización de datos
      // ...

      $estado = $_POST['estado'];


      $responsable = $_POST['responsable'];

      if (isset($_POST['instituto'])) {
        $instituto = $_POST['instituto'];
        // Procesar el valor seleccionado aquí
      }

      $nacimiento = $_POST['nacimiento'];
      $direccion = $_POST['direccion'];
      $correo = $_POST['email'];
      $celular1 = $_POST['celular1'];
      $celular2 = $_POST['celular2'];
      $ingreso = $_POST['ingreso'];

      if (isset($_POST['horario'])) {
        $horario = $_POST['horario'];
        // Procesar el valor seleccionado aquí
      }

      $entrada = $_POST['entrada'];
      $salida = $_POST['salida'];




      $matricula1 = $_POST['matricula1'];
      $mensualidad1 = $_POST['mensualidad1'];
      $factura1 = $_POST['factura1'];
      $promo1 = $_POST['promo1'];
      $descuento1 = $_POST['descuento1'];
      $grupo1 = $_POST['grupo1'];
      $membresia1 = $_POST['membresia1'];
      $fecha1 = $_POST['fecha1'];
      $ticket1 = $_POST['ticket1'];
      $cupon1 = $_POST['cupon1'];
      $agente1 = $_POST['agente1'];

      $matricula2 = $_POST['matricula2'];
      $mensualidad2 = $_POST['mensualidad2'];
      $factura2 = $_POST['factura2'];
      $promo2 = $_POST['promo2'];
      $descuento2 = $_POST['descuento2'];
      $grupo2 = $_POST['grupo2'];
      $membresia2 = $_POST['membresia2'];
      $fecha2 = $_POST['fecha2'];
      $ticket2 = $_POST['ticket2'];
      $cupon2 = $_POST['cupon2'];
      $agente2 = $_POST['agente2'];

      $matricula3 = $_POST['matricula3'];
      $mensualidad3 = $_POST['mensualidad3'];
      $factura3 = $_POST['factura3'];
      $promo3 = $_POST['promo3'];
      $descuento3 = $_POST['descuento3'];
      $grupo3 = $_POST['grupo3'];
      $membresia3 = $_POST['membresia3'];
      $fecha3 = $_POST['fecha3'];
      $ticket3 = $_POST['ticket3'];
      $cupon3 = $_POST['cupon3'];
      $agente3 = $_POST['agente3'];

      $matricula4 = $_POST['matricula4'];
      $mensualidad4 = $_POST['mensualidad4'];
      $factura4 = $_POST['factura4'];
      $promo4 = $_POST['promo4'];
      $descuento4 = $_POST['descuento4'];
      $grupo4 = $_POST['grupo4'];
      $membresia4 = $_POST['membresia4'];
      $fecha4 = $_POST['fecha4'];
      $ticket4 = $_POST['ticket4'];
      $cupon4 = $_POST['cupon4'];
      $agente4 = $_POST['agente4'];

      $matricula5 = $_POST['matricula5'];
      $mensualidad5 = $_POST['mensualidad5'];
      $factura5 = $_POST['factura5'];
      $promo5 = $_POST['promo5'];
      $descuento5 = $_POST['descuento5'];
      $grupo5 = $_POST['grupo5'];
      $membresia5 = $_POST['membresia5'];
      $fecha5 = $_POST['fecha5'];
      $ticket5 = $_POST['ticket5'];
      $cupon5 = $_POST['cupon5'];
      $agente5 = $_POST['agente5'];

      $matricula6 = $_POST['matricula6'];
      $mensualidad6 = $_POST['mensualidad6'];
      $factura6 = $_POST['factura6'];
      $promo6 = $_POST['promo6'];
      $descuento6 = $_POST['descuento6'];
      $grupo6 = $_POST['grupo6'];
      $membresia6 = $_POST['membresia6'];
      $fecha6 = $_POST['fecha6'];
      $ticket6 = $_POST['ticket6'];
      $cupon6 = $_POST['cupon6'];
      $agente6 = $_POST['agente6'];

      $matricula7 = $_POST['matricula7'];
      $mensualidad7 = $_POST['mensualidad7'];
      $factura7 = $_POST['factura7'];
      $promo7 = $_POST['promo7'];
      $descuento7 = $_POST['descuento7'];
      $grupo7 = $_POST['grupo7'];
      $membresia7 = $_POST['membresia7'];
      $fecha7 = $_POST['fecha7'];
      $ticket7 = $_POST['ticket7'];
      $cupon7 = $_POST['cupon7'];
      $agente7 = $_POST['agente7'];

      $matricula8 = $_POST['matricula8'];
      $mensualidad8 = $_POST['mensualidad8'];
      $factura8 = $_POST['factura8'];
      $promo8 = $_POST['promo8'];
      $descuento8 = $_POST['descuento8'];
      $grupo8 = $_POST['grupo8'];
      $membresia8 = $_POST['membresia8'];
      $fecha8 = $_POST['fecha8'];
      $ticket8 = $_POST['ticket8'];
      $cupon8 = $_POST['cupon8'];
      $agente8 = $_POST['agente8'];

      $matricula9 = $_POST['matricula9'];
      $mensualidad9 = $_POST['mensualidad9'];
      $factura9 = $_POST['factura9'];
      $promo9 = $_POST['promo9'];
      $descuento9 = $_POST['descuento9'];
      $grupo9 = $_POST['grupo9'];
      $membresia9 = $_POST['membresia9'];
      $fecha9 = $_POST['fecha9'];
      $ticket9 = $_POST['ticket9'];
      $cupon9 = $_POST['cupon9'];
      $agente9 = $_POST['agente9'];

      $matricula10 = $_POST['matricula10'];
      $mensualidad10 = $_POST['mensualidad10'];
      $factura10 = $_POST['factura10'];
      $promo10 = $_POST['promo10'];
      $descuento10 = $_POST['descuento10'];
      $grupo10 = $_POST['grupo10'];
      $membresia10 = $_POST['membresia10'];
      $fecha10 = $_POST['fecha10'];
      $ticket10 = $_POST['ticket10'];
      $cupon10 = $_POST['cupon10'];
      $agente10 = $_POST['agente10'];

      $matricula11 = $_POST['matricula11'];
      $mensualidad11 = $_POST['mensualidad11'];
      $factura11 = $_POST['factura11'];
      $promo11 = $_POST['promo11'];
      $descuento11 = $_POST['descuento11'];
      $grupo11 = $_POST['grupo11'];
      $membresia11 = $_POST['membresia11'];
      $fecha11 = $_POST['fecha11'];
      $ticket11 = $_POST['ticket11'];
      $cupon11 = $_POST['cupon11'];
      $agente11 = $_POST['agente11'];

      $matricula12 = $_POST['matricula12'];
      $mensualidad12 = $_POST['mensualidad12'];
      $factura12 = $_POST['factura12'];
      $promo12 = $_POST['promo12'];
      $descuento12 = $_POST['descuento12'];
      $grupo12 = $_POST['grupo12'];
      $membresia12 = $_POST['membresia12'];
      $fecha12 = $_POST['fecha12'];
      $ticket12 = $_POST['ticket12'];
      $cupon12 = $_POST['cupon12'];
      $agente12 = $_POST['agente12'];




      $consulta1 = "UPDATE t1_enero SET
      Programa = '$programa',
      Estado = '$estado',
      Nombre = '$nombre',
      Responsable = '$responsable',
      Instituto = '$instituto',
      Cédula = '$cedula',
      Nacimiento = '$nacimiento',
      Dirección = '$direccion',
      Email = '$correo',
      Celular1 = '$celular1',
      Celular2 = '$celular2',
      Ingreso = '$ingreso',
      Horario = '$horario',
      Entrada = '$entrada',
      Salida = '$salida',
      Matrícula = '$matricula1',
      Mensualidad = '$mensualidad1',
      Factura = '$factura1',
      Promo = '$promo1',
      Descuento = '$descuento1',
      Grupo = '$grupo1',
      Membresía = '$membresia1',
      Fecha = '$fecha1',
      Ticket = '$ticket1',
      Cupón = '$cupon1',
      Agente = '$agente1'
     WHERE Nombre = '$nombre' AND Cédula = '$cedula' AND Año = '$año' AND Programa = '$programa'";




      // -------------------------------------------------------



      $consulta2 = "UPDATE t2_febrero
    SET
    
    Programa = '$programa',
    Estado = '$estado',
    Nombre = '$nombre',
    Responsable = '$responsable',
    Instituto = '$instituto',
    Cédula = '$cedula',
    Nacimiento = '$nacimiento',
    Dirección = '$direccion',
    Email = '$correo',
    Celular1 = '$celular1',
    Celular2 = '$celular2',
    Ingreso = '$ingreso',
    Horario = '$horario',
    Entrada = '$entrada',
    Salida = '$salida',
    Matrícula = '$matricula2',
    Mensualidad = '$mensualidad2',
    Factura = '$factura2',
    Promo = '$promo2',
    Descuento = '$descuento2',
    Grupo = '$grupo2',
    Membresía = '$membresia2',
    Fecha = '$fecha2',
    Ticket = '$ticket2',
    Cupón = '$cupon2',
    Agente = '$agente2'
    WHERE Nombre = '$nombre' AND Cédula = '$cedula' AND Año = '$año' AND Programa = '$programa'";







      // ------------------------------------------------------------


      $consulta3 = "UPDATE t3_marzo
    SET
    
    Programa = '$programa',
    Estado = '$estado',
    Nombre = '$nombre',
    Responsable = '$responsable',
    Instituto = '$instituto',
    Cédula = '$cedula',
    Nacimiento = '$nacimiento',
    Dirección = '$direccion',
    Email = '$correo',
    Celular1 = '$celular1',
    Celular2 = '$celular2',
    Ingreso = '$ingreso',
    Horario = '$horario',
    Entrada = '$entrada',
    Salida = '$salida',
    Matrícula = '$matricula3',
    Mensualidad = '$mensualidad3',
    Factura = '$factura3',
    Promo = '$promo3',
    Descuento = '$descuento3',
    Grupo = '$grupo3',
    Membresía = '$membresia3',
    Fecha = '$fecha3',
    Ticket = '$ticket3',
    Cupón = '$cupon3',
    Agente = '$agente3'
    WHERE Nombre = '$nombre' AND Cédula = '$cedula' AND Año = '$año' AND Programa = '$programa'";




      // -----------------------------------------------------------------


      $consulta4 = "UPDATE t4_abril
    SET
    
    Programa = '$programa',
    Estado = '$estado',
    Nombre = '$nombre',
    Responsable = '$responsable',
    Instituto = '$instituto',
    Cédula = '$cedula',
    Nacimiento = '$nacimiento',
    Dirección = '$direccion',
    Email = '$correo',
    Celular1 = '$celular1',
    Celular2 = '$celular2',
    Ingreso = '$ingreso',
    Horario = '$horario',
    Entrada = '$entrada',
    Salida = '$salida',
    Matrícula = '$matricula4',
    Mensualidad = '$mensualidad4',
    Factura = '$factura4',
    Promo = '$promo4',
    Descuento = '$descuento4',
    Grupo = '$grupo4',
    Membresía = '$membresia4',
    Fecha = '$fecha4',
    Ticket = '$ticket4',
    Cupón = '$cupon4',
    Agente = '$agente4'
    WHERE Nombre = '$nombre' AND Cédula = '$cedula' AND Año = '$año' AND Programa = '$programa'";






      // ----------------------------------------------------------


      $consulta5 = "UPDATE t5_mayo
    SET
   
    Programa = '$programa',
    Estado = '$estado',
    Nombre = '$nombre',
    Responsable = '$responsable',
    Instituto = '$instituto',
    Cédula = '$cedula',
    Nacimiento = '$nacimiento',
    Dirección = '$direccion',
    Email = '$correo',
    Celular1 = '$celular1',
    Celular2 = '$celular2',
    Ingreso = '$ingreso',
    Horario = '$horario',
    Entrada = '$entrada',
    Salida = '$salida',
    Matrícula = '$matricula5',
    Mensualidad = '$mensualidad5',
    Factura = '$factura5',
    Promo = '$promo5',
    Descuento = '$descuento5',
    Grupo = '$grupo5',
    Membresía = '$membresia5',
    Fecha = '$fecha5',
    Ticket = '$ticket5',
    Cupón = '$cupon5',
    Agente = '$agente5'
    WHERE Nombre = '$nombre' AND Cédula = '$cedula' AND Año = '$año' AND Programa = '$programa'";





      // ------------------------------------------------------------------



      $consulta6 = "UPDATE t6_junio
    SET
    
    Programa = '$programa',
    Estado = '$estado',
    Nombre = '$nombre',
    Responsable = '$responsable',
    Instituto = '$instituto',
    Cédula = '$cedula',
    Nacimiento = '$nacimiento',
    Dirección = '$direccion',
    Email = '$correo',
    Celular1 = '$celular1',
    Celular2 = '$celular2',
    Ingreso = '$ingreso',
    Horario = '$horario',
    Entrada = '$entrada',
    Salida = '$salida',
    Matrícula = '$matricula6',
    Mensualidad = '$mensualidad6',
    Factura = '$factura6',
    Promo = '$promo6',
    Descuento = '$descuento6',
    Grupo = '$grupo6',
    Membresía = '$membresia6',
    Fecha = '$fecha6',
    Ticket = '$ticket6',
    Cupón = '$cupon6',
    Agente = '$agente6'
    WHERE Nombre = '$nombre' AND Cédula = '$cedula' AND Año = '$año' AND Programa = '$programa'";






      // -----------------------------------------------------------------

      $consulta7 = "UPDATE t7_julio
    SET
     
    Programa = '$programa',
    Estado = '$estado',
    Nombre = '$nombre',
    Responsable = '$responsable',
    Instituto = '$instituto',
    Cédula = '$cedula',
    Nacimiento = '$nacimiento',
    Dirección = '$direccion',
    Email = '$correo',
    Celular1 = '$celular1',
    Celular2 = '$celular2',
    Ingreso = '$ingreso',
    Horario = '$horario',
    Entrada = '$entrada',
    Salida = '$salida',
    Matrícula = '$matricula7',
    Mensualidad = '$mensualidad7',
    Factura = '$factura7',
    Promo = '$promo7',
    Descuento = '$descuento7',
    Grupo = '$grupo7',
    Membresía = '$membresia7',
    Fecha = '$fecha7',
    Ticket = '$ticket7',
    Cupón = '$cupon7',
    Agente = '$agente7'
    WHERE Nombre = '$nombre' AND Cédula = '$cedula' AND Año = '$año' AND Programa = '$programa'";






      // --------------------------------------------------------------------


      $consulta8 = "UPDATE t8_agosto
    SET
    
    Programa = '$programa',
    Estado = '$estado',
    Nombre = '$nombre',
    Responsable = '$responsable',
    Instituto = '$instituto',
    Cédula = '$cedula',
    Nacimiento = '$nacimiento',
    Dirección = '$direccion',
    Email = '$correo',
    Celular1 = '$celular1',
    Celular2 = '$celular2',
    Ingreso = '$ingreso',
    Horario = '$horario',
    Entrada = '$entrada',
    Salida = '$salida',
    Matrícula = '$matricula8',
    Mensualidad = '$mensualidad8',
    Factura = '$factura8',
    Promo = '$promo8',
    Descuento = '$descuento8',
    Grupo = '$grupo8',
    Membresía = '$membresia8',
    Fecha = '$fecha8',
    Ticket = '$ticket8',
    Cupón = '$cupon8',
    Agente = '$agente8'
    WHERE Nombre = '$nombre' AND Cédula = '$cedula' AND Año = '$año' AND Programa = '$programa'";






      // --------------------------------------------------------------------



      $consulta9 = "UPDATE t9_septiembre
    SET
    
    Programa = '$programa',
    Estado = '$estado',
    Nombre = '$nombre',
    Responsable = '$responsable',
    Instituto = '$instituto',
    Cédula = '$cedula',
    Nacimiento = '$nacimiento',
    Dirección = '$direccion',
    Email = '$correo',
    Celular1 = '$celular1',
    Celular2 = '$celular2',
    Ingreso = '$ingreso',
    Horario = '$horario',
    Entrada = '$entrada',
    Salida = '$salida',
    Matrícula = '$matricula9',
    Mensualidad = '$mensualidad9',
    Factura = '$factura9',
    Promo = '$promo9',
    Descuento = '$descuento9',
    Grupo = '$grupo9',
    Membresía = '$membresia9',
    Fecha = '$fecha9',
    Ticket = '$ticket9',
    Cupón = '$cupon9',
    Agente = '$agente9'
    WHERE Nombre = '$nombre' AND Cédula = '$cedula' AND Año = '$año' AND Programa = '$programa'";






      //----------------------------------------------------------------


      $consulta10 = "UPDATE t10_octubre
    SET
    
    Programa = '$programa',
    Estado = '$estado',
    Nombre = '$nombre',
    Responsable = '$responsable',
    Instituto = '$instituto',
    Cédula = '$cedula',
    Nacimiento = '$nacimiento',
    Dirección = '$direccion',
    Email = '$correo',
    Celular1 = '$celular1',
    Celular2 = '$celular2',
    Ingreso = '$ingreso',
    Horario = '$horario',
    Entrada = '$entrada',
    Salida = '$salida',
    Matrícula = '$matricula10',
    Mensualidad = '$mensualidad10',
    Factura = '$factura10',
    Promo = '$promo10',
    Descuento = '$descuento10',
    Grupo = '$grupo10',
    Membresía = '$membresia10',
    Fecha = '$fecha10',
    Ticket = '$ticket10',
    Cupón = '$cupon10',
    Agente = '$agente10'
    WHERE Nombre = '$nombre' AND Cédula = '$cedula' AND Año = '$año' AND Programa = '$programa'";






      // --------------------------------------------------------------------


      $consulta11 = "UPDATE t11_noviembre
    SET
    
    Programa = '$programa',
    Estado = '$estado',
    Nombre = '$nombre',
    Responsable = '$responsable',
    Instituto = '$instituto',
    Cédula = '$cedula',
    Nacimiento = '$nacimiento',
    Dirección = '$direccion',
    Email = '$correo',
    Celular1 = '$celular1',
    Celular2 = '$celular2',
    Ingreso = '$ingreso',
    Horario = '$horario',
    Entrada = '$entrada',
    Salida = '$salida',
    Matrícula = '$matricula11',
    Mensualidad = '$mensualidad11',
    Factura = '$factura11',
    Promo = '$promo11',
    Descuento = '$descuento11',
    Grupo = '$grupo11',
    Membresía = '$membresia11',
    Fecha = '$fecha11',
    Ticket = '$ticket11',
    Cupón = '$cupon11',
    Agente = '$agente11'
    WHERE Nombre = '$nombre' AND Cédula = '$cedula' AND Año = '$año' AND Programa = '$programa'";




      //--------------------------------------------------------------------------- 


      $consulta12 = "UPDATE t12_diciembre
    SET
    
    Programa = '$programa',
    Estado = '$estado',
    Nombre = '$nombre',
    Responsable = '$responsable',
    Instituto = '$instituto',
    Cédula = '$cedula',
    Nacimiento = '$nacimiento',
    Dirección = '$direccion',
    Email = '$correo',
    Celular1 = '$celular1',
    Celular2 = '$celular2',
    Ingreso = '$ingreso',
    Horario = '$horario',
    Entrada = '$entrada',
    Salida = '$salida',
    Matrícula = '$matricula12',
    Mensualidad = '$mensualidad12',
    Factura = '$factura12',
    Promo = '$promo12',
    Descuento = '$descuento12',
    Grupo = '$grupo12',
    Membresía = '$membresia12',
    Fecha = '$fecha12',
    Ticket = '$ticket12',
    Cupón = '$cupon12',
    Agente = '$agente12'
    WHERE Nombre = '$nombre' AND Cédula = '$cedula' AND Año = '$año' AND Programa = '$programa'";





      $consulta = $consulta1 . ";" . $consulta2 . ";" . $consulta3 . ";" . $consulta4 . ";" . $consulta5 . ";" . $consulta6 . ";" . $consulta7 . ";" . $consulta8 . ";" . $consulta9 . ";" . $consulta10 . ";" . $consulta11 . ";" . $consulta12;





      if ($conn->multi_query($consulta) === TRUE) {
        // Éxito al actualizar el cliente
        header("Location: ../Php/fichaProgramas.php?mensaje=actualizar");
        exit();
      }

    } else {
      // Muestra un mensaje de error ya que el cliente no existe
      header("Location: ../Php/fichaProgramas.php?mensaje=no_existe");
      exit();
    }
  }
  $conn->close();
} else {
  // Muestra un mensaje de error ya que el cliente no existe
  header("Location: ../Php/fichaProgramas.php?mensaje=no_existe");
  exit();


}
