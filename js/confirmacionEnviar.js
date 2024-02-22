function confirmarEnvio() {
  var respuesta = confirm("¿Estás seguro de que quieres enviar el formulario?");
  
  if (respuesta == true) {
    var respuesta = confirm("¿Estás a punto de enviar el formulario? ¿Deseas enviarlo?");
    
    if (respuesta == true) {
      // Continuar con el envío del formulario
      document.getElementById("form").submit();
    }
    else {
      // Cancelar el envío del formulario
      return false;
    }
  }
   else {
    return false;
  }
}