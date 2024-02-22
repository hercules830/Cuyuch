<?php
// Verificar si la sesión no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Iniciar la sesión si no está iniciada

    $usuario = $_SESSION['usuario'];

    if (!isset($usuario)) {
        header("location: ../php/login.php");
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/Proyecto_Cuyuch/css/clases_generales.css">
    <link rel="stylesheet" href="http://localhost/Proyecto_Cuyuch/css/principal.css">
    <link rel="stylesheet" href="http://localhost/Proyecto_Cuyuch/css/tabla.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <style>
        #flecha {
            position: fixed;
            top: 0;
            left: 0;
            margin: 10px;
            /* Ajusta los márgenes según tus necesidades */
        }

        .contenedor-flex {
            display: flex;
            justify-content: space-between;
            /* Distribuye los elementos a lo largo del contenedor con espacio entre ellos */
        }

        .contenedor-flex>div {
            width: 48%;
            /* Establece el ancho de cada div */
        }

        /* Estilos adicionales para los fieldset y botones */
        .fieldset-espacio {
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 10px;
        }
    </style>

    <?php
    // fichaProgramas.php
    
    $mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';

    if ($mensaje === 'exito') {
        ?>
        <style>
            .nuevo_cliente {
                position: absolute;
                background-color: green;
                color: lightgreen;
                padding: 20px;
                border-radius: 5px;
                text-align: center;
                z-index: 9999;
            }
        </style>
        <script>
            setTimeout(function () {
                var nuevo_cliente = document.querySelector('.nuevo_cliente');
                if (nuevo_cliente) {
                    nuevo_cliente.style.display = 'none';
                }
            }, 5000);
        </script>
        <h3 class="nuevo_cliente">El cliente se ha agregado exitosamente</h3>
        <?php
    } elseif ($mensaje === 'error') {
        $error_message = isset($_GET['error_message']) ? urldecode($_GET['error_message']) : 'Error desconocido';
        echo "Error al registrar cliente: " . $error_message;
    } elseif ($mensaje === 'existe') {

        ?>
        <style>
            .cliente_existe {
                position: absolute;
                background-color: red;
                color: lightgreen;
                padding: 20px;
                border-radius: 5px;
                text-align: center;
                z-index: 9999;
            }
        </style>
        <script>
            // Ocultar el mensaje de error después de 5 segundos
            setTimeout(function () {
                var cliente_existe = document.querySelector('.cliente_existe');
                if (cliente_existe) {
                    cliente_existe.style.display = 'none';
                }
            }, 5000);
        </script>
        <h3 class="cliente_existe">El cliente ya existe en la base de datos</h3>
        <?php
    } elseif ($mensaje === 'actualizar') {
        ?>
        <style>
            .actualizar_existente {
                position: absolute;
                background-color: green;
                color: lightgreen;
                padding: 20px;
                border-radius: 5px;
                text-align: center;
                z-index: 9999;
            }
        </style>
        <script>
            // Ocultar el mensaje de error después de 5 segundos
            setTimeout(function () {
                var actualizar_existente = document.querySelector('.actualizar_existente');
                if (actualizar_existente) {
                    actualizar_existente.style.display = 'none';
                }
            }, 5000);
        </script>
        <h3 class="actualizar_existente">Datos del cliente actualizados exitosamente</h3>
        <?php
    } elseif ($mensaje === 'no_existe') {
        ?>
        <style>
            .cliente_inexistente {
                position: absolute;
                background-color: red;
                color: lightgreen;
                padding: 20px;
                border-radius: 5px;
                text-align: center;
                z-index: 9999;
            }
        </style>
        <script>
            // Ocultar el mensaje de error después de 5 segundos
            setTimeout(function () {
                var no_cliente = document.querySelector('.cliente_inexistente');
                if (no_cliente) {
                    no_cliente.style.display = 'none';
                }
            }, 5000);
        </script>
        <h3 class="cliente_inexistente">El cliente no se encuentra registrado en la base de datos</h3>
        <?php
    }
    ?>


    <title>Ficha de Ingreso</title>
</head>

<body class="paddinV-1rem flex flex--centrarh flex--centrarv">



    <div class="container ficha">
        <?php
        // Agrega este bloque de código para depuración
        echo "Usuario: " . $_SESSION['usuario'] . "<br>";
        echo "Rol: " . $_SESSION['rol'] . "<br>";

        if ($_SESSION['rol'] == 'Administrador') {
            ?>
            <a id="flecha" href="../Php/administrador.php">
                <img id="regresar" src="../img/programas/regresar.jpg" width="40px" alt="">
            </a>
            <?php
        }
        ?>






        <!-- form -->
        <form name="form" id="miFormulario" action="php_fichaProgramas.php" method="post">


            <input type="text" id="cedula_busqueda" name="cedula_busqueda" placeholder="Buscar cédula">



            <select name="" class="programa" id="programa_busqueda">
                <option value="">Busca el programa</option>
                <option value="Ballet">Ballet</option>
                <option value="Natación">Natación</option>
                <option value="Karate">Karate</option>
                <option value="Piano">Piano</option>
                <option value="Guitarra">Guitarra</option>
                <option value="Canto">Canto</option>
            </select>


            <select id="estado_busqueda" name="estado_busqueda">
                <option value="Activo">Activo</option>
                <option value="Pendiente">Pendiente</option>
                <option value="Inactivo">Inactivo</option>
            </select>

            <select id="año_busqueda" name="año_busqueda">
                <?php
                // Obtén el año actual
                $añoActual = date("Y");

                // Establece el año inicial en 2000
                $añoInicial = 2000;

                $añoFinal = 2100;

                // Genera una lista de años desde 2000 hasta 2100
                for ($i = $añoInicial; $i <= $añoFinal; $i++) {
                    $seleccionado = ($i == $añoActual) ? "selected" : "";
                    echo "<option value='$i' $seleccionado>$i</option>";
                }
                ?>
            </select>

            <button type="button" onclick="buscar()">Buscar</button>
            <button type="button" onclick="limpiarInputs()">Limpiar tabla de datos</button>

            <button type="button" onclick="mostrarFormulario()">Desbloquear Elementos</button>

            

            




            <header>

                <div class="flex izq-der">
                    <fieldset>
                        <legend>Estado</legend>
                        <label>
                            <input type="radio" name="estado" value="Activo" checked<?php echo (isset($_POST['estado']) && $_POST['estado'] === 'Activo') ? 'checked' : ''; ?>>
                            Activo
                        </label>
                        <label>
                            <input type="radio" name="estado" value="Inactivo" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'Inactivo') ? 'checked' : ''; ?>>
                            Inactivo
                        </label>
                        <label>
                            <input type="radio" name="estado" value="Pendiente" <?php echo (isset($_POST['estado']) && $_POST['estado'] === 'Pendiente') ? 'checked' : ''; ?>>
                            Pendiente
                        </label>
                    </fieldset>



                    <div class="flex izq-der">
                        <fieldset>
                            <legend>Enviar ficha como:</legend>

                            <label>
                                <input type="radio" name="accion" value="update">
                                Actualizar
                            </label>

                            <label>
                                <input type="radio" name="accion" value="insert" checked>
                                Ingresar
                            </label>
                        </fieldset>
                    </div>

                    <select id="Año" name="año">
                        <?php
                        // Obtén el año actual
                        $añoActual = date("Y");

                        // Establece el año inicial en 2000
                        $añoInicial = 2000;

                        $añoFinal = 2100;

                        // Genera una lista de años desde 2000 hasta 2100
                        for ($i = $añoInicial; $i <= $añoFinal; $i++) {
                            $seleccionado = ($i == $añoActual) ? "selected" : "";
                            echo "<option value='$i' $seleccionado>$i</option>";
                        }
                        ?>
                    </select>



                    <input type="submit" value="Enviar" onclick="return confirmarEnvio()">

                </div>



                <button id="configuracion" type="button" onclick="showLoginForm()">Configuración</button>




                <div id="centrarPrograma">
                    <select name="programa" class="programa" id="Programa" required>
                        <option value="">Elije programa</option>
                        <option value="Ballet">Ballet</option>
                        <option value="Natación">Natación</option>
                        <option value="Karate">Karate</option>
                        <option value="Piano">Piano</option>
                        <option value="Guitarra">Guitarra</option>
                        <option value="Canto">Canto</option>
                    </select>
                </div>




                <div class="datos flex paddingV-1rem izq-der gap">
                    <div class="datos1 flex">
                        <ul>
                            <li><input type="text" id="Nombre" name="nombre" placeholder="Nombre del alumno"
                                    value="<?php echo isset($_POST['nombre']) ? $_POST['nombre'] : ''; ?>" required>
                            </li>

                            <li><input type="text" id="Responsable" name="responsable"
                                    placeholder="Nombre del responsable"
                                    value="<?php echo isset($_POST['responsable']) ? $_POST['responsable'] : ''; ?>"
                                    required></li>

                            <li><select name="instituto" id="Instituto">
                                    <optgroup>
                                        <option value="">Nombre del Instituto</option>
                                    </optgroup>
                                </select></li>

                            <li><input type="text" id="Cédula" name="cedula" placeholder="Número de cédula"
                                    value="<?php echo isset($_POST['cedula']) ? $_POST['cedula'] : ''; ?>" required>
                            </li>
                        </ul>

                    </div>
                    <div class="datos2 flex">
                        <ul>
                            <li><input type="text" id="Nacimiento" name="nacimiento" onfocus="(this.type='date')"
                                    onblur="(this.type='text')" placeholder="Fecha de Nacimiento"
                                    value="<?php echo isset($_POST['nacimiento']) ? $_POST['nacimiento'] : ''; ?>"
                                    required></li>
                            <li><input type="text" id="Dirección" name="direccion" placeholder="Dirección"
                                    value="<?php echo isset($_POST['direccion']) ? $_POST['direccion'] : ''; ?>"
                                    required></li>
                            <li><input type="email" id="Email" name="email" placeholder="Email"
                                    value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" required></li>
                        </ul>
                    </div>



                    <div class="datos3 flex">
                        <ul>
                            <li><input type="number" id="Celular1" name="celular1" placeholder="Celular 1"
                                    value="<?php echo isset($_POST['celular1']) ? $_POST['celular1'] : ''; ?>" required>
                            </li>
                            <li><input type="number" id="Celular2" name="celular2" placeholder="Celular 2"
                                    value="<?php echo isset($_POST['celular2']) ? $_POST['celular2'] : ''; ?>" required>
                            </li>
                            <li><input type="text" id="Ingreso" name="ingreso" onfocus="(this.type='date')"
                                    onblur="(this.type='text')" placeholder="Ingreso"
                                    value="<?php echo isset($_POST['ingreso']) ? $_POST['ingreso'] : ''; ?>" required>
                            </li>
                        </ul>
                    </div>

                    <div class="datos4">
                        <ul>
                            <li>



                                <select name="horario" class="select-horario" id="Horario">
                                    <option value="" selected>Horario</option>
                                    <option value="Lun-Mier-Vie">Lun-Mier-Vie</option>
                                    <option value="Martes-Jueves">Martes-Jueves</option>
                                    <option value="Sábado">Sábado</option>
                                    <option value="Indefinido">Indefinido</option>
                                </select>

                            </li>
                            <li><input type="text" id="Entrada" name="entrada"
                                    onfocus="(this.type='time'); this.step='3600'; this.pattern='[0-2][0-9]:[0-5][0-9]'"
                                    onblur="(this.type='text')" placeholder="Hora de entrada"
                                    value="<?php echo isset($_POST['entrada']) ? $_POST['entrada'] : ''; ?>" required>
                            </li>
                            <li><input type="text" id="Salida" name="salida"
                                    onfocus="(this.type='time'); this.step='3600'; this.pattern='[0-2][0-9]:[0-5][0-9]'"
                                    onblur="(this.type='text')" placeholder="Hora de salida"
                                    value="<?php echo isset($_POST['salida']) ? $_POST['salida'] : ''; ?>" required>
                            </li>


                        </ul>
                    </div>
                </div>
            </header>

            <div class="container tabla">
                <ul style="list-style:none; display:flex;">
                    <li><input type="text" class="textoMeses" disabled placeholder="Datos"></li>
                    <li><input type="text" class="textoMeses" disabled placeholder="Enero"></li>
                    <li><input type="text" class="textoMeses" disabled placeholder="Febrero"></li>
                    <li><input type="text" class="textoMeses" disabled placeholder="Marzo"></li>
                    <li><input type="text" class="textoMeses" disabled placeholder="Abril"></li>
                    <li><input type="text" class="textoMeses" disabled placeholder="Mayo"></li>
                    <li><input type="text" class="textoMeses" disabled placeholder="Junio"></li>
                    <li><input type="text" class="textoMeses" disabled placeholder="Julio"></li>
                    <li><input type="text" class="textoMeses" disabled placeholder="Agosto"></li>
                    <li><input type="text" class="textoMeses" disabled placeholder="Septiembre"></li>
                    <li><input type="text" class="textoMeses" disabled placeholder="Octubre"></li>
                    <li><input type="text" class="textoMeses" disabled placeholder="Noviembre"></li>
                    <li><input type="text" class="textoMeses" disabled placeholder="Diciembre"></li>
                </ul>

                <ul style="list-style:none; display:flex;">
                    <li><input id="matricula" type="text" disabled placeholder="Matrícula"></li>

                    <li>
                        <select id="matricula1" class="selectMoneda" name="matricula1">
                            <option value="">0</option>
                            <option value="800">800</option>
                            <option class="opcionGratis" value="Gratis">Gratis</option>
                        </select>
                    </li>

                    <li>
                        <select id="matricula2" class="selectMoneda" name="matricula2">
                            <option value="">0</option>
                            <option value="800">800</option>
                            <option class="opcionGratis" value="Gratis">Gratis</option>
                        </select>
                    </li>

                    <li>
                        <select id="matricula3" class="selectMoneda" name="matricula3">
                            <option value="">0</option>
                            <option value="800">800</option>
                            <option class="opcionGratis" value="Gratis">Gratis</option>
                        </select>
                    </li>

                    <li>
                        <select id="matricula4" class="selectMoneda" name="matricula4">
                            <option value="">0</option>
                            <option value="800">800</option>
                            <option class="opcionGratis" value="Gratis">Gratis</option>
                        </select>
                    </li>

                    <li>
                        <select id="matricula5" class="selectMoneda" name="matricula5">
                            <option value="">0</option>
                            <option value="800">800</option>
                            <option class="opcionGratis" value="Gratis">Gratis</option>
                        </select>
                    </li>

                    <li>
                        <select id="matricula6" class="selectMoneda" name="matricula6">
                            <option value="">0</option>
                            <option value="800">800</option>
                            <option class="opcionGratis" value="Gratis">Gratis</option>
                        </select>
                    </li>

                    <li>
                        <select id="matricula7" class="selectMoneda" name="matricula7">
                            <option value="">0</option>
                            <option value="800">800</option>
                            <option class="opcionGratis" value="Gratis">Gratis</option>
                        </select>
                    </li>

                    <li>
                        <select id="matricula8" class="selectMoneda" name="matricula8">
                            <option value="">0</option>
                            <option value="800">800</option>
                            <option class="opcionGratis" value="Gratis">Gratis</option>
                        </select>
                    </li>

                    <li>
                        <select id="matricula9" class="selectMoneda" name="matricula9">
                            <option value="">0</option>
                            <option value="800">800</option>
                            <option class="opcionGratis" value="Gratis">Gratis</option>
                        </select>
                    </li>

                    <li>
                        <select id="matricula10" class="selectMoneda" name="matricula10">
                            <option value="">0</option>
                            <option value="800">800</option>
                            <option class="opcionGratis" value="Gratis">Gratis</option>
                        </select>
                    </li>

                    <li>
                        <select id="matricula11" class="selectMoneda" name="matricula11">
                            <option value="">0</option>
                            <option value="800">800</option>
                            <option class="opcionGratis" value="Gratis">Gratis</option>
                        </select>
                    </li>

                    <li>
                        <select id="matricula12" class="selectMoneda" name="matricula12">
                            <option value="">0</option>
                            <option value="800">800</option>
                            <option class="opcionGratis" value="Gratis">Gratis</option>
                        </select>
                    </li>





                </ul>
                <ul style="list-style:none; display:flex;">
                    <li><input type="text" disabled placeholder="Mensualidad" id="mensualidad"></li>
                    <li><input type="text" onblur="moneda(this)" name="mensualidad1"
                            value="<?php echo isset($_POST['mensualidad1']) ? $_POST['mensualidad1'] : ''; ?>"
                            id="mensualidad1"></li>
                    <li><input type="text" onblur="moneda(this)" name="mensualidad2"
                            value="<?php echo isset($_POST['mensualidad2']) ? $_POST['mensualidad2'] : ''; ?>"
                            id="mensualidad2"></li>
                    <li><input type="text" onblur="moneda(this)" name="mensualidad3"
                            value="<?php echo isset($_POST['mensualidad3']) ? $_POST['mensualidad3'] : ''; ?>"
                            id="mensualidad3"></li>
                    <li><input type="text" onblur="moneda(this)" name="mensualidad4"
                            value="<?php echo isset($_POST['mensualidad4']) ? $_POST['mensualidad4'] : ''; ?>"
                            id="mensualidad4"></li>
                    <li><input type="text" onblur="moneda(this)" name="mensualidad5"
                            value="<?php echo isset($_POST['mensualidad5']) ? $_POST['mensualidad5'] : ''; ?>"
                            id="mensualidad5"></li>
                    <li><input type="text" onblur="moneda(this)" name="mensualidad6"
                            value="<?php echo isset($_POST['mensualidad6']) ? $_POST['mensualidad6'] : ''; ?>"
                            id="mensualidad6"></li>
                    <li><input type="text" onblur="moneda(this)" name="mensualidad7"
                            value="<?php echo isset($_POST['mensualidad7']) ? $_POST['mensualidad7'] : ''; ?>"
                            id="mensualidad7"></li>
                    <li><input type="text" onblur="moneda(this)" name="mensualidad8"
                            value="<?php echo isset($_POST['mensualidad8']) ? $_POST['mensualidad8'] : ''; ?>"
                            id="mensualidad8"></li>
                    <li><input type="text" onblur="moneda(this)" name="mensualidad9"
                            value="<?php echo isset($_POST['mensualidad9']) ? $_POST['mensualidad9'] : ''; ?>"
                            id="mensualidad9"></li>
                    <li><input type="text" onblur="moneda(this)" name="mensualidad10"
                            value="<?php echo isset($_POST['mensualidad10']) ? $_POST['mensualidad10'] : ''; ?>"
                            id="mensualidad10"></li>
                    <li><input type="text" onblur="moneda(this)" name="mensualidad11"
                            value="<?php echo isset($_POST['mensualidad11']) ? $_POST['mensualidad11'] : ''; ?>"
                            id="mensualidad11"></li>
                    <li><input type="text" onblur="moneda(this)" name="mensualidad12"
                            value="<?php echo isset($_POST['mensualidad12']) ? $_POST['mensualidad12'] : ''; ?>"
                            id="mensualidad12"></li>
                </ul>


                </ul>

                <ul style="list-style:none; display:flex;">
                    <li><input type="text" disabled placeholder="Factura" id="factura"></li>
                    <li><input type="number" name="factura1"
                            value="<?php echo isset($_POST['factura1']) ? $_POST['factura1'] : ''; ?>" id="factura1">
                    </li>
                    <li><input type="number" name="factura2"
                            value="<?php echo isset($_POST['factura2']) ? $_POST['factura2'] : ''; ?>" id="factura2">
                    </li>
                    <li><input type="number" name="factura3"
                            value="<?php echo isset($_POST['factura3']) ? $_POST['factura3'] : ''; ?>" id="factura3">
                    </li>
                    <li><input type="number" name="factura4"
                            value="<?php echo isset($_POST['factura4']) ? $_POST['factura4'] : ''; ?>" id="factura4">
                    </li>
                    <li><input type="number" name="factura5"
                            value="<?php echo isset($_POST['factura5']) ? $_POST['factura5'] : ''; ?>" id="factura5">
                    </li>
                    <li><input type="number" name="factura6"
                            value="<?php echo isset($_POST['factura6']) ? $_POST['factura6'] : ''; ?>" id="factura6">
                    </li>
                    <li><input type="number" name="factura7"
                            value="<?php echo isset($_POST['factura7']) ? $_POST['factura7'] : ''; ?>" id="factura7">
                    </li>
                    <li><input type="number" name="factura8"
                            value="<?php echo isset($_POST['factura8']) ? $_POST['factura8'] : ''; ?>" id="factura8">
                    </li>
                    <li><input type="number" name="factura9"
                            value="<?php echo isset($_POST['factura9']) ? $_POST['factura9'] : ''; ?>" id="factura9">
                    </li>
                    <li><input type="number" name="factura10"
                            value="<?php echo isset($_POST['factura10']) ? $_POST['factura10'] : ''; ?>" id="factura10">
                    </li>
                    <li><input type="number" name="factura11"
                            value="<?php echo isset($_POST['factura11']) ? $_POST['factura11'] : ''; ?>" id="factura11">
                    </li>
                    <li><input type="number" name="factura12"
                            value="<?php echo isset($_POST['factura12']) ? $_POST['factura12'] : ''; ?>" id="factura12">
                    </li>

                </ul>
                <ul style="list-style:none; display:flex;">
                    <li><input type="text" disabled placeholder="Promo #" id="promo"></li>
                    <li><input type="text" oninput="sinEspacios(event)" name="promo1"
                            value="<?php echo isset($_POST['promo1']) ? $_POST['promo1'] : ''; ?>" id="promo1"></li>
                    <li><input type="text" oninput="sinEspacios(event)" name="promo2"
                            value="<?php echo isset($_POST['promo2']) ? $_POST['promo2'] : ''; ?>" id="promo2"></li>
                    <li><input type="text" oninput="sinEspacios(event)" name="promo3"
                            value="<?php echo isset($_POST['promo3']) ? $_POST['promo3'] : ''; ?>" id="promo3"></li>
                    <li><input type="text" oninput="sinEspacios(event)" name="promo4"
                            value="<?php echo isset($_POST['promo4']) ? $_POST['promo4'] : ''; ?>" id="promo4"></li>
                    <li><input type="text" oninput="sinEspacios(event)" name="promo5"
                            value="<?php echo isset($_POST['promo5']) ? $_POST['promo5'] : ''; ?>" id="promo5"></li>
                    <li><input type="text" oninput="sinEspacios(event)" name="promo6"
                            value="<?php echo isset($_POST['promo6']) ? $_POST['promo6'] : ''; ?>" id="promo6"></li>
                    <li><input type="text" oninput="sinEspacios(event)" name="promo7"
                            value="<?php echo isset($_POST['promo7']) ? $_POST['promo7'] : ''; ?>" id="promo7"></li>
                    <li><input type="text" oninput="sinEspacios(event)" name="promo8"
                            value="<?php echo isset($_POST['promo8']) ? $_POST['promo8'] : ''; ?>" id="promo8"></li>
                    <li><input type="text" oninput="sinEspacios(event)" name="promo9"
                            value="<?php echo isset($_POST['promo9']) ? $_POST['promo9'] : ''; ?>" id="promo9"></li>
                    <li><input type="text" oninput="sinEspacios(event)" name="promo10"
                            value="<?php echo isset($_POST['promo10']) ? $_POST['promo10'] : ''; ?>" id="promo10"></li>
                    <li><input type="text" oninput="sinEspacios(event)" name="promo11"
                            value="<?php echo isset($_POST['promo11']) ? $_POST['promo11'] : ''; ?>" id="promo11"></li>
                    <li><input type="text" oninput="sinEspacios(event)" name="promo12"
                            value="<?php echo isset($_POST['promo12']) ? $_POST['promo12'] : ''; ?>" id="promo12"></li>

                </ul>
                <ul style="list-style:none; display:flex;">
                    <li><input type="text" placeholder="Descuento" disabled id="descuento"></li>
                    <li><input type="text" onblur="moneda(this)" name="descuento1"
                            value="<?php echo isset($_POST['descuento1']) ? $_POST['descuento1'] : ''; ?>"
                            id="descuento1"></li>
                    <li><input type="text" onblur="moneda(this)" name="descuento2"
                            value="<?php echo isset($_POST['descuento2']) ? $_POST['descuento2'] : ''; ?>"
                            id="descuento2"></li>
                    <li><input type="text" onblur="moneda(this)" name="descuento3"
                            value="<?php echo isset($_POST['descuento3']) ? $_POST['descuento3'] : ''; ?>"
                            id="descuento3"></li>
                    <li><input type="text" onblur="moneda(this)" name="descuento4"
                            value="<?php echo isset($_POST['descuento4']) ? $_POST['descuento4'] : ''; ?>"
                            id="descuento4"></li>
                    <li><input type="text" onblur="moneda(this)" name="descuento5"
                            value="<?php echo isset($_POST['descuento5']) ? $_POST['descuento5'] : ''; ?>"
                            id="descuento5"></li>
                    <li><input type="text" onblur="moneda(this)" name="descuento6"
                            value="<?php echo isset($_POST['descuento6']) ? $_POST['descuento6'] : ''; ?>"
                            id="descuento6"></li>
                    <li><input type="text" onblur="moneda(this)" name="descuento7"
                            value="<?php echo isset($_POST['descuento7']) ? $_POST['descuento7'] : ''; ?>"
                            id="descuento7"></li>
                    <li><input type="text" onblur="moneda(this)" name="descuento8"
                            value="<?php echo isset($_POST['descuento8']) ? $_POST['descuento8'] : ''; ?>"
                            id="descuento8"></li>
                    <li><input type="text" onblur="moneda(this)" name="descuento9"
                            value="<?php echo isset($_POST['descuento9']) ? $_POST['descuento9'] : ''; ?>"
                            id="descuento9"></li>
                    <li><input type="text" onblur="moneda(this)" name="descuento10"
                            value="<?php echo isset($_POST['descuento10']) ? $_POST['descuento10'] : ''; ?>"
                            id="descuento10"></li>
                    <li><input type="text" onblur="moneda(this)" name="descuento11"
                            value="<?php echo isset($_POST['descuento11']) ? $_POST['descuento11'] : ''; ?>"
                            id="descuento11"></li>
                    <li><input type="text" onblur="moneda(this)" name="descuento12"
                            value="<?php echo isset($_POST['descuento12']) ? $_POST['descuento12'] : ''; ?>"
                            id="descuento12"></li>


                </ul>
                <ul style="list-style:none; display:flex;">
                    <li><input type="text" disabled placeholder="Grupo #" id="grupo"></li>
                    <li><input type="text" oninput="simboloNumeral(event)" name="grupo1"
                            value="<?php echo isset($_POST['grupo1']) ? $_POST['grupo1'] : ''; ?>" id="grupo1"></li>
                    <li><input type="text" oninput="simboloNumeral(event)" name="grupo2"
                            value="<?php echo isset($_POST['grupo2']) ? $_POST['grupo2'] : ''; ?>" id="grupo2"></li>
                    <li><input type="text" oninput="simboloNumeral(event)" name="grupo3"
                            value="<?php echo isset($_POST['grupo3']) ? $_POST['grupo3'] : ''; ?>" id="grupo3"></li>
                    <li><input type="text" oninput="simboloNumeral(event)" name="grupo4"
                            value="<?php echo isset($_POST['grupo4']) ? $_POST['grupo4'] : ''; ?>" id="grupo4"></li>
                    <li><input type="text" oninput="simboloNumeral(event)" name="grupo5"
                            value="<?php echo isset($_POST['grupo5']) ? $_POST['grupo5'] : ''; ?>" id="grupo5"></li>
                    <li><input type="text" oninput="simboloNumeral(event)" name="grupo6"
                            value="<?php echo isset($_POST['grupo6']) ? $_POST['grupo6'] : ''; ?>" id="grupo6"></li>
                    <li><input type="text" oninput="simboloNumeral(event)" name="grupo7"
                            value="<?php echo isset($_POST['grupo7']) ? $_POST['grupo7'] : ''; ?>" id="grupo7"></li>
                    <li><input type="text" oninput="simboloNumeral(event)" name="grupo8"
                            value="<?php echo isset($_POST['grupo8']) ? $_POST['grupo8'] : ''; ?>" id="grupo8"></li>
                    <li><input type="text" oninput="simboloNumeral(event)" name="grupo9"
                            value="<?php echo isset($_POST['grupo9']) ? $_POST['grupo9'] : ''; ?>" id="grupo9"></li>
                    <li><input type="text" oninput="simboloNumeral(event)" name="grupo10"
                            value="<?php echo isset($_POST['grupo10']) ? $_POST['grupo10'] : ''; ?>" id="grupo10"></li>
                    <li><input type="text" oninput="simboloNumeral(event)" name="grupo11"
                            value="<?php echo isset($_POST['grupo11']) ? $_POST['grupo11'] : ''; ?>" id="grupo11"></li>
                    <li><input type="text" oninput="simboloNumeral(event)" name="grupo12"
                            value="<?php echo isset($_POST['grupo12']) ? $_POST['grupo12'] : ''; ?>" id="grupo12"></li>
                </ul>

                </ul>
                <ul style="list-style:none; display:flex;">

                    <li><input id="membresia" type="text" disabled placeholder="Membresía"></li>


                    <li><select id="membresia1" class="membresia-select" name="membresia1">
                            <option value="">Membresía</option>
                            <option value="Oro">Oro</option>
                            <option value="Plata">Plata</option>
                            <option value="Bronce">Bronce</option>
                            <option value="Duo">Duo</option>
                            <option value="Grupal">Grupal</option>

                        </select></li>


                    <li><select id="membresia2" class="membresia-select" name="membresia2">
                            <option value="">Membresía</option>
                            <option value="Oro">Oro</option>
                            <option value="Plata">Plata</option>
                            <option value="Bronce">Bronce</option>
                            <option value="Duo">Duo</option>
                            <option value="Grupal">Grupal</option>

                        </select></li>

                    <li><select id="membresia3" class="membresia-select" name="membresia3">
                            <option value="">Membresía</option>
                            <option value="Oro">Oro</option>
                            <option value="Plata">Plata</option>
                            <option value="Bronce">Bronce</option>
                            <option value="Duo">Duo</option>
                            <option value="Grupal">Grupal</option>

                        </select></li>

                    <li><select id="membresia4" class="membresia-select" name="membresia4">
                            <option value="">Membresía</option>
                            <option value="Oro">Oro</option>
                            <option value="Plata">Plata</option>
                            <option value="Bronce">Bronce</option>
                            <option value="Duo">Duo</option>
                            <option value="Grupal">Grupal</option>

                        </select></li>

                    <li><select id="membresia5" class="membresia-select" name="membresia5">
                            <option value="">Membresía</option>
                            <option value="Oro">Oro</option>
                            <option value="Plata">Plata</option>
                            <option value="Bronce">Bronce</option>
                            <option value="Duo">Duo</option>
                            <option value="Grupal">Grupal</option>

                        </select></li>

                    <li><select id="membresia6" class="membresia-select" name="membresia6">
                            <option value="">Membresía</option>
                            <option value="Oro">Oro</option>
                            <option value="Plata">Plata</option>
                            <option value="Bronce">Bronce</option>
                            <option value="Duo">Duo</option>
                            <option value="Grupal">Grupal</option>

                        </select></li>

                    <li><select id="membresia7" class="membresia-select" name="membresia7">
                            <option value="">Membresía</option>
                            <option value="Oro">Oro</option>
                            <option value="Plata">Plata</option>
                            <option value="Bronce">Bronce</option>
                            <option value="Duo">Duo</option>
                            <option value="Grupal">Grupal</option>

                        </select></li>

                    <li><select id="membresia8" class="membresia-select" name="membresia8">
                            <option value="">Membresía</option>
                            <option value="Oro">Oro</option>
                            <option value="Plata">Plata</option>
                            <option value="Bronce">Bronce</option>
                            <option value="Duo">Duo</option>
                            <option value="Grupal">Grupal</option>

                        </select></li>

                    <li><select id="membresia9" class="membresia-select" name="membresia9">
                            <option value="">Membresía</option>
                            <option value="Oro">Oro</option>
                            <option value="Plata">Plata</option>
                            <option value="Bronce">Bronce</option>
                            <option value="Duo">Duo</option>
                            <option value="Grupal">Grupal</option>

                        </select></li>

                    <li><select id="membresia10" class="membresia-select" name="membresia10">
                            <option value="">Membresía</option>
                            <option value="Oro">Oro</option>
                            <option value="Plata">Plata</option>
                            <option value="Bronce">Bronce</option>
                            <option value="Duo">Duo</option>
                            <option value="Grupal">Grupal</option>

                        </select></li>

                    <li><select id="membresia11" class="membresia-select" name="membresia11">
                            <option value="">Membresía</option>
                            <option value="Oro">Oro</option>
                            <option value="Plata">Plata</option>
                            <option value="Bronce">Bronce</option>
                            <option value="Duo">Duo</option>
                            <option value="Grupal">Grupal</option>

                        </select></li>

                    <li><select id="membresia12" class="membresia-select" name="membresia12">
                            <option value="">Membresía</option>
                            <option value="Oro">Oro</option>
                            <option value="Plata">Plata</option>
                            <option value="Bronce">Bronce</option>
                            <option value="Duo">Duo</option>
                            <option value="Grupal">Grupal</option>

                        </select></li>
                </ul>


                <ul style="list-style:none; display:flex;">
                    <li><input type="text" disabled placeholder="Fecha"></li>

                    <ul style="list-style:none; display:flex;">
                        <li><input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="fecha1"
                                value="<?php echo isset($_POST['fecha1']) ? $_POST['fecha1'] : ''; ?>" id="fecha1"></li>
                        <li><input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="fecha2"
                                value="<?php echo isset($_POST['fecha2']) ? $_POST['fecha2'] : ''; ?>" id="fecha2"></li>
                        <li><input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="fecha3"
                                value="<?php echo isset($_POST['fecha3']) ? $_POST['fecha3'] : ''; ?>" id="fecha3"></li>
                        <li><input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="fecha4"
                                value="<?php echo isset($_POST['fecha4']) ? $_POST['fecha4'] : ''; ?>" id="fecha4"></li>
                        <li><input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="fecha5"
                                value="<?php echo isset($_POST['fecha5']) ? $_POST['fecha5'] : ''; ?>" id="fecha5"></li>
                        <li><input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="fecha6"
                                value="<?php echo isset($_POST['fecha6']) ? $_POST['fecha6'] : ''; ?>" id="fecha6"></li>
                        <li><input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="fecha7"
                                value="<?php echo isset($_POST['fecha7']) ? $_POST['fecha7'] : ''; ?>" id="fecha7"></li>
                        <li><input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="fecha8"
                                value="<?php echo isset($_POST['fecha8']) ? $_POST['fecha8'] : ''; ?>" id="fecha8"></li>
                        <li><input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="fecha9"
                                value="<?php echo isset($_POST['fecha9']) ? $_POST['fecha9'] : ''; ?>" id="fecha9"></li>
                        <li><input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="fecha10"
                                value="<?php echo isset($_POST['fecha10']) ? $_POST['fecha10'] : ''; ?>" id="fecha10">
                        </li>
                        <li><input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="fecha11"
                                value="<?php echo isset($_POST['fecha11']) ? $_POST['fecha11'] : ''; ?>" id="fecha11">
                        </li>
                        <li><input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="fecha12"
                                value="<?php echo isset($_POST['fecha12']) ? $_POST['fecha12'] : ''; ?>" id="fecha12">
                        </li>
                    </ul>

                </ul>



                <ul style="list-style:none; display:flex;">
                    <li><input type="text" disabled placeholder="Ticket" id="ticket"></li>
                    <li><input type="text" oninput="sinEspacios(event);" name="ticket1"
                            value="<?php echo isset($_POST['ticket1']) ? $_POST['ticket1'] : ''; ?>" id="ticket1"></li>
                    <li><input type="text" oninput="sinEspacios(event);" name="ticket2"
                            value="<?php echo isset($_POST['ticket2']) ? $_POST['ticket2'] : ''; ?>" id="ticket2"></li>
                    <li><input type="text" oninput="sinEspacios(event);" name="ticket3"
                            value="<?php echo isset($_POST['ticket3']) ? $_POST['ticket3'] : ''; ?>" id="ticket3"></li>
                    <li><input type="text" oninput="sinEspacios(event);" name="ticket4"
                            value="<?php echo isset($_POST['ticket4']) ? $_POST['ticket4'] : ''; ?>" id="ticket4"></li>
                    <li><input type="text" oninput="sinEspacios(event);" name="ticket5"
                            value="<?php echo isset($_POST['ticket5']) ? $_POST['ticket5'] : ''; ?>" id="ticket5"></li>
                    <li><input type="text" oninput="sinEspacios(event);" name="ticket6"
                            value="<?php echo isset($_POST['ticket6']) ? $_POST['ticket6'] : ''; ?>" id="ticket6"></li>
                    <li><input type="text" oninput="sinEspacios(event);" name="ticket7"
                            value="<?php echo isset($_POST['ticket7']) ? $_POST['ticket7'] : ''; ?>" id="ticket7"></li>
                    <li><input type="text" oninput="sinEspacios(event);" name="ticket8"
                            value="<?php echo isset($_POST['ticket8']) ? $_POST['ticket8'] : ''; ?>" id="ticket8"></li>
                    <li><input type="text" oninput="sinEspacios(event);" name="ticket9"
                            value="<?php echo isset($_POST['ticket9']) ? $_POST['ticket9'] : ''; ?>" id="ticket9"></li>
                    <li><input type="text" oninput="sinEspacios(event);" name="ticket10"
                            value="<?php echo isset($_POST['ticket10']) ? $_POST['ticket10'] : ''; ?>" id="ticket10">
                    </li>
                    <li><input type="text" oninput="sinEspacios(event);" name="ticket11"
                            value="<?php echo isset($_POST['ticket11']) ? $_POST['ticket11'] : ''; ?>" id="ticket11">
                    </li>
                    <li><input type="text" oninput="sinEspacios(event);" name="ticket12"
                            value="<?php echo isset($_POST['ticket12']) ? $_POST['ticket12'] : ''; ?>" id="ticket12">
                    </li>
                </ul>



                </ul>
                <ul style="list-style:none; display:flex;">
                    <li><input type="text" disabled placeholder="Cupón" id="cupon"></li>
                    <li><input type="text" oninput="sinEspacios(event);" name="cupon1"
                            value="<?php echo isset($_POST['cupon1']) ? $_POST['cupon1'] : ''; ?>" id="cupon1"></li>
                    <li><input type="text" oninput="sinEspacios(event);" name="cupon2"
                            value="<?php echo isset($_POST['cupon2']) ? $_POST['cupon2'] : ''; ?>" id="cupon2"></li>
                    <li><input type="text" oninput="sinEspacios(event);" name="cupon3"
                            value="<?php echo isset($_POST['cupon3']) ? $_POST['cupon3'] : ''; ?>" id="cupon3"></li>
                    <li><input type="text" oninput="sinEspacios(event);" name="cupon4"
                            value="<?php echo isset($_POST['cupon4']) ? $_POST['cupon4'] : ''; ?>" id="cupon4"></li>
                    <li><input type="text" oninput="sinEspacios(event);" name="cupon5"
                            value="<?php echo isset($_POST['cupon5']) ? $_POST['cupon5'] : ''; ?>" id="cupon5"></li>
                    <li><input type="text" oninput="sinEspacios(event);" name="cupon6"
                            value="<?php echo isset($_POST['cupon6']) ? $_POST['cupon6'] : ''; ?>" id="cupon6"></li>
                    <li><input type="text" oninput="sinEspacios(event);" name="cupon7"
                            value="<?php echo isset($_POST['cupon7']) ? $_POST['cupon7'] : ''; ?>" id="cupon7"></li>
                    <li><input type="text" oninput="sinEspacios(event);" name="cupon8"
                            value="<?php echo isset($_POST['cupon8']) ? $_POST['cupon8'] : ''; ?>" id="cupon8"></li>
                    <li><input type="text" oninput="sinEspacios(event);" name="cupon9"
                            value="<?php echo isset($_POST['cupon9']) ? $_POST['cupon9'] : ''; ?>" id="cupon9"></li>
                    <li><input type="text" oninput="sinEspacios(event);" name="cupon10"
                            value="<?php echo isset($_POST['cupon10']) ? $_POST['cupon10'] : ''; ?>" id="cupon10"></li>
                    <li><input type="text" oninput="sinEspacios(event);" name="cupon11"
                            value="<?php echo isset($_POST['cupon11']) ? $_POST['cupon11'] : ''; ?>" id="cupon11"></li>
                    <li><input type="text" oninput="sinEspacios(event);" name="cupon12"
                            value="<?php echo isset($_POST['cupon12']) ? $_POST['cupon12'] : ''; ?>" id="cupon12"></li>

                </ul>

                <ul style="list-style:none; display:flex;">

                    <li><input id="agente" type="text" disabled placeholder="Agente"></li>

                    <li><select type="text" class="select-agente" name="agente1" id="agente1">
                            <option value="" selected>Agente</option>
                            <option value="Dulce Gómez">Dulce Gómez</option>
                        </select></li>

                    <li><select type="text" class="select-agente" name="agente2" id="agente2">
                            <option value="" selected>Agente</option>
                            <option value="Dulce Gómez">Dulce Gómez</option>
                        </select></li>

                    <li><select type="text" class="select-agente" name="agente3" id="agente3">
                            <option value="" selected>Agente</option>
                            <option value="Dulce Gómez">Dulce Gómez</option>
                        </select></li>

                    <li><select type="text" class="select-agente" name="agente4" id="agente4">
                            <option value="" selected>Agente</option>
                            <option value="Dulce Gómez">Dulce Gómez</option>
                        </select></li>

                    <li><select type="text" class="select-agente" name="agente5" id="agente5">
                            <option value="" selected>Agente</option>
                            <option value="Dulce Gómez">Dulce Gómez</option>
                        </select></li>

                    <li><select type="text" class="select-agente" name="agente6" id="agente6">
                            <option value="" selected>Agente</option>
                            <option value="Dulce Gómez">Dulce Gómez</option>
                        </select></li>

                    <li><select type="text" class="select-agente" name="agente7" id="agente7">
                            <option value="" selected>Agente</option>
                            <option value="Dulce Gómez">Dulce Gómez</option>
                        </select></li>

                    <li><select type="text" class="select-agente" name="agente8" id="agente8">
                            <option value="" selected>Agente</option>
                            <option value="Dulce Gómez">Dulce Gómez</option>
                        </select></li>

                    <li><select type="text" class="select-agente" name="agente9" id="agente9">
                            <option value="" selected>Agente</option>
                            <option value="Dulce Gómez">Dulce Gómez</option>
                        </select></li>

                    <li><select type="text" class="select-agente" name="agente10" id="agente10">
                            <option value="" selected>Agente</option>
                            <option value="Dulce Gómez">Dulce Gómez</option>
                        </select></li>

                    <li><select type="text" class="select-agente" name="agente11" id="agente11">
                            <option value="" selected>Agente</option>
                            <option value="Dulce Gómez">Dulce Gómez</option>
                        </select></li>

                    <li><select type="text" class="select-agente" name="agente12" id="agente12">
                            <option value="" selected>Agente</option>
                            <option value="Dulce Gómez">Dulce Gómez</option>
                        </select></li>


                </ul>

            </div>
        </form>





        <!-- ------------inicio formulario flotante matricula Gratis -->





        <form id="loginForm" action="">
            <label for="claveMaestra">Ingrese la clave maestra:</label>
            <input type="password" id="claveMaestra" required />
            <input type="submit" value="Ingresar" onclick="desbloquearConfig(event)" />

            <br>


            <button type="button" onclick="ocultarFormulario()">Cerrar</button>
        </form>

