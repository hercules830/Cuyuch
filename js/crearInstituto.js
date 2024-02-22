function configurarOpcionesInstituto() {
  const select = document.getElementById('Instituto');
  const nuevaOpcionInput = document.getElementById('nueva-opcion-input-Instituto');
  const agregarOpcionBtn = document.getElementById('agregar-opcion-btn-Instituto');
  const eliminarOpcionBtn = document.getElementById('eliminar-opcion-btn-Instituto');
  const myForm = document.getElementById('form');

  // Carga las opciones guardadas en localStorage
  if (localStorage.getItem('guardar-Instituto')) {
    select.innerHTML = localStorage.getItem('guardar-Instituto');
  }

  agregarOpcionBtn.addEventListener('click', function(event) {
    event.preventDefault(); // Evita que se envíe el formulario

    // Validar que se haya ingresado un valor
    const nuevaOpcionValor = nuevaOpcionInput.value.trim();
    if (nuevaOpcionValor === '') {
      alert('Ingresa un valor válido.');
      return;
    }

    const nuevaOpcion = document.createElement('option');
    nuevaOpcion.text = nuevaOpcionValor.charAt(0).toUpperCase() + nuevaOpcionValor.slice(1); // La primera letra en mayúscula
    nuevaOpcion.value = nuevaOpcionValor;
    select.add(nuevaOpcion);
    guardarOpciones();
    nuevaOpcionInput.value = ''; // Limpia el input de la nueva opción
    ordenarOpciones();
  });

  eliminarOpcionBtn.addEventListener('click', function(event) {
    event.preventDefault();
    const opcionSeleccionada = select.options[select.selectedIndex];
    if (opcionSeleccionada.value !== '' && !opcionSeleccionada.disabled) {
      select.remove(select.selectedIndex);
      guardarOpciones();
      ordenarOpciones();
    } else {
      alert('No se puede eliminar una opción sin valor.');
    }
  });

  // Guarda las opciones del select en localStorage
  function guardarOpciones() {
    localStorage.setItem('guardar-Instituto', select.innerHTML);
  }

  // Ordena las opciones y agrega encabezados de letras
  function ordenarOpciones() {
    const options = Array.from(select.options);

    // Filtra las opciones desactivadas
    const disabledOptions = options.filter(option => option.disabled);
    // Filtra las opciones activadas
    const enabledOptions = options.filter(option => !option.disabled);

    // Ordena las opciones activadas alfabéticamente
    const sortedEnabledOptions = enabledOptions.sort((a, b) => {
      return a.text.localeCompare(b.text, 'en', { sensitivity: 'base' });
    });

    // Obtiene las letras iniciales de las opciones activadas
    const initials = new Set(sortedEnabledOptions.map(option => option.text.charAt(0).toUpperCase()));

    // Limpia el select
    select.innerHTML = '';

    // Agrega las opciones activadas agrupadas por letra con encabezados
    initials.forEach(initial => {
      const optgroup = document.createElement('optgroup');
      optgroup.label = initial;
      select.add(optgroup);
      sortedEnabledOptions.forEach(option => {
        if (option.text.charAt(0).toUpperCase() === initial) {
          optgroup.appendChild(option);
        }
      });
    });

    // Elimina las letras del abecedario sin opciones
    const alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    const optgroups = Array.from(select.getElementsByTagName('optgroup'));
    optgroups.forEach(optgroup => {
      const initial = optgroup.label;
      if (!initials.has(initial)) {
        select.removeChild(optgroup);
      }
    });
  }

  // Llama a la función para configurar las opciones del select "instituto"
  ordenarOpciones();
}

// Llama a la función para configurar las opciones del select "instituto"
configurarOpcionesInstituto();
