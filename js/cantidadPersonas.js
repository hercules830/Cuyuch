const select = document.getElementById('cantidadPersonasSelect');

// Generar opciones del 1 al 100
for (let i = 1; i <= 1000; i++) {
  const option = document.createElement('option');
  option.value = i;
  option.textContent = i;
  select.appendChild(option);
}
