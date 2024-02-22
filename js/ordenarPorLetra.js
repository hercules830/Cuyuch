function ordenarOpcionesSelectPorLetra(selectId) {
    var select = document.getElementById(selectId);
    var options = Array.from(select.options);

    var disabledOptions = options.filter(function(option) {
      return option.disabled;
    });

    var enabledOptions = options.filter(function(option) {
      return !option.disabled;
    });

    enabledOptions.sort(function(a, b) {
      var textA = a.text.toUpperCase();
      var textB = b.text.toUpperCase();
      return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
    });

    while (select.options.length > 0) {
      select.remove(0);
    }

    var currentLetter = null;
    enabledOptions.forEach(function(option) {
      var text = option.text.toUpperCase();
      var firstLetter = text.charAt(0);
      if (firstLetter !== currentLetter) {
        var optgroup = document.createElement('optgroup');
        optgroup.label = firstLetter;
        select.appendChild(optgroup);
        currentLetter = firstLetter;
      }
      select.lastChild.appendChild(option);
    });

    disabledOptions.forEach(function(option) {
      select.insertBefore(option, select.firstChild);
    });
  }

  ordenarOpcionesSelectPorLetra('instituto');