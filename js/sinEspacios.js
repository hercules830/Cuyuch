function sinEspacios (event){
    const sinEspacio=event.target;
    sinEspacio.value = sinEspacio.value.replace(/\s/g, ''); // Eliminar espacios en blanco
}