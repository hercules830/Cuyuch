function simboloNumeral(event) {
  const input = event.target;
  input.value = input.value.replace(/\s/g, ''); // Eliminar espacios en blanco

  // Solo permitir números
  input.value = input.value.replace(/[^0-9]/g, '');

  // Añadir el símbolo '#' al inicio del valor si hay datos, de lo contrario, borrar el símbolo '#'
  if (input.value.length > 0) {
    input.value = '#' + input.value;
  } else {
    input.value = '';
  }
}


