<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "clientes";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

$resultados = array("mes1" => array(), "mes2" => array(), "mes3" => array(), "mes4" => array(), "mes5" => array(), "mes6" => array(), "mes7" => array(), "mes8" => array(), "mes9" => array(), "mes10" => array(), "mes11" => array(), "mes12" => array());

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cedula_busqueda"], $_POST["estado_busqueda"], $_POST["programa_busqueda"], $_POST["año_busqueda"])) {



    $cedula_busqueda = $_POST["cedula_busqueda"];

    $estado_busqueda = $_POST["estado_busqueda"];

    $programa_busqueda = $_POST["programa_busqueda"];

    $año_busqueda = $_POST["año_busqueda"];


    // Consulta para el mes 1
    $query1 = "SELECT Estado, Año , Programa, Nombre, Responsable, Instituto, Cédula, Nacimiento, Dirección, Email, Celular1, Celular2, Ingreso, Horario, Entrada, Salida, Matrícula, Mensualidad, Factura, Promo, Descuento, Grupo, Membresía, Fecha, Ticket, Cupón, Agente FROM t1_enero 
               WHERE Cédula = ? AND Estado = ? AND Programa = ? AND Año = ?";
    $stmt1 = $conn->prepare($query1);

    if ($stmt1) {
        $stmt1->bind_param("ssss", $cedula_busqueda, $estado_busqueda, $programa_busqueda, $año_busqueda);
        $stmt1->execute();
        $stmt1->bind_result($Estado, $Año, $Programa, $Nombre, $Responsable, $Instituto, $Cédula, $Nacimiento, $Dirección, $Email, $Celular1, $Celular2, $Ingreso, $Horario, $Entrada, $Salida, $matricula1, $mensualidad1, $factura1, $promo1, $descuento1, $grupo1, $membresia1, $fecha1, $ticket1, $cupon1, $agente1);

        while ($stmt1->fetch()) {
            $resultados["mes1"]["Estado"] = $Estado;
            $resultados["mes1"]["Año"] = $Año;
            $resultados["mes1"]["Programa"] = $Programa;
            $resultados["mes1"]["Nombre"] = $Nombre;
            $resultados["mes1"]["Responsable"] = $Responsable;
            $resultados["mes1"]["Instituto"] = $Instituto;
            $resultados["mes1"]["Cédula"] = $Cédula;
            $resultados["mes1"]["Nacimiento"] = $Nacimiento;
            $resultados["mes1"]["Dirección"] = $Dirección;
            $resultados["mes1"]["Email"] = $Email;
            $resultados["mes1"]["Celular1"] = $Celular1;
            $resultados["mes1"]["Celular2"] = $Celular2;
            $resultados["mes1"]["Ingreso"] = $Ingreso;
            $resultados["mes1"]["Horario"] = $Horario;
            $resultados["mes1"]["Entrada"] = $Entrada;
            $resultados["mes1"]["Salida"] = $Salida;
            $resultados["mes1"]["matricula"] = $matricula1;
            $resultados["mes1"]["mensualidad"] = $mensualidad1;
            $resultados["mes1"]["factura"] = $factura1;
            $resultados["mes1"]["promo"] = $promo1;
            $resultados["mes1"]["descuento"] = $descuento1;
            $resultados["mes1"]["grupo"] = $grupo1;
            $resultados["mes1"]["membresia"] = $membresia1;
            $resultados["mes1"]["fecha"] = $fecha1;
            $resultados["mes1"]["ticket"] = $ticket1;
            $resultados["mes1"]["cupon"] = $cupon1;
            $resultados["mes1"]["agente"] = $agente1;


        }

        $stmt1->close();
    } else {
        // Manejar errores en la preparación de la consulta
        echo "Error en la preparación de la consulta para el mes 1: " . $conn->error;
        exit;
    }

    // Consulta para el mes 2
    $query2 = "SELECT Matrícula, Mensualidad, Factura, Promo, Descuento, Grupo, Membresía, Fecha, Ticket, Cupón, Agente FROM t2_febrero 
               WHERE Cédula = ? AND Estado = ? AND Programa = ? AND Año = ?";
    $stmt2 = $conn->prepare($query2);

    if ($stmt2) {
        $stmt2->bind_param("ssss", $cedula_busqueda, $estado_busqueda, $programa_busqueda, $año_busqueda);
        $stmt2->execute();
        $stmt2->bind_result($matricula2, $mensualidad2, $factura2, $promo2, $descuento2, $grupo2, $membresia2, $fecha2, $ticket2, $cupon2, $agente2);

        while ($stmt2->fetch()) {
            $resultados["mes2"]["matricula"] = $matricula2;
            $resultados["mes2"]["mensualidad"] = $mensualidad2;
            $resultados["mes2"]["factura"] = $factura2;
            $resultados["mes2"]["promo"] = $promo2;
            $resultados["mes2"]["descuento"] = $descuento2;
            $resultados["mes2"]["grupo"] = $grupo2;
            $resultados["mes2"]["membresia"] = $membresia2;
            $resultados["mes2"]["fecha"] = $fecha2;
            $resultados["mes2"]["ticket"] = $ticket2;
            $resultados["mes2"]["cupon"] = $cupon2;
            $resultados["mes2"]["agente"] = $agente2;
        }

        $stmt2->close();
    } else {
        // Manejar errores en la preparación de la consulta
        echo "Error en la preparación de la consulta para el mes 2: " . $conn->error;
        exit;
    }

    // Consulta para el mes 3
    $query3 = "SELECT Matrícula, Mensualidad, Factura, Promo, Descuento, Grupo, Membresía, Fecha, Ticket, Cupón, Agente FROM t3_marzo 
               WHERE  Cédula = ? AND Estado = ? AND Programa = ? AND Año = ?";
    $stmt3 = $conn->prepare($query3);

    if ($stmt3) {
        $stmt3->bind_param("ssss", $cedula_busqueda, $estado_busqueda, $programa_busqueda, $año_busqueda);
        $stmt3->execute();
        $stmt3->bind_result($matricula3, $mensualidad3, $factura3, $promo3, $descuento3, $grupo3, $membresia3, $fecha3, $ticket3, $cupon3, $agente3);

        while ($stmt3->fetch()) {
            $resultados["mes3"]["matricula"] = $matricula3;
            $resultados["mes3"]["mensualidad"] = $mensualidad3;
            $resultados["mes3"]["factura"] = $factura3;
            $resultados["mes3"]["promo"] = $promo3;
            $resultados["mes3"]["descuento"] = $descuento3;
            $resultados["mes3"]["grupo"] = $grupo3;
            $resultados["mes3"]["membresia"] = $membresia3;
            $resultados["mes3"]["fecha"] = $fecha3;
            $resultados["mes3"]["ticket"] = $ticket3;
            $resultados["mes3"]["cupon"] = $cupon3;
            $resultados["mes3"]["agente"] = $agente3;
        }

        $stmt3->close();
    } else {
        // Manejar errores en la preparación de la consulta
        echo "Error en la preparación de la consulta para el mes 3: " . $conn->error;
        exit;
    }

    // Consulta para el mes 4
    $query4 = "SELECT Matrícula, Mensualidad, Factura, Promo, Descuento, Grupo, Membresía, Fecha, Ticket, Cupón, Agente FROM t4_abril 
               WHERE Cédula = ? AND Estado = ? AND Programa = ? AND Año = ?";
    $stmt4 = $conn->prepare($query4);

    if ($stmt4) {
        $stmt4->bind_param("ssss", $cedula_busqueda, $estado_busqueda, $programa_busqueda, $año_busqueda);
        $stmt4->execute();
        $stmt4->bind_result($matricula4, $mensualidad4, $factura4, $promo4, $descuento4, $grupo4, $membresia4, $fecha4, $ticket4, $cupon4, $agente4);

        while ($stmt4->fetch()) {
            $resultados["mes4"]["matricula"] = $matricula4;
            $resultados["mes4"]["mensualidad"] = $mensualidad4;
            $resultados["mes4"]["factura"] = $factura4;
            $resultados["mes4"]["promo"] = $promo4;
            $resultados["mes4"]["descuento"] = $descuento4;
            $resultados["mes4"]["grupo"] = $grupo4;
            $resultados["mes4"]["membresia"] = $membresia4;
            $resultados["mes4"]["fecha"] = $fecha4;
            $resultados["mes4"]["ticket"] = $ticket4;
            $resultados["mes4"]["cupon"] = $cupon4;
            $resultados["mes4"]["agente"] = $agente4;
        }

        $stmt4->close();
    } else {
        // Manejar errores en la preparación de la consulta
        echo "Error en la preparación de la consulta para el mes 4: " . $conn->error;
        exit;
    }

    // Consulta para el mes 5
    $query5 = "SELECT Matrícula, Mensualidad, Factura, Promo, Descuento, Grupo, Membresía, Fecha, Ticket, Cupón, Agente FROM t5_mayo 
     WHERE Cédula = ? AND Estado = ? AND Programa = ? AND Año = ?";
    $stmt5 = $conn->prepare($query5);

    if ($stmt5) {
        $stmt5->bind_param("ssss", $cedula_busqueda, $estado_busqueda, $programa_busqueda, $año_busqueda);
        $stmt5->execute();
        $stmt5->bind_result($matricula5, $mensualidad5, $factura5, $promo5, $descuento5, $grupo5, $membresia5, $fecha5, $ticket5, $cupon5, $agente5);

        while ($stmt5->fetch()) {
            $resultados["mes5"]["matricula"] = $matricula5;
            $resultados["mes5"]["mensualidad"] = $mensualidad5;
            $resultados["mes5"]["factura"] = $factura5;
            $resultados["mes5"]["promo"] = $promo5;
            $resultados["mes5"]["descuento"] = $descuento5;
            $resultados["mes5"]["grupo"] = $grupo5;
            $resultados["mes5"]["membresia"] = $membresia5;
            $resultados["mes5"]["fecha"] = $fecha5;
            $resultados["mes5"]["ticket"] = $ticket5;
            $resultados["mes5"]["cupon"] = $cupon5;
            $resultados["mes5"]["agente"] = $agente5;
        }

        $stmt5->close();
    } else {
        // Manejar errores en la preparación de la consulta
        echo "Error en la preparación de la consulta para el mes 5: " . $conn->error;
        exit;
    }


    // Consulta para el mes 6
    $query6 = "SELECT Matrícula, Mensualidad, Factura, Promo, Descuento, Grupo, Membresía, Fecha, Ticket, Cupón, Agente FROM t6_junio 
      WHERE Cédula = ? AND Estado = ? AND Programa = ? AND Año = ?";
    $stmt6 = $conn->prepare($query6);

    if ($stmt6) {
        $stmt6->bind_param("ssss", $cedula_busqueda, $estado_busqueda, $programa_busqueda, $año_busqueda);
        $stmt6->execute();
        $stmt6->bind_result($matricula6, $mensualidad6, $factura6, $promo6, $descuento6, $grupo6, $membresia6, $fecha6, $ticket6, $cupon6, $agente6);

        while ($stmt6->fetch()) {
            $resultados["mes6"]["matricula"] = $matricula6;
            $resultados["mes6"]["mensualidad"] = $mensualidad6;
            $resultados["mes6"]["factura"] = $factura6;
            $resultados["mes6"]["promo"] = $promo6;
            $resultados["mes6"]["descuento"] = $descuento6;
            $resultados["mes6"]["grupo"] = $grupo6;
            $resultados["mes6"]["membresia"] = $membresia6;
            $resultados["mes6"]["fecha"] = $fecha6;
            $resultados["mes6"]["ticket"] = $ticket6;
            $resultados["mes6"]["cupon"] = $cupon6;
            $resultados["mes6"]["agente"] = $agente6;
        }

        $stmt6->close();
    } else {
        // Manejar errores en la preparación de la consulta
        echo "Error en la preparación de la consulta para el mes 6: " . $conn->error;
        exit;
    }

    // Consulta para el mes 7
    $query7 = "SELECT Matrícula, Mensualidad, Factura, Promo, Descuento, Grupo, Membresía, Fecha, Ticket, Cupón, Agente FROM t7_julio 
               WHERE Cédula = ? AND Estado = ? AND Programa = ? AND Año = ?";
    $stmt7 = $conn->prepare($query7);

    if ($stmt7) {
        $stmt7->bind_param("ssss", $cedula_busqueda, $estado_busqueda, $programa_busqueda, $año_busqueda);
        $stmt7->execute();
        $stmt7->bind_result($matricula7, $mensualidad7, $factura7, $promo7, $descuento7, $grupo7, $membresia7, $fecha7, $ticket7, $cupon7, $agente7);

        while ($stmt7->fetch()) {
            $resultados["mes7"]["matricula"] = $matricula7;
            $resultados["mes7"]["mensualidad"] = $mensualidad7;
            $resultados["mes7"]["factura"] = $factura7;
            $resultados["mes7"]["promo"] = $promo7;
            $resultados["mes7"]["descuento"] = $descuento7;
            $resultados["mes7"]["grupo"] = $grupo7;
            $resultados["mes7"]["membresia"] = $membresia7;
            $resultados["mes7"]["fecha"] = $fecha7;
            $resultados["mes7"]["ticket"] = $ticket7;
            $resultados["mes7"]["cupon"] = $cupon7;
            $resultados["mes7"]["agente"] = $agente7;
        }

        $stmt7->close();
    } else {
        // Manejar errores en la preparación de la consulta
        echo "Error en la preparación de la consulta para el mes 7: " . $conn->error;
        exit;
    }

    // Consulta para el mes 8
    $query8 = "SELECT Matrícula, Mensualidad, Factura, Promo, Descuento, Grupo, Membresía, Fecha, Ticket, Cupón, Agente FROM t8_agosto 
WHERE Cédula = ? AND Estado = ? AND Programa = ? AND Año = ?";
    $stmt8 = $conn->prepare($query8);

    if ($stmt8) {
        $stmt8->bind_param("ssss", $cedula_busqueda, $estado_busqueda, $programa_busqueda, $año_busqueda);
        $stmt8->execute();
        $stmt8->bind_result($matricula8, $mensualidad8, $factura8, $promo8, $descuento8, $grupo8, $membresia8, $fecha8, $ticket8, $cupon8, $agente8);

        while ($stmt8->fetch()) {
            $resultados["mes8"]["matricula"] = $matricula8;
            $resultados["mes8"]["mensualidad"] = $mensualidad8;
            $resultados["mes8"]["factura"] = $factura8;
            $resultados["mes8"]["promo"] = $promo8;
            $resultados["mes8"]["descuento"] = $descuento8;
            $resultados["mes8"]["grupo"] = $grupo8;
            $resultados["mes8"]["membresia"] = $membresia8;
            $resultados["mes8"]["fecha"] = $fecha8;
            $resultados["mes8"]["ticket"] = $ticket8;
            $resultados["mes8"]["cupon"] = $cupon8;
            $resultados["mes8"]["agente"] = $agente8;
        }

        $stmt8->close();
    } else {
        echo "Error en la preparación de la consulta para el mes 8: " . $conn->error;
        exit;
    }

    // Consulta para el mes 9
    $query9 = "SELECT Matrícula, Mensualidad, Factura, Promo, Descuento, Grupo, Membresía, Fecha, Ticket, Cupón, Agente FROM t9_septiembre 
           WHERE Cédula = ? AND Estado = ? AND Programa = ? AND Año = ?";
    $stmt9 = $conn->prepare($query9);

    if ($stmt9) {
        $stmt9->bind_param("ssss", $cedula_busqueda, $estado_busqueda, $programa_busqueda, $año_busqueda);
        $stmt9->execute();
        $stmt9->bind_result($matricula9, $mensualidad9, $factura9, $promo9, $descuento9, $grupo9, $membresia9, $fecha9, $ticket9, $cupon9, $agente9);

        while ($stmt9->fetch()) {
            $resultados["mes9"]["matricula"] = $matricula9;
            $resultados["mes9"]["mensualidad"] = $mensualidad9;
            $resultados["mes9"]["factura"] = $factura9;
            $resultados["mes9"]["promo"] = $promo9;
            $resultados["mes9"]["descuento"] = $descuento9;
            $resultados["mes9"]["grupo"] = $grupo9;
            $resultados["mes9"]["membresia"] = $membresia9;
            $resultados["mes9"]["fecha"] = $fecha9;
            $resultados["mes9"]["ticket"] = $ticket9;
            $resultados["mes9"]["cupon"] = $cupon9;
            $resultados["mes9"]["agente"] = $agente9;
        }

        $stmt9->close();
    } else {
        echo "Error en la preparación de la consulta para el mes 9: " . $conn->error;
        exit;
    }


    // Consulta para el mes 10
    $query10 = "SELECT Matrícula, Mensualidad, Factura, Promo, Descuento, Grupo, Membresía, Fecha, Ticket, Cupón, Agente FROM t10_octubre 