<!-- ----------------------------------------- -->
        <form id="claveMaestraForm">
                <label for="claveElementos">Ingrese la clave maestra:</label>
                <input type="password" id="claveElementos" required />
                <input type="submit" value="Ingresar" onclick="verificarClave(event)" />

                <br>

                <button type="button" onclick="ocultar()">Cerrar</button>
            </form>















        <!-- ---------fin formulario flotante -->

        <!-- ventana emergente de configuracion -->






        <div id="popup" class="popup">
            <h2 style="text-align:center;">Configuración</h2>
            <!-- Aquí puedes agregar los elementos de configuración que necesites -->
            <div class="contenido">


                <div class="contenedor-flex">
                    <fieldset class="fieldset-espacio">
                        <legend>Crear horario nuevo</legend>
                        <button type="button" class="config" id="agregar-opcion-btn-horario">✔️Agregar Horario</button>
                        <button type="button" class="config" id="eliminar-opcion-btn-horario">❌Eliminar horario
                            seleccionado</button> <br>
                        <input type="text" class="config" id="nueva-opcion-input-horario" placeholder="Escribe horario">
                    </fieldset>
                    <br>
                    <fieldset class="fieldset-espacio">
                        <legend>Crear instituto nuevo</legend>
                        <button type="button" class="config" id="agregar-opcion-btn-Instituto">✔️Agregar
                            Instituto</button>
                        <button type="button" class="config" id="eliminar-opcion-btn-Instituto">❌Eliminar instituto
                            seleccionado</button> <br>
                        <input type="text" class="config" id="nueva-opcion-input-Instituto"
                            placeholder="Escribe el instituto">
                    </fieldset>
                    <br>
                    <fieldset class="fieldset-espacio">
                        <legend>Crear membresía nueva</legend>
                        <button type="button" class="config" id="agregar-opcion-btn-membresia">✔️Crear
                            membresía</button>
                        <button type="button" class="config" id="eliminar-opcion-btn-membresia">❌Eliminar membresía
                            seleccionada</button> <br>
                        <input type="text" class="config" id="nueva-opcion-input-membresia"
                            placeholder="Escribe la membresía">
                    </fieldset>
                    <br>
                </div>
                <div class="contenedor-flex">
                    <fieldset class="fieldset-espacio">
                        <legend>Crear matrícula nueva</legend>
                        <button type="button" class="config" id="agregar-opcion-btn-matricula">✔️Crear
                            matrícula</button>
                        <button type="button" class="config" id="eliminar-opcion-btn-matricula">❌Eliminar matrícula
                            seleccionada</button> <br>
                        <input type="text" class="config" id="nueva-opcion-input-matricula"
                            placeholder="Ingresa la matrícula">
                    </fieldset>
                    <br>
                    <fieldset class="fieldset-espacio">
                        <legend>Crear agente nuevo</legend>
                        <button type="button" class="config" id="agregar-opcion-btn-agente">✔️Crear agente</button>
                        <button type="button" class="config" id="eliminar-opcion-btn-agente">❌Eliminar agente
                            seleccionado</button>
                        <br>
                        <input type="text" class="config" id="nueva-opcion-input-agente"
                            placeholder="Escribe el nombre del agente">
                    </fieldset>
                    <br>
                    <fieldset class="fieldset-espacio">
                        <legend>Crear programa nuevo</legend>
                        <button type="button" class="config" id="agregar-opcion-btn-programa">✔️Crear programa</button>
                        <button type="button" class="config" id="eliminar-opcion-btn-programa">❌Eliminar programa
                            seleccionado</button>
                        <br>
                        <input type="text" class="config" id="nueva-opcion-input-programa"
                            placeholder="Nombre del programa">
                    </fieldset>
                    <br>
                </div>

                <button id="matriculaGratis" onclick="showLoginForm()">Matrícula Gratis</button>


                <a href="cerrar_sesion.php">Cerrar Sesión</a>




                <button onclick="togglePopup()" id="cerrar"
                    style="position: absolute; bottom: 5px; right: 20px;">Cerrar</button>
            </div>
        </div>





        <div id="dialog-box" class="dialog-box">
            <h2 id="dialog-title">Eliminar opciones</h2>
            <div id="dialog-options"></div>
            <div id="dialog-buttons">
                <button id="dialog-delete">Eliminar</button>
                <button id="dialog-cancel">Cancelar</button>
            </div>
        </div>


    </div>



    <!-- ----generar opciones y que se reflejen en la pagina nueva -->



    <!-- ---instituto para la tabla espejo -->


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Obtener el valor seleccionado del instituto del formulario enviado
            var institutoSeleccionado = "<?php echo isset($_POST['Instituto']) ? $_POST['Instituto'] : ''; ?>";

            // Obtener el elemento select del instituto
            var selectInstituto = document.getElementById("Instituto");

            // Recorrer las opciones para establecer el atributo "selected"
            for (var i = 0; i < selectInstituto.options.length; i++) {
                if (selectInstituto.options[i].value === institutoSeleccionado) {
                    selectInstituto.options[i].setAttribute("selected", "selected");
                    break; // Salir del ciclo una vez que se encuentra la opción seleccionada
                }
            }
        });
    </script>



    <!-- horario para la tabla espejo -->
    <?php $horarioSeleccionado = isset($_POST['horario']) ? $_POST['horario'] : ''; ?>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Función para establecer la opción seleccionada en cada select de membresía
            function setSelectValue(selectId, selectedValue) {
                var select = document.getElementById(selectId);
                for (var i = 0; i < select.options.length; i++) {
                    if (select.options[i].value == selectedValue) {
                        select.options[i].selected = true;
                        break;
                    }
                }
            }

            // Llamar a la función para el select de horario
            setSelectValue("horario", "<?php echo $horarioSeleccionado; ?>");
        });
    </script>


    <!-- --------año para la tabla espejo------- -->

    <?php $añoSeleccionado = isset($_POST['año']) ? $_POST['año'] : ''; ?>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Función para establecer la opción seleccionada en cada select de membresía
            function setSelectValue(selectId, selectedValue) {
                var select = document.getElementById(selectId);
                for (var i = 0; i < select.options.length; i++) {
                    if (select.options[i].value == selectedValue) {
                        select.options[i].selected = true;
                        break;
                    }
                }
            }

            // Llamar a la función para el select de horario
            setSelectValue("año", "<?php echo $añoSeleccionado; ?>");
        });
    </script>




    <!-- Código para matricula1 -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var matricula1Seleccionado = "<?php echo isset($_POST['matricula1']) ? $_POST['matricula1'] : ''; ?>";
            var selectMatricula1 = document.getElementById("input1");
            for (var i = 0; i < selectMatricula1.options.length; i++) {
                if (selectMatricula1.options[i].value === matricula1Seleccionado) {
                    selectMatricula1.options[i].setAttribute("selected", "selected");
                    break;
                }
            }
        });
    </script>

    <!-- Código para matricula2 -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var matricula2Seleccionado = "<?php echo isset($_POST['matricula2']) ? $_POST['matricula2'] : ''; ?>";
            var selectMatricula2 = document.getElementById("input2");
            for (var i = 0; i < selectMatricula2.options.length; i++) {
                if (selectMatricula2.options[i].value === matricula2Seleccionado) {
                    selectMatricula2.options[i].setAttribute("selected", "selected");
                    break;
                }
            }
        });
    </script>

    <!-- Código para matricula3 -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var matricula3Seleccionado = "<?php echo isset($_POST['matricula3']) ? $_POST['matricula3'] : ''; ?>";
            var selectMatricula3 = document.getElementById("input3");
            for (var i = 0; i < selectMatricula3.options.length; i++) {
                if (selectMatricula3.options[i].value === matricula3Seleccionado) {
                    selectMatricula3.options[i].setAttribute("selected", "selected");
                    break;
                }
            }
        });
    </script>

    <!-- Repetir el patrón anterior para matricula4 a matricula12, cambiando los IDs y las referencias correspondientes -->
    <!-- Código para matricula4 -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var matricula4Seleccionado = "<?php echo isset($_POST['matricula4']) ? $_POST['matricula4'] : ''; ?>";
            var selectMatricula4 = document.getElementById("input4");
            for (var i = 0; i < selectMatricula4.options.length; i++) {
                if (selectMatricula4.options[i].value === matricula4Seleccionado) {
                    selectMatricula4.options[i].setAttribute("selected", "selected");
                    break;
                }
            }
        });
    </script>

    <!-- Código para matricula5 -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var matricula5Seleccionado = "<?php echo isset($_POST['matricula5']) ? $_POST['matricula5'] : ''; ?>";
            var selectMatricula5 = document.getElementById("input5");
            for (var i = 0; i < selectMatricula5.options.length; i++) {
                if (selectMatricula5.options[i].value === matricula5Seleccionado) {
                    selectMatricula5.options[i].setAttribute("selected", "selected");
                    break;
                }
            }
        });
    </script>

    <!-- Repetir el patrón anterior para matricula6 a matricula12, cambiando los IDs y las referencias correspondientes -->
    <!-- Código para matricula6 -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var matricula6Seleccionado = "<?php echo isset($_POST['matricula6']) ? $_POST['matricula6'] : ''; ?>";
            var selectMatricula6 = document.getElementById("input6");
            for (var i = 0; i < selectMatricula6.options.length; i++) {
                if (selectMatricula6.options[i].value === matricula6Seleccionado) {
                    selectMatricula6.options[i].setAttribute("selected", "selected");
                    break;
                }
            }
        });
    </script>

    <!-- Código para matricula7 -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var matricula7Seleccionado = "<?php echo isset($_POST['matricula7']) ? $_POST['matricula7'] : ''; ?>";
            var selectMatricula7 = document.getElementById("input7");
            for (var i = 0; i < selectMatricula7.options.length; i++) {
                if (selectMatricula7.options[i].value === matricula7Seleccionado) {
                    selectMatricula7.options[i].setAttribute("selected", "selected");
                    break;
                }
            }
        });
    </script>

    <!-- Repetir el patrón anterior para matricula8 a matricula12, cambiando los IDs y las referencias correspondientes -->
    <!-- Código para matricula8 -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var matricula8Seleccionado = "<?php echo isset($_POST['matricula8']) ? $_POST['matricula8'] : ''; ?>";
            var selectMatricula8 = document.getElementById("input8");
            for (var i = 0; i < selectMatricula8.options.length; i++) {
                if (selectMatricula8.options[i].value === matricula8Seleccionado) {
                    selectMatricula8.options[i].setAttribute("selected", "selected");
                    break;
                }
            }
        });
    </script>

    <!-- Código para matricula9 -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var matricula9Seleccionado = "<?php echo isset($_POST['matricula9']) ? $_POST['matricula9'] : ''; ?>";
            var selectMatricula9 = document.getElementById("input9");
            for (var i = 0; i < selectMatricula9.options.length; i++) {
                if (selectMatricula9.options[i].value === matricula9Seleccionado) {
                    selectMatricula9.options[i].setAttribute("selected", "selected");
                    break;
                }
            }
        });
    </script>

    <!-- Repetir el patrón anterior para matricula10 a matricula12, cambiando los IDs y las referencias correspondientes -->
    <!-- Código para matricula10 -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var matricula10Seleccionado =
                "<?php echo isset($_POST['matricula10']) ? $_POST['matricula10'] : ''; ?>";
            var selectMatricula10 = document.getElementById("input10");
            for (var i = 0; i < selectMatricula10.options.length; i++) {
                if (selectMatricula10.options[i].value === matricula10Seleccionado) {
                    selectMatricula10.options[i].setAttribute("selected", "selected");
                    break;
                }
            }
        });
    </script>

    <!-- Código para matricula11 -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var matricula11Seleccionado =
                "<?php echo isset($_POST['matricula11']) ? $_POST['matricula11'] : ''; ?>";
            var selectMatricula11 = document.getElementById("input11");
            for (var i = 0; i < selectMatricula11.options.length; i++) {
                if (selectMatricula11.options[i].value === matricula11Seleccionado) {
                    selectMatricula11.options[i].setAttribute("selected", "selected");
                    break;
                }
            }
        });
    </script>

    <!-- Código para matricula12 -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var matricula12Seleccionado =
                "<?php echo isset($_POST['matricula12']) ? $_POST['matricula12'] : ''; ?>";
            var selectMatricula12 = document.getElementById("input12");
            for (var i = 0; i < selectMatricula12.options.length; i++) {
                if (selectMatricula12.options[i].value === matricula12Seleccionado) {
                    selectMatricula12.options[i].setAttribute("selected", "selected");
                    break;
                }
            }
        });
    </script>










    <!-- --------------membresia---------- -->

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Función para establecer la opción seleccionada en cada select de membresía
            function setSelectValue(selectId, selectedValue) {
                var selectMembresia = document.getElementById(selectId);
                for (var i = 0; i < selectMembresia.options.length; i++) {
                    if (selectMembresia.options[i].value === selectedValue) {
                        selectMembresia.options[i].setAttribute("selected", "selected");
                        break;
                    }
                }
            }

            // Llamar a la función para cada select de membresía
            setSelectValue("membresia1", "<?php echo isset($_POST['membresia1']) ? $_POST['membresia1'] : ''; ?>");
            setSelectValue("membresia2", "<?php echo isset($_POST['membresia2']) ? $_POST['membresia2'] : ''; ?>");
            setSelectValue("membresia3", "<?php echo isset($_POST['membresia3']) ? $_POST['membresia3'] : ''; ?>");
            setSelectValue("membresia4", "<?php echo isset($_POST['membresia4']) ? $_POST['membresia4'] : ''; ?>");
            setSelectValue("membresia5", "<?php echo isset($_POST['membresia5']) ? $_POST['membresia5'] : ''; ?>");
            setSelectValue("membresia6", "<?php echo isset($_POST['membresia6']) ? $_POST['membresia6'] : ''; ?>");
            setSelectValue("membresia7", "<?php echo isset($_POST['membresia7']) ? $_POST['membresia7'] : ''; ?>");
            setSelectValue("membresia8", "<?php echo isset($_POST['membresia8']) ? $_POST['membresia8'] : ''; ?>");
            setSelectValue("membresia9", "<?php echo isset($_POST['membresia9']) ? $_POST['membresia9'] : ''; ?>");
            setSelectValue("membresia10",
                "<?php echo isset($_POST['membresia10']) ? $_POST['membresia10'] : ''; ?>");
            setSelectValue("membresia11",
                "<?php echo isset($_POST['membresia11']) ? $_POST['membresia11'] : ''; ?>");
            setSelectValue("membresia12",
                "<?php echo isset($_POST['membresia12']) ? $_POST['membresia12'] : ''; ?>");
        });
    </script>


    <!-- --------------agente---------- -->

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Función para establecer la opción seleccionada en cada select de agente
            function setSelectValue(selectId, selectedValue) {
                var selectAgente = document.getElementById(selectId);
                for (var i = 0; i < selectAgente.options.length; i++) {
                    if (selectAgente.options[i].value === selectedValue) {
                        selectAgente.options[i].setAttribute("selected", "selected");
                        break;
                    }
                }
            }

            // Llamar a la función para cada select de agente
            setSelectValue("agente1", "<?php echo isset($_POST['agente1']) ? $_POST['agente1'] : ''; ?>");
            setSelectValue("agente2", "<?php echo isset($_POST['agente2']) ? $_POST['agente2'] : ''; ?>");
            setSelectValue("agente3", "<?php echo isset($_POST['agente3']) ? $_POST['agente3'] : ''; ?>");
            setSelectValue("agente4", "<?php echo isset($_POST['agente4']) ? $_POST['agente4'] : ''; ?>");
            setSelectValue("agente5", "<?php echo isset($_POST['agente5']) ? $_POST['agente5'] : ''; ?>");
            setSelectValue("agente6", "<?php echo isset($_POST['agente6']) ? $_POST['agente6'] : ''; ?>");
            setSelectValue("agente7", "<?php echo isset($_POST['agente7']) ? $_POST['agente7'] : ''; ?>");
            setSelectValue("agente8", "<?php echo isset($_POST['agente8']) ? $_POST['agente8'] : ''; ?>");
            setSelectValue("agente9", "<?php echo isset($_POST['agente9']) ? $_POST['agente9'] : ''; ?>");
            setSelectValue("agente10", "<?php echo isset($_POST['agente10']) ? $_POST['agente10'] : ''; ?>");
            setSelectValue("agente11", "<?php echo isset($_POST['agente11']) ? $_POST['agente11'] : ''; ?>");
            setSelectValue("agente12", "<?php echo isset($_POST['agente12']) ? $_POST['agente12'] : ''; ?>");
        });
    </script>










    <script src="../js/matriculaGratis.js"></script>
    <script src="../js/correlativo.js"></script>
    <script src="../js/formatoMoneda.js"></script>
    <script src="../js/confirmacionEnviar.js"></script>
    <script src="../js/sinSignos.js"></script>
    <script src="../js/moneda.js"></script>
    <script src="../js/numeral.js"></script>
    <script src="../js/numeralLetras.js"></script>
    <script src="../js/sinEspacios.js"></script>
    <script src="../js/ordenarPorLetra.js"></script>
    <script src="../js/crearAgente.js"></script>
    <script src="../js/crearInstituto.js"></script>
    <script src="../js/crearMembresía.js"></script>
    <script src="../js/crearHorario.js"></script>
    <script src="../js/crearMatricula.js"></script>
    <script src="../js/crearPrograma.js"></script>
    <script src="../js/configuración.js"></script>
    <script src="../js/cantidadPersonas.js"></script>
    <script src="../js/reflejoDatos.js"></script>
    <script src="../js/limpiarInputs.js"></script>
    <script src="../js/bloqueoConfig.js"></script>
    <script src="../js/habilitarElementos.js"></script>



</body>

</html>