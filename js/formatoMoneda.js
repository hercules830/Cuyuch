// Dar formato de moneda a opciones tipo numero en select


    const selectMoneda = document.querySelectorAll('.selectMoneda option');
    const formatter = new Intl.NumberFormat('en-EN', {
      style: 'currency',
      currency:'HNL'
    });
    selectMoneda.forEach(option => {
      const value = Number(option.value);
      if (!isNaN(value)) {
        option.text = formatter.format(value);
      }
    });