WHERE Cédula = ? AND Estado = ? AND Programa = ? AND Año = ?";
    $stmt10 = $conn->prepare($query10);

    if ($stmt10) {
        $stmt10->bind_param("ssss", $cedula_busqueda, $estado_busqueda, $programa_busqueda, $año_busqueda);
        $stmt10->execute();
        $stmt10->bind_result($matricula10, $mensualidad10, $factura10, $promo10, $descuento10, $grupo10, $membresia10, $fecha10, $ticket10, $cupon10, $agente10);

        while ($stmt10->fetch()) {
            $resultados["mes10"]["matricula"] = $matricula10;
            $resultados["mes10"]["mensualidad"] = $mensualidad10;
            $resultados["mes10"]["factura"] = $factura10;
            $resultados["mes10"]["promo"] = $promo10;
            $resultados["mes10"]["descuento"] = $descuento10;
            $resultados["mes10"]["grupo"] = $grupo10;
            $resultados["mes10"]["membresia"] = $membresia10;
            $resultados["mes10"]["fecha"] = $fecha10;
            $resultados["mes10"]["ticket"] = $ticket10;
            $resultados["mes10"]["cupon"] = $cupon10;
            $resultados["mes10"]["agente"] = $agente10;
        }

        $stmt10->close();
    } else {
        echo "Error en la preparación de la consulta para el mes 10: " . $conn->error;
        exit;
    }

    // Consulta para el mes 11
    $query11 = "SELECT Matrícula, Mensualidad, Factura, Promo, Descuento, Grupo, Membresía, Fecha, Ticket, Cupón, Agente FROM t11_noviembre 
