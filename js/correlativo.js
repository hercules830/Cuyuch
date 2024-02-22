// Obtener el campo de entrada y su valor actual
const numeroInput = document.querySelector('input[name="numero"]');
let valorActual = parseInt(numeroInput.value);

// Obtener el valor actual del número del almacenamiento local del navegador
const storageKey = "valor-actual";
let storageValue = localStorage.getItem(storageKey);
if (!storageValue) {
  storageValue = valorActual.toString();
  localStorage.setItem(storageKey, storageValue);
} else {
  valorActual = parseInt(storageValue);
}

// Actualizar el valor actual del número en el campo de entrada
numeroInput.value = valorActual;

// Manejar el evento de envío de formulario
document.querySelector("form").addEventListener("submit", (event) => {
  // Prevenir que se envíe el formulario por defecto
  event.preventDefault();

  // Incrementar el valor actual y actualizar el campo de entrada
  valorActual += 1;
  numeroInput.value = valorActual.toString();

  // Guardar el valor actual en el almacenamiento local del navegador
  localStorage.setItem(storageKey, valorActual.toString());

  // Enviar el formulario con el valor actual del número
  event.target.submit();
});
