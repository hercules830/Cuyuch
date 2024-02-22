function configurarOpcionesMatricula() {
  const selectClass = 'selectMoneda';
  const nuevaOpcionInput = document.getElementById('nueva-opcion-input-matricula');
  const agregarOpcionBtn = document.getElementById('agregar-opcion-btn-matricula');
  const eliminarOpcionBtn = document.getElementById('eliminar-opcion-btn-matricula');
  const myForm = document.getElementById('form');

  const selects = document.querySelectorAll(`.${selectClass}`);

  // Carga las opciones guardadas en localStorage
  selects.forEach((select) => {
    const selectId = select.getAttribute('id');
    if (localStorage.getItem(`select-options-${selectId}`)) {
      select.innerHTML = localStorage.getItem(`select-options-${selectId}`);
    }
  });

  agregarOpcionBtn.addEventListener('click', function(event) {
    event.preventDefault(); // Evita que se envíe el formulario

    // Validar que se haya ingresado un número
    const nuevaOpcionValor = parseFloat(nuevaOpcionInput.value);
    if (isNaN(nuevaOpcionValor)) {
      alert('Ingresa un número válido.');
      return;
    }

    // Formatear el número como moneda HNL
    const nuevaOpcionTexto = nuevaOpcionValor.toLocaleString('en-HN', { style: 'currency', currency: 'HNL' });

    selects.forEach((select) => {
      const nuevaOpcion = document.createElement('option');
      nuevaOpcion.text = nuevaOpcionTexto;
      nuevaOpcion.value = nuevaOpcionValor;
      select.add(nuevaOpcion);
      guardarOpciones(select);
    });

    nuevaOpcionInput.value = ''; // Limpia el input de la nueva opción
  });

  eliminarOpcionBtn.addEventListener('click', function(event) {
    event.preventDefault();
    let opcionesBorradas = false;
    selects.forEach((select) => {
      const opcionesSeleccionadas = Array.from(select.selectedOptions);
      opcionesSeleccionadas.forEach((opcion) => {
        if (opcion.value !== '' && opcion.value !== 'Gratis') {
          opcion.remove();
          guardarOpciones(select);
          opcionesBorradas = true;
        }
      });
    });
    if (!opcionesBorradas) {
      alert('No se pueden eliminar opciones sin valor.'); // Mostrar mensaje de error
    }
  });

  // Guarda las opciones del select en localStorage
  function guardarOpciones(select) {
    const selectId = select.getAttribute('id');
    localStorage.setItem(`select-options-${selectId}`, select.innerHTML);
  }

  // Maneja el evento submit del formulario
  myForm.addEventListener('submit', function(event) {
    event.preventDefault(); // Evita que se envíe el formulario
    selects.forEach((select) => {
      const selectId = select.getAttribute('id');
      localStorage.setItem(`select-options-${selectId}`, select.innerHTML);
    });
  });
}

// Llama a la función para configurar las opciones de los selects
configurarOpcionesMatricula();
