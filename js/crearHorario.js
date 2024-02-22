function configurarOpcionesHorario() {
  const selectClass = 'select-horario';
  const nuevaOpcionInput = document.getElementById('nueva-opcion-input-horario');
  const agregarOpcionBtn = document.getElementById('agregar-opcion-btn-horario');
  const eliminarOpcionBtn = document.getElementById('eliminar-opcion-btn-horario');
  const myForm = document.getElementById('form');
  const dialogBox = document.getElementById('dialog-box');
  const dialogOptions = document.getElementById('dialog-options');
  const dialogDeleteBtn = document.getElementById('dialog-delete');
  const dialogCancelBtn = document.getElementById('dialog-cancel');
  const dialogSelectAllBtn = document.createElement('button');
  dialogSelectAllBtn.textContent = 'Seleccionar todos';
  let selectAll = true;

  const selects = document.querySelectorAll(`.${selectClass}`);

  // Carga las opciones guardadas en localStorage
  selects.forEach((select) => {
    const selectId = select.getAttribute('id');
    if (localStorage.getItem(`crear-horario-${selectId}`)) {
      select.innerHTML = localStorage.getItem(`crear-horario-${selectId}`);
    }
  });

  agregarOpcionBtn.addEventListener('click', function (event) {
    event.preventDefault(); // Evita que se envíe el formulario

    // Validar que se haya ingresado un valor
    const nuevaOpcionValor = nuevaOpcionInput.value.trim();
    if (nuevaOpcionValor === '') {
      alert('Ingresa un valor válido.');
      return;
    }

    selects.forEach((select) => {
      const nuevaOpcionValue = nuevaOpcionInput.value.trim(); // Obtener el valor sin espacios en blanco al inicio y al final
      if (nuevaOpcionValue !== '') { // Validar que el valor no esté en blanco
        const nuevaOpcion = document.createElement('option');
        nuevaOpcion.text = nuevaOpcionValue;
        nuevaOpcion.value = nuevaOpcionValue;
        select.add(nuevaOpcion);
        guardarOpciones(select);
      } else {
        alert('No se puede agregar una opción en blanco.'); // Mostrar mensaje de error
      }
    });
    nuevaOpcionInput.value = ''; // Limpia el input de la nueva opción
  });

  eliminarOpcionBtn.addEventListener('click', function (event) {
    event.preventDefault();

    const opcionesSeleccionadas = [];

    selects.forEach((select) => {
      const opcionesSeleccionadasSelect = Array.from(select.selectedOptions);
      opcionesSeleccionadasSelect.forEach((opcion) => {
        opcionesSeleccionadas.push({ select, opcion });
      });
    });

    const opcionesNoEnBlanco = opcionesSeleccionadas.filter(({ opcion }) => opcion.value !== '');

    if (opcionesNoEnBlanco.length > 0) {
      opcionesNoEnBlanco.forEach(({ select, opcion }) => {
        select.removeChild(opcion);
        guardarOpciones(select);
      });
    } else {
      alert('No se pueden eliminar opciones sin valor.'); // Mostrar mensaje de error
    }
  });

  dialogDeleteBtn.addEventListener('click', function (event) {
    event.preventDefault();

    // Obtener las opciones seleccionadas en el cuadro de diálogo
    const checkboxes = dialogOptions.querySelectorAll('input[type="checkbox"]:checked');

    checkboxes.forEach((checkbox) => {
      const selectId = checkbox.getAttribute('data-select-id');
      const opcionValue = checkbox.getAttribute('data-opcion-value');
      const select = document.getElementById(selectId);

      if (select) {
        const opcion = Array.from(select.options).find((option) => option.value === opcionValue);

        if (opcion && opcion.value !== '') { // Validar que la opción no tenga valor en blanco
          select.removeChild(opcion);
          guardarOpciones(select);
        }
      }
    });

    // Ocultar el cuadro de diálogo
    dialogBox.style.display = 'none';
  });

  dialogCancelBtn.addEventListener('click', function (event) {
    event.preventDefault();

    // Ocultar el cuadro de diálogo
    dialogBox.style.display = 'none';
  });

  dialogSelectAllBtn.addEventListener('click', function (event) {
    event.preventDefault();

    const checkboxes = dialogOptions.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach((checkbox) => {
      checkbox.checked = selectAll;
    });

    selectAll = !selectAll;
    dialogSelectAllBtn.textContent = selectAll ? 'Seleccionar todos' : 'Deseleccionar todos';
  });

  // Guarda las opciones del select en localStorage
  function guardarOpciones(select) {
    const selectId = select.getAttribute('id');
    localStorage.setItem(`crear-horario-${selectId}`, select.innerHTML);
  }

  // Maneja el evento submit del formulario
  myForm.addEventListener('submit', function (event) {
    event.preventDefault(); // Evita que se envíe el formulario
    selects.forEach((select) => {
      const selectId = select.getAttribute('id');
      localStorage.setItem(`crear-horario-${selectId}`, select.innerHTML);
    });
  });

  // Mostrar el cuadro de diálogo al cargar la página
  dialogBox.style.display = 'block';
}

// Llama a la función para configurar las opciones de los selects
configurarOpcionesHorario();