WHERE Cédula = ? AND Estado = ? AND Programa = ? AND Año = ?";
    $stmt11 = $conn->prepare($query11);

    if ($stmt11) {
        $stmt11->bind_param("ssss", $cedula_busqueda, $estado_busqueda, $programa_busqueda, $año_busqueda);
        $stmt11->execute();
        $stmt11->bind_result($matricula11, $mensualidad11, $factura11, $promo11, $descuento11, $grupo11, $membresia11, $fecha11, $ticket11, $cupon11, $agente11);

        while ($stmt11->fetch()) {
            $resultados["mes11"]["matricula"] = $matricula11;
            $resultados["mes11"]["mensualidad"] = $mensualidad11;
            $resultados["mes11"]["factura"] = $factura11;
            $resultados["mes11"]["promo"] = $promo11;
            $resultados["mes11"]["descuento"] = $descuento11;
            $resultados["mes11"]["grupo"] = $grupo11;
            $resultados["mes11"]["membresia"] = $membresia11;
            $resultados["mes11"]["fecha"] = $fecha11;
            $resultados["mes11"]["ticket"] = $ticket11;
            $resultados["mes11"]["cupon"] = $cupon11;
            $resultados["mes11"]["agente"] = $agente11;
        }

        $stmt11->close();
    } else {
        echo "Error en la preparación de la consulta para el mes 11: " . $conn->error;
        exit;
    }

    // Consulta para el mes 12
    $query12 = "SELECT Matrícula, Mensualidad, Factura, Promo, Descuento, Grupo, Membresía, Fecha, Ticket, Cupón, Agente FROM t12_diciembre 
WHERE Cédula = ? AND Estado = ? AND Programa = ? AND Año = ?";
    $stmt12 = $conn->prepare($query12);

    if ($stmt12) {
        $stmt12->bind_param("ssss", $cedula_busqueda, $estado_busqueda, $programa_busqueda, $año_busqueda);
        $stmt12->execute();
        $stmt12->bind_result($matricula12, $mensualidad12, $factura12, $promo12, $descuento12, $grupo12, $membresia12, $fecha12, $ticket12, $cupon12, $agente12);

        while ($stmt12->fetch()) {
            $resultados["mes12"]["matricula"] = $matricula12;
            $resultados["mes12"]["mensualidad"] = $mensualidad12;
            $resultados["mes12"]["factura"] = $factura12;
            $resultados["mes12"]["promo"] = $promo12;
            $resultados["mes12"]["descuento"] = $descuento12;
            $resultados["mes12"]["grupo"] = $grupo12;
            $resultados["mes12"]["membresia"] = $membresia12;
            $resultados["mes12"]["fecha"] = $fecha12;
            $resultados["mes12"]["ticket"] = $ticket12;
            $resultados["mes12"]["cupon"] = $cupon12;
            $resultados["mes12"]["agente"] = $agente12;
        }

        $stmt12->close();
    } else {
        echo "Error en la preparación de la consulta para el mes 12: " . $conn->error;
        exit;
    }

    // Convertir resultados a formato JSON
    $json_resultados = json_encode($resultados);

    // Enviar respuesta JSON al cliente
    echo $json_resultados;

    // Cerrar conexión a la base de datos
    $conn->close();

}