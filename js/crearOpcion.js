

const select = document.getElementById('my-select');
const nuevaOpcionInput = document.getElementById('nueva-opcion-input');
const agregarOpcionBtn = document.getElementById('agregar-opcion-btn');
const eliminarOpcionBtn = document.getElementById('eliminar-opcion-btn');
// const myForm = document.getElementById('form');

// Carga las opciones guardadas en localStorage
if (localStorage.getItem('select-options')) {
  select.innerHTML = localStorage.getItem('select-options');
}

agregarOpcionBtn.addEventListener('click', function(event) {
  event.preventDefault(); // Evita que se envíe el formulario
  const nuevaOpcion = document.createElement('option');
  nuevaOpcion.text = nuevaOpcionInput.value;
  nuevaOpcion.value = nuevaOpcionInput.value;
  select.add(nuevaOpcion);
  guardarOpciones();
  nuevaOpcionInput.value = ''; // Limpia el input de la nueva opción
});
eliminarOpcionBtn.addEventListener('click', function(event) {
  event.preventDefault();
  const opcionSeleccionada = select.options[select.selectedIndex];
  if (!opcionSeleccionada.disabled) {
    select.remove(select.selectedIndex);
    guardarOpciones();
  }
  });

// Guarda las opciones del select en localStorage
function guardarOpciones() {
  localStorage.setItem('select-options', select.innerHTML);
}

// Maneja el evento submit del formulario
myForm.addEventListener('submit', function(event) {
  event.preventDefault(); // Evita que se envíe el formulario
  // Guarda las opciones en localStorage para que persistan en futuras visitas
  localStorage.setItem('select-options', select.innerHTML);
});
