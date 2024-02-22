function crearClaveMaestra(event) {
  event.preventDefault();

  var nuevaClaveInput = document.getElementById("nuevaClave");
  var nuevaClave = nuevaClaveInput.value;

  // Guarda la nueva clave maestra en el almacenamiento local
  localStorage.setItem("claveMaestra", nuevaClave);

  nuevaClaveInput.value = ""; // Limpiar el campo de la nueva clave

  alert("Se ha guardado la nueva clave maestra");
}

function validarClaveMaestra(event) {
  event.preventDefault();

  var claveMaestraInput = document.getElementById("claveMaestra");
  var claveMaestra = claveMaestraInput.value;

  // Obtiene la clave maestra almacenada en el almacenamiento local
  var claveMaestraGuardada = localStorage.getItem("claveMaestra");

  // Verifica si la clave maestra es válida
  if (claveMaestra === claveMaestraGuardada) {
    var selects = document.getElementsByClassName("selectMoneda");

    // Recorre todos los selects y habilita las opciones desactivadas
    for (var i = 0; i < selects.length; i++) {
      var opciones = selects[i].querySelectorAll(".opcionGratis");
      opciones.forEach(function (opcion) {
        opcion.disabled = false;

        // Almacena el valor de la opción seleccionada en el Local Storage
        var selectId = selects[i].id;
        var matriculaName = selects[i].name;
        var selectedValue = selects[i].value;
        localStorage.setItem(matriculaName, selectedValue);
      });
    }

    claveMaestraInput.value = ""; // Limpiar el campo de la clave maestra después de utilizarla

    ocultarFormulario(); // Ocultar el formulario de inicio de sesión
  } else {
    alert("Clave maestra incorrecta");
  }
}

function showLoginForm() {
  document.getElementById("loginForm").style.display = "block";
  document.getElementById("claveMaestra").focus();
}

function ocultarFormulario() {
  document.getElementById("loginForm").style.display = "none";
}
