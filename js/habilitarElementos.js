function mostrarFormulario() {
    document.getElementById("claveMaestraForm").style.display = "block";
}

function verificarClave(event) {
    event.preventDefault();

    var claveMaestraInput = document.getElementById("claveElementos");
    var claveMaestra = claveMaestraInput.value;
    
    // Obtiene la clave maestra almacenada en el almacenamiento local
  var claveMaestraGuardada = localStorage.getItem("claveMaestra");

    if (claveMaestra === claveMaestraGuardada) {
        habilitarElementos();
        alert("Clave correcta. Elementos desbloqueados.");
        document.getElementById("claveMaestraForm").style.display = "none"; // Oculta el formulario después de ingresar la clave correcta
        claveMaestraInput.value = ""; // Limpia el campo de contraseña
    } else {
        alert("Clave incorrecta. Inténtalo de nuevo.");
        claveMaestraInput.value = ""; // Limpia el campo de contraseña en caso de clave incorrecta
    }
}

function mostrarFormulario() {
    document.getElementById("claveMaestraForm").style.display = "block";
    document.getElementById("claveElementos").focus();
  }
  
  function ocultar() {
    document.getElementById("claveMaestraForm").style.display = "none";
  }

function habilitarElementos() {
    for (var i = 1; i <= 12; i++) {
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

        // Habilita los elementos de entrada
        matriculaInput.disabled = false;
        mensualidadInput.disabled = false;
        facturaInput.disabled = false;
        promoInput.disabled = false;
        descuentoInput.disabled = false;
        grupoInput.disabled = false;
        membresiaInput.disabled = false;
        fechaInput.disabled = false;
        ticketInput.disabled = false;
        cuponInput.disabled = false;
        agenteInput.disabled = false;
    }
}



