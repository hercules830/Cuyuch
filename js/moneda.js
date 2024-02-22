function moneda(input) {
  // Removemos los espacios en blanco al inicio y al final del valor
  let valor = input.value.trim();

  // Si el valor no es válido, retornamos sin hacer nada
  if (valor === '') {
    return;
  }

  // Eliminamos cualquier signo del valor
  valor = valor.replace(/[^0-9.]/g, '');

  // Convertimos el valor a formato de moneda
  const valorFormateado = new Intl.NumberFormat('en-EN', { style: 'currency', currency: 'HNL' }).format(parseFloat(valor));

  // Actualizamos el valor del input con el valor formateado
  input.value = valorFormateado;
}

// const inputElement = document.querySelector('input[type="text"]');

// Agregamos un listener para el evento "focus" que se activa cuando el input obtiene el foco
inputElement.addEventListener('focus', function(event) {
  // Llamamos a la función "moneda" para darle formato de moneda al valor actual del input
  moneda(event.target);
});

// Agregamos un listener para el evento "blur" que se activa cuando el input pierde el foco
inputElement.addEventListener('blur', function(event) {
  // Llamamos a la función "moneda" para darle formato de moneda al valor actual del input
  moneda(event.target);
});
