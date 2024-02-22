<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clientes";  // Nombre de la base de datos

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión a la base de datos
if ($conn->connect_error) {
    die("Conexión fallida a la base de datos: " . $conn->connect_error);
}

// Consulta SQL para obtener datos de la tabla en la base de datos "clientes"
$sql = "SELECT Año, Nombre, Responsable, Instituto, Cédula, Nacimiento, Dirección, Email, Programa, Horario, Entrada, Salida, Celular1, Celular2, Estado, Ingreso FROM t1_enero";

// Ejecutar la consulta SQL
$result = $conn->query($sql);

// Verificar si la consulta fue exitosa
if ($result && $result->num_rows > 0) {
    $allData["clientes"] = $result->fetch_all(MYSQLI_ASSOC);
} else {
    // Manejar el caso en que la consulta no fue exitosa
    echo "Error en la consulta: " . $conn->error;
}

// Cierra la conexión a la base de datos
$conn->close();
?>


<!DOCTYPE html>
<html>

<head>
    <title>Tabla de información</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>


    <style>
        /* Estilos para el contenedor de la tabla */
        .table-container {
            width: 100%;
            margin: 0 auto;
            /* Centrar el contenedor en la pantalla */
            overflow-x: auto;
        }

        /* Estilos para la tabla */
        table {
            width: 100%;
            /* La tabla ocupa el ancho completo del contenedor */
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Estilos para los campos de búsqueda y etiquetas */
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        select {
            width: 50%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Agrupar los campos de búsqueda en tres columnas */
        .search-columns {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .search-column {
            width: calc(33.33% - 10px);
        }

        /* Ocultar el botón de exportar al inicio */
        .export-button {
            display: block;
            margin-top: 10px;
        }

        /* Estilo para hacer la tabla responsive en pantallas pequeñas */
        @media screen and (max-width: 600px) {

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                border: 1px solid #ccc;
            }

            td {
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }

            td:before {
                position: absolute;
                top: 6px;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
            }
        }

        #flecha {
      position: fixed;
      top: 0;
      left: 0;
      margin: 10px;
      /* Ajusta los márgenes según tus necesidades */
    }
    </style>


</head>

<body>

<a id="flecha" href="../Php/administrador.php">
      <img id="regresar" src="../img/programas/regresar.jpg" width="40px" alt="">
    </a>
    <h1 style="text-align: center;">Tabla de información</h1>

    <form onsubmit="return buscarCliente();">
        <div class="search-columns">
            <div class="search-column">
                <label for="nombre_busqueda">Nombre del Alumno:</label>
                <input type="text" id="nombre_busqueda" name="nombre_busqueda" placeholder="Ingrese el nombre del alumno">
            </div>
            <div class="search-column">
                <label for="responsable_busqueda">Nombre del responsable:</label>
                <input type="text" id="responsable_busqueda" name="responsable_busqueda" placeholder="Ingrese el Responsable">
            </div>
            <div class="search-column">
                <label for="instituto_busqueda">Instituto:</label>
                <input type="text" id="instituto_busqueda" name="instituto_busqueda" placeholder="Ingrese el Instituto">
            </div>
            <div class="search-column">
                <label for="cedula_busqueda">Cédula:</label>
                <input type="text" id="cedula_busqueda" name="cedula_busqueda" placeholder="Ingrese el No. de cédula">
            </div>
            <div class="search-column">
                <label for="nacimiento_busqueda">Fecha de nacimiento:</label>
                <input type="date" id="nacimiento_busqueda" name="nacimiento_busqueda" placeholder="Ingrese la fecha de nacimiento">
            </div>
            <div class="search-column">
                <label for="direccion_busqueda">Dirección:</label>
                <input type="text" id="direccion_busqueda" name="direccion_busqueda" placeholder="Ingrese la Dirección">
            </div>
            <div class="search-column">
                <label for="email_busqueda">Email:</label>
                <input type="text" id="email_busqueda" name="email_busqueda" placeholder="Ingrese el Email">
            </div>
            <div class="search-column">
                <label for="programa_busqueda">Programa:</label>
                <select id="programa_busqueda" name="programa_busqueda">
                    <option value="">Todos</option>
                    <option value="Ballet">Ballet</option>
                    <option value="Natación">Natación</option>
                    <option value="Guitarra">Guitarra</option>
                    <option value="Piano">Piano</option>
                    <option value="Canto">Canto</option>
                    <option value="Karate">Karate</option>
                </select>
            </div>
            
            <div class="search-column">
                <label for="horario_busqueda">Horario:</label>
                <input type="text" id="horario_busqueda" name="horario_busqueda" placeholder="Ingrese el Horario">
            </div>
            <div class="search-column">
                <label for="entrada_busqueda">Hora de entrada:</label>
                <input type="text" id="entrada_busqueda" name="entrada_busqueda" placeholder="Ingrese la Hora de Entrada">
            </div>
            <div class="search-column">
                <label for="salida_busqueda">Hora de salida:</label>
                <input type="text" id="salida_busqueda" name="salida_busqueda" placeholder="Ingrese la Hora de Salida">
            </div>
            <div class="search-column">
                <label for="celular1_busqueda">Número de Celular (Celular 1):</label>
                <input type="text" id="celular1_busqueda" name="celular1_busqueda" placeholder="Ingrese el número de celular (Celular 1)">
            </div>
            <div class="search-column">
                <label for="celular2_busqueda">Número de Celular (Celular 2):</label>
                <input type="text" id="celular2_busqueda" name="celular2_busqueda" placeholder="Ingrese el número de celular (Celular 2)">
            </div>
            <div class="search-column">
                <label for="estado_busqueda">Estado:</label>
                <select id="estado_busqueda" name="estado_busqueda">
                    <option value="">Todos</option>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                    <option value="Pendiente">Pendiente</option>
                </select>
            </div>
            <div class="search-column">
                <label for="ingreso_ano_busqueda">Año de ingreso:</label>
                <input type="text" id="ingreso_ano_busqueda" name="ingreso_ano_busqueda" placeholder="Ingrese el Año de Ingreso">
            </div>
            <div class="search-column">
                <label for="ingreso_mes_busqueda">Mes de ingreso (Número):</label>
                <input type="text" id="ingreso_mes_busqueda" name="ingreso_mes_busqueda" placeholder="Ingrese el mes de ingreso (ej. 01)">
            </div>
        </div>

        <input type="submit" value="Buscar">
    </form>


    <button name="export" onclick="exportToExcel()">Exportar a Excel</button>



    <div class="table-container">
        <table id="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Año</th>
                    <th>Nombre del Alumno</th>
                    <th>Responsable</th>
                    <th>Instituto</th>
                    <th>No. de cédula</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Dirección</th>
                    <th>Email</th>
                    <th>Programa</th>
                    <th>Horario</th>
                    <th>Entrada</th>
                    <th>Salida</th>
                    <th>Número de Celular (Celular 1)</th>
                    <th>Número de Celular (Celular 2)</th>
                    <th>Estado</th>
                    <th>Ingreso</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $contadorFilas = 0;
                foreach ($allData as $dbName => $data) {
                    foreach ($data as $cliente) {
                        $contadorFilas++;
                        echo '<tr class="cliente" data-año="' . $cliente["Año"] . '" data-nombre="' . $cliente["Nombre"] . '" data-responsable="' . $cliente["Responsable"] . '" data-instituto="' . $cliente["Instituto"] . '" data-cedula="' . $cliente["Cédula"] .  '" data-nacimiento="' . $cliente["Nacimiento"] . '" data-direccion="' . $cliente["Dirección"] . '" data-email="' . $cliente["Email"] . '" data-programa="' . $cliente["Programa"] . '" data-horario="' . $cliente["Horario"] . '" data-entrada="' . $cliente["Entrada"] . '" data-salida="' . $cliente["Salida"] . '" data-celular1="' . $cliente["Celular1"] . '" data-celular2="' . $cliente["Celular2"] . '" data-estado="' . $cliente["Estado"] . '" data-ingreso="' . $cliente["Ingreso"] . '">';
                        echo '<td>' . $contadorFilas . '</td>';
                        echo '<td>' . $cliente["Año"] . '</td>';
                        echo '<td>' . $cliente["Nombre"] . '</td>';
                        echo '<td>' . $cliente["Responsable"] . '</td>';
                        echo '<td>' . $cliente["Instituto"] . '</td>';
                        echo '<td>' . $cliente["Cédula"] . '</td>';
                        echo '<td>' . $cliente["Nacimiento"] . '</td>';
                        echo '<td>' . $cliente["Dirección"] . '</td>';
                        echo '<td>' . $cliente["Email"] . '</td>';
                        echo '<td>' . $cliente["Programa"] . '</td>';
                        echo '<td>' . $cliente["Horario"] . '</td>';
                        echo '<td>' . $cliente["Entrada"] . '</td>';
                        echo '<td>' . $cliente["Salida"] . '</td>';
                        echo '<td>' . $cliente["Celular1"] . '</td>';
                        echo '<td>' . $cliente["Celular2"] . '</td>';
                        echo '<td>' . $cliente["Estado"] . '</td>';
                        echo '<td>' . $cliente["Ingreso"] . '</td>';
                        echo '</tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Mensaje de "Cliente no encontrado" -->
    <div class="mensaje-no-encontrado" id="mensaje-no-encontrado" style="display: none;">Cliente no encontrado.</div>

    <script>
        function buscarCliente() {

            var nombreBusqueda = document.getElementById("nombre_busqueda").value.toLowerCase();
            var responsableBusqueda = document.getElementById("responsable_busqueda").value.toLowerCase();
            var institutoBusqueda = document.getElementById("instituto_busqueda").value.toLowerCase();
            var cedulaBusqueda = document.getElementById("cedula_busqueda").value.toLowerCase();
            var nacimientoBusqueda = document.getElementById("nacimiento_busqueda").value.toLowerCase();
            var direccionBusqueda = document.getElementById("direccion_busqueda").value.toLowerCase();
            var emailBusqueda = document.getElementById("email_busqueda").value.toLowerCase();
            var programaBusqueda = document.getElementById("programa_busqueda").value.toLowerCase();
            var horarioBusqueda = document.getElementById("horario_busqueda").value.toLowerCase();
            var entradaBusqueda = document.getElementById("entrada_busqueda").value.toLowerCase();
            var salidaBusqueda = document.getElementById("salida_busqueda").value.toLowerCase();
            var celular1Busqueda = document.getElementById("celular1_busqueda").value.toLowerCase();
            var celular2Busqueda = document.getElementById("celular2_busqueda").value.toLowerCase();
            var estadoBusqueda = document.getElementById("estado_busqueda").value.toLowerCase();
            var ingresoAnoBusqueda = document.getElementById("ingreso_ano_busqueda").value.toLowerCase();
            var ingresoMesBusqueda = document.getElementById("ingreso_mes_busqueda").value.toLowerCase();


            var clientes = document.querySelectorAll("tr.cliente");
            var clienteEncontrado = false;
            var contadorFilas = 0;

            for (var i = 0; i < clientes.length; i++) {
                var cliente = clientes[i];
                var estadoCliente = cliente.getAttribute("data-estado").toLowerCase();
                var ingresoCliente = cliente.getAttribute("data-ingreso").toLowerCase();

                // Extraer el año y el mes de la cadena de ingreso
                var ingresoAno = ingresoCliente.split('-')[0];
                var ingresoMes = ingresoCliente.split('-')[1];

                if (
                    (nombreBusqueda === "" || cliente.getAttribute("data-nombre").toLowerCase().includes(nombreBusqueda)) &&
                    (responsableBusqueda === "" || cliente.getAttribute("data-responsable").toLowerCase().includes(responsableBusqueda)) &&
                    (institutoBusqueda === "" || cliente.getAttribute("data-instituto").toLowerCase().includes(institutoBusqueda)) &&
                    (cedulaBusqueda === "" || cliente.getAttribute("data-cedula").toLowerCase().includes(cedulaBusqueda)) &&
                    (nacimientoBusqueda === "" || cliente.getAttribute("data-nacimiento").toLowerCase().includes(nacimientoBusqueda)) &&
                    (direccionBusqueda === "" || cliente.getAttribute("data-direccion").toLowerCase().includes(direccionBusqueda)) &&
                    (emailBusqueda === "" || cliente.getAttribute("data-email").toLowerCase().includes(emailBusqueda)) &&
                    (programaBusqueda === "" || cliente.getAttribute("data-programa").toLowerCase() === programaBusqueda) &&
                    (horarioBusqueda === "" || cliente.getAttribute("data-horario").toLowerCase().includes(horarioBusqueda)) &&
                    (entradaBusqueda === "" || cliente.getAttribute("data-entrada").toLowerCase().includes(entradaBusqueda)) &&
                    (salidaBusqueda === "" || cliente.getAttribute("data-salida").toLowerCase().includes(salidaBusqueda)) &&
                    (celular1Busqueda === "" || cliente.getAttribute("data-celular1").toLowerCase().includes(celular1Busqueda)) &&
                    (celular2Busqueda === "" || cliente.getAttribute("data-celular2").toLowerCase().includes(celular2Busqueda)) &&
                    (ingresoAnoBusqueda === "" || ingresoAno === ingresoAnoBusqueda) &&
                    (ingresoMesBusqueda === "" || ingresoMes === ingresoMesBusqueda) &&
                    (estadoBusqueda === "" || estadoCliente === estadoBusqueda)
                ) {
                    contadorFilas++;
                    cliente.style.display = "";
                    cliente.querySelector('td:first-child').textContent = contadorFilas; // Actualiza el valor de la columna "No"
                    clienteEncontrado = true;
                } else {
                    cliente.style.display = "none";
                }
            }

            var mensajeNoEncontrado = document.getElementById("mensaje-no-encontrado");
            mensajeNoEncontrado.style.display = clienteEncontrado ? "none" : "block";

            return false;
        }
    </script>


    <script>
        function exportToExcel() {
            var wb = XLSX.utils.book_new();
            var ws = XLSX.utils.table_to_sheet(document.getElementById('table'));

            // Filtrar las filas visibles y crear una nueva hoja con ellas
            var filteredRows = Array.from(document.querySelectorAll('tr.cliente')).filter(function(row) {
                return row.style.display !== 'none';
            });
            var filteredTable = document.createElement('table');
            filteredTable.appendChild(document.querySelector('thead').cloneNode(true));
            var filteredTbody = document.createElement('tbody');

            filteredRows.forEach(function(row) {
                filteredTbody.appendChild(row.cloneNode(true));
            });

            filteredTable.appendChild(filteredTbody);

            var filteredWs = XLSX.utils.table_to_sheet(filteredTable);
            XLSX.utils.book_append_sheet(wb, filteredWs, 'Hoja1');
            XLSX.writeFile(wb, 'Tabla_de_informacion.xlsx');
        }
    </script>



</body>

</html>