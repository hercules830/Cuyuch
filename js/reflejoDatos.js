function mostrarMensajeError(message) {
  // Implementar la lógica para mostrar el mensaje de error al usuario
  console.error("Mensaje de error:", message);
  // Código adicional para mostrar el mensaje de error al usuario
}

function buscar() {
  var cedula = document.getElementById("cedula_busqueda").value;
  var estado = document.getElementById("estado_busqueda").value;
  var programa = document.getElementById("programa_busqueda").value;
  var año = document.getElementById("año_busqueda").value;

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState == 4) {
      if (this.status == 200) {
        try {
          console.log("Respuesta del servidor:", this.responseText);
          var resultados = JSON.parse(this.responseText);

          if (resultados && Object.keys(resultados).length > 0) {
            // Resto del código para actualizar los campos


            for (var i = 1; i <= 12; i++) {
              var mesData = resultados["mes" + i];
              if (mesData && Object.keys(mesData).length > 0) {
                  var matriculaInput = document.getElementById("matricula" + i);
                  var mensualidadInput = document.getElementById("mensualidad" + i);
                  var facturaInput = document.getElementById("factura" + i);
                  var promoInput = document.getElementById("promo" + i);
                  var descuentoInput = document.getElementById("descuento" + i);
                  var grupoInput = document.getElementById("grupo" + i);
                  var membresiaInput = document.getElementById("membresia" + i);
                  var fechaInput = document.getElementById("fecha" + i);
                  var ticketInput = document.getElementById("ticket" + i);
                  var cuponInput = document.getElementById("cupon" + i);
                  var agenteInput = document.getElementById("agente" + i);
          
                  // Deshabilitar los elementos de entrada solo si tienen valores
                  matriculaInput.disabled = true;
                  mensualidadInput.disabled = true;
                  facturaInput.disabled = true;
                  promoInput.disabled = true;
                  descuentoInput.disabled = true;
                  grupoInput.disabled = true;
                  membresiaInput.disabled = true;
                  fechaInput.disabled = true;
                  ticketInput.disabled = true;
                  cuponInput.disabled = true;
                  agenteInput.disabled = true;
              }
          }
          


            var estadoValue = resultados.mes1.Estado;

            // Seleccionar el radio button correspondiente al valor de estado
            var radioButtons = document.getElementsByName("estado");

            for (var i = 0; i < radioButtons.length; i++) {
              if (radioButtons[i].value === estadoValue) {
                radioButtons[i].checked = true;
              }
            }
            document.getElementById("Año").value = resultados.mes1.Año;
            document.getElementById("Programa").value = resultados.mes1.Programa;
            document.getElementById("Nombre").value = resultados.mes1.Nombre;
            document.getElementById("Responsable").value = resultados.mes1.Responsable;
            document.getElementById("Instituto").value = resultados.mes1.Instituto;
            document.getElementById("Cédula").value = resultados.mes1.Cédula;
            document.getElementById("Nacimiento").value = resultados.mes1.Nacimiento;
            document.getElementById("Dirección").value = resultados.mes1.Dirección;
            document.getElementById("Email").value = resultados.mes1.Email;
            document.getElementById("Celular1").value = resultados.mes1.Celular1;
            document.getElementById("Celular2").value = resultados.mes1.Celular2;
            document.getElementById("Ingreso").value = resultados.mes1.Ingreso;
            document.getElementById("Horario").value = resultados.mes1.Horario;
            document.getElementById("Entrada").value = resultados.mes1.Entrada;
            document.getElementById("Salida").value = resultados.mes1.Salida;
            document.getElementById("matricula1").value = resultados.mes1.matricula;
            document.getElementById("mensualidad1").value = resultados.mes1.mensualidad;
            document.getElementById("factura1").value = resultados.mes1.factura;
            document.getElementById("promo1").value = resultados.mes1.promo;
            document.getElementById("descuento1").value = resultados.mes1.descuento;
            document.getElementById("grupo1").value = resultados.mes1.grupo;
            document.getElementById("membresia1").value = resultados.mes1.membresia;
            document.getElementById("fecha1").value = resultados.mes1.fecha;
            document.getElementById("ticket1").value = resultados.mes1.ticket;
            document.getElementById("cupon1").value = resultados.mes1.cupon;
            document.getElementById("agente1").value = resultados.mes1.agente;



            document.getElementById("matricula2").value = resultados.mes2.matricula;
            document.getElementById("mensualidad2").value = resultados.mes2.mensualidad;
            document.getElementById("factura2").value = resultados.mes2.factura;
            document.getElementById("promo2").value = resultados.mes2.promo;
            document.getElementById("descuento2").value = resultados.mes2.descuento;
            document.getElementById("grupo2").value = resultados.mes2.grupo;
            document.getElementById("membresia2").value = resultados.mes2.membresia;
            document.getElementById("fecha2").value = resultados.mes2.fecha;
            document.getElementById("ticket2").value = resultados.mes2.ticket;
            document.getElementById("cupon2").value = resultados.mes2.cupon;
            document.getElementById("agente2").value = resultados.mes2.agente;

            document.getElementById("matricula3").value = resultados.mes3.matricula;
            document.getElementById("mensualidad3").value = resultados.mes3.mensualidad;
            document.getElementById("factura3").value = resultados.mes3.factura;
            document.getElementById("promo3").value = resultados.mes3.promo;
            document.getElementById("descuento3").value = resultados.mes3.descuento;
            document.getElementById("grupo3").value = resultados.mes3.grupo;
            document.getElementById("membresia3").value = resultados.mes3.membresia;
            document.getElementById("fecha3").value = resultados.mes3.fecha;
            document.getElementById("ticket3").value = resultados.mes3.ticket;
            document.getElementById("cupon3").value = resultados.mes3.cupon;
            document.getElementById("agente3").value = resultados.mes3.agente;

            document.getElementById("matricula4").value = resultados.mes4.matricula;
            document.getElementById("mensualidad4").value = resultados.mes4.mensualidad;
            document.getElementById("factura4").value = resultados.mes4.factura;
            document.getElementById("promo4").value = resultados.mes4.promo;
            document.getElementById("descuento4").value = resultados.mes4.descuento;
            document.getElementById("grupo4").value = resultados.mes4.grupo;
            document.getElementById("membresia4").value = resultados.mes4.membresia;
            document.getElementById("fecha4").value = resultados.mes4.fecha;
            document.getElementById("ticket4").value = resultados.mes4.ticket;
            document.getElementById("cupon4").value = resultados.mes4.cupon;
            document.getElementById("agente4").value = resultados.mes4.agente;

            document.getElementById("matricula5").value = resultados.mes5.matricula;
            document.getElementById("mensualidad5").value = resultados.mes5.mensualidad;
            document.getElementById("factura5").value = resultados.mes5.factura;
            document.getElementById("promo5").value = resultados.mes5.promo;
            document.getElementById("descuento5").value = resultados.mes5.descuento;
            document.getElementById("grupo5").value = resultados.mes5.grupo;
            document.getElementById("membresia5").value = resultados.mes5.membresia;
            document.getElementById("fecha5").value = resultados.mes5.fecha;
            document.getElementById("ticket5").value = resultados.mes5.ticket;
            document.getElementById("cupon5").value = resultados.mes5.cupon;
            document.getElementById("agente5").value = resultados.mes5.agente;

            document.getElementById("matricula6").value = resultados.mes6.matricula;
            document.getElementById("mensualidad6").value = resultados.mes6.mensualidad;
            document.getElementById("factura6").value = resultados.mes6.factura;
            document.getElementById("promo6").value = resultados.mes6.promo;
            document.getElementById("descuento6").value = resultados.mes6.descuento;
            document.getElementById("grupo6").value = resultados.mes6.grupo;
            document.getElementById("membresia6").value = resultados.mes6.membresia;
            document.getElementById("fecha6").value = resultados.mes6.fecha;
            document.getElementById("ticket6").value = resultados.mes6.ticket;
            document.getElementById("cupon6").value = resultados.mes6.cupon;
            document.getElementById("agente6").value = resultados.mes6.agente;

            document.getElementById("matricula7").value = resultados.mes7.matricula;
            document.getElementById("mensualidad7").value = resultados.mes7.mensualidad;
            document.getElementById("factura7").value = resultados.mes7.factura;
            document.getElementById("promo7").value = resultados.mes7.promo;
            document.getElementById("descuento7").value = resultados.mes7.descuento;
            document.getElementById("grupo7").value = resultados.mes7.grupo;
            document.getElementById("membresia7").value = resultados.mes7.membresia;
            document.getElementById("fecha7").value = resultados.mes7.fecha;
            document.getElementById("ticket7").value = resultados.mes7.ticket;
            document.getElementById("cupon7").value = resultados.mes7.cupon;
            document.getElementById("agente7").value = resultados.mes7.agente;

            document.getElementById("matricula8").value = resultados.mes8.matricula;
            document.getElementById("mensualidad8").value = resultados.mes8.mensualidad;
            document.getElementById("factura8").value = resultados.mes8.factura;
            document.getElementById("promo8").value = resultados.mes8.promo;
            document.getElementById("descuento8").value = resultados.mes8.descuento;
            document.getElementById("grupo8").value = resultados.mes8.grupo;
            document.getElementById("membresia8").value = resultados.mes8.membresia;
            document.getElementById("fecha8").value = resultados.mes8.fecha;
            document.getElementById("ticket8").value = resultados.mes8.ticket;
            document.getElementById("cupon8").value = resultados.mes8.cupon;
            document.getElementById("agente8").value = resultados.mes8.agente;

            document.getElementById("matricula9").value = resultados.mes9.matricula;
            document.getElementById("mensualidad9").value = resultados.mes9.mensualidad;
            document.getElementById("factura9").value = resultados.mes9.factura;
            document.getElementById("promo9").value = resultados.mes9.promo;
            document.getElementById("descuento9").value = resultados.mes9.descuento;
            document.getElementById("grupo9").value = resultados.mes9.grupo;
            document.getElementById("membresia9").value = resultados.mes9.membresia;
            document.getElementById("fecha9").value = resultados.mes9.fecha;
            document.getElementById("ticket9").value = resultados.mes9.ticket;
            document.getElementById("cupon9").value = resultados.mes9.cupon;
            document.getElementById("agente9").value = resultados.mes9.agente;

            document.getElementById("matricula10").value = resultados.mes10.matricula;
            document.getElementById("mensualidad10").value = resultados.mes10.mensualidad;
            document.getElementById("factura10").value = resultados.mes10.factura;
            document.getElementById("promo10").value = resultados.mes10.promo;
            document.getElementById("descuento10").value = resultados.mes10.descuento;
            document.getElementById("grupo10").value = resultados.mes10.grupo;
            document.getElementById("membresia10").value = resultados.mes10.membresia;
            document.getElementById("fecha10").value = resultados.mes10.fecha;
            document.getElementById("ticket10").value = resultados.mes10.ticket;
            document.getElementById("cupon10").value = resultados.mes10.cupon;
            document.getElementById("agente10").value = resultados.mes10.agente;

            document.getElementById("matricula11").value = resultados.mes11.matricula;
            document.getElementById("mensualidad11").value = resultados.mes11.mensualidad;
            document.getElementById("factura11").value = resultados.mes11.factura;
            document.getElementById("promo11").value = resultados.mes11.promo;
            document.getElementById("descuento11").value = resultados.mes11.descuento;
            document.getElementById("grupo11").value = resultados.mes11.grupo;
            document.getElementById("membresia11").value = resultados.mes11.membresia;
            document.getElementById("fecha11").value = resultados.mes11.fecha;
            document.getElementById("ticket11").value = resultados.mes11.ticket;
            document.getElementById("cupon11").value = resultados.mes11.cupon;
            document.getElementById("agente11").value = resultados.mes11.agente;

            document.getElementById("matricula12").value = resultados.mes12.matricula;
            document.getElementById("mensualidad12").value = resultados.mes12.mensualidad;
            document.getElementById("factura12").value = resultados.mes12.factura;
            document.getElementById("promo12").value = resultados.mes12.promo;
            document.getElementById("descuento12").value = resultados.mes12.descuento;
            document.getElementById("grupo12").value = resultados.mes12.grupo;
            document.getElementById("membresia12").value = resultados.mes12.membresia;
            document.getElementById("fecha12").value = resultados.mes12.fecha;
            document.getElementById("ticket12").value = resultados.mes12.ticket;
            document.getElementById("cupon12").value = resultados.mes12.cupon;
            document.getElementById("agente12").value = resultados.mes12.agente;






          } else {
            console.error("La respuesta JSON está vacía o no tiene el formato esperado.");
            mostrarMensajeError("La respuesta del servidor no contiene datos válidos.");
          }
        } catch (error) {
          console.error("Error al analizar la respuesta JSON:", error);
          mostrarMensajeError("Error al procesar la respuesta del servidor. Por favor, inténtelo de nuevo.");
        }
      } else {
        console.error("Error en la solicitud. Estado:", this.status);
        mostrarMensajeError("Error en la solicitud al servidor. Código de estado: " + this.status);
      }
    }
  };

  xhr.open("POST", "buscar_alumno.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send(
    "cedula_busqueda=" +
    cedula +
    "&estado_busqueda=" +
    estado +
    "&programa_busqueda=" +
    programa +
    "&año_busqueda=" +
    año
  );
}








//   ---------------------------------------------------

// <!-- formato de cédula para buscar -->

$(document).ready(function () {
  // Selector del input de cédula
  var cedulaInput = $("#cedula_busqueda");

  // Definir la longitud máxima después de aplicar el formato
  var maxFormattedLength = "9999-9999-99999".length;

  // Manejar el evento de entrada en el input
  cedulaInput.on("input", function () {
    // Obtener el valor actual del input
    var inputValue = cedulaInput.val();

    // Eliminar cualquier carácter que no sea un número
    var cleanedValue = inputValue.replace(/\D/g, "");

    // Limitar la longitud del valor
    cleanedValue = cleanedValue.slice(0, maxFormattedLength);

    // Aplicar el formato deseado (xxxx-xxxx-xxxxx)
    var formattedValue = formatCedula(cleanedValue);

    // Establecer el valor formateado en el input
    cedulaInput.val(formattedValue);
  });

  // Manejar el evento keydown para prevenir la entrada de más caracteres
  cedulaInput.on("keydown", function (event) {
    var inputValue = cedulaInput.val();

    // Si se alcanza la longitud máxima, prevenir la entrada de más caracteres
    if (inputValue.length >= maxFormattedLength && event.key.length === 1) {
      event.preventDefault();
    }
  });

  // Función para formatear la cédula
  function formatCedula(value) {
    // Añadir guiones en posiciones específicas
    return value.replace(/^(\d{4})(\d{4})(\d{5})$/, "$1-$2-$3");
  }
});
// --------------------------------------------------------

//   <!-- -------formato de la cedula para ingresar -->

$(document).ready(function () {
  // Selector del input de cédula
  var cedulaInput = $("#Cédula");

  // Definir la longitud máxima después de aplicar el formato
  var maxFormattedLength = "9999-9999-99999".length;

  // Manejar el evento de entrada en el input
  cedulaInput.on("input", function () {
    // Obtener el valor actual del input
    var inputValue = cedulaInput.val();

    // Eliminar cualquier carácter que no sea un número
    var cleanedValue = inputValue.replace(/\D/g, "");

    // Limitar la longitud del valor
    cleanedValue = cleanedValue.slice(0, maxFormattedLength);

    // Aplicar el formato deseado (xxxx-xxxx-xxxxx)
    var formattedValue = formatCedula(cleanedValue);

    // Establecer el valor formateado en el input
    cedulaInput.val(formattedValue);
  });

  // Manejar el evento keydown para prevenir la entrada de más caracteres
  cedulaInput.on("keydown", function (event) {
    var inputValue = cedulaInput.val();

    // Si se alcanza la longitud máxima, prevenir la entrada de más caracteres
    if (inputValue.length >= maxFormattedLength && event.key.length === 1) {
      event.preventDefault();
    }
  });

  // Función para formatear la cédula
  function formatCedula(value) {
    // Añadir guiones en posiciones específicas
    return value.replace(/^(\d{4})(\d{4})(\d{5})$/, "$1-$2-$3");
  }
});

