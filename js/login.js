function ir() {
  var user, pass;

  user = document.getElementById("usuario").value;
  pass = document.getElementById("contraseña").value;

  if (user == document.getElementById("usuario").value && pass == document.getElementById("contraseña").value){
    alert("Bienvenido a EXTRACURRICULARES CUYUCH");
  } else {
    alert("Datos inválidos, ingrese los datos correctamente.");
  }
}
