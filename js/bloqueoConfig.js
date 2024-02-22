function desbloquearConfig(event) {
    event.preventDefault();
  
    var claveMaestraInput = document.getElementById("claveMaestra");
    var claveMaestra = claveMaestraInput.value;
  
    // Obtiene la clave maestra almacenada en el almacenamiento local
    var claveMaestraGuardada = localStorage.getItem("claveMaestra");
  
    // Verifica si la clave ingresada es correcta
    if (claveMaestra === claveMaestraGuardada) {
      // Oculta el formulario de login
      document.getElementById("loginForm").style.display = "none";
  
      // Muestra el popup de configuración
      document.getElementById("popup").style.display = "block";
  
      // Limpia el campo de contraseña
      claveMaestraInput.value = "";
    } else {
      alert("Clave incorrecta. Inténtalo de nuevo.");
  
      // Limpia el campo de contraseña en caso de clave incorrecta
      claveMaestraInput.value = "";
    }
  }
  