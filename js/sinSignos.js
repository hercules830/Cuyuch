function restrictInput(event) {
    const input = event.target;
    const regex = /[\.,]/g;
    input.value = input.value.replace(regex, '');
  }
  