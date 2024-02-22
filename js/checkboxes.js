// <!-- hacer visible las checkbox -->

const ocultarCheckbox = document.getElementById("ocultarCB");
const mostrarCheckbox = document.getElementById("mostrarCB");
const checkboxes = document.querySelectorAll('input[name="boxes"]');

ocultarCheckbox.addEventListener('click', function (event) {
    event.preventDefault();
});

mostrarCheckbox.addEventListener('click', function (event) {
    event.preventDefault();
});

function mostrarCheckboxes() {
    checkboxes.forEach(function (checkbox) {
        checkbox.hidden = false;
        checkbox.addEventListener('change', function (event) {
            if (event.target.checked) {
                checkboxes.forEach(function (otherCheckbox) {
                    if (otherCheckbox !== checkbox) {
                        otherCheckbox.checked = false;
                    }
                });
            }
        });
    });
};


// ocultar checkboxes

function ocultarCheckboxes() {
    checkboxes.forEach(function (checkbox) {
        checkbox.hidden = true;
        checkbox.addEventListener('change', function (event) {
        });
    });
};