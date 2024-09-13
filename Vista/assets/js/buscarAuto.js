$(document).ready(function () {
    var form = $('#buscarAutoForm');
    form.on('submit', function (event) {
        var isValid = true;
        var patenteField = $('#patente');
        var patenteValue = patenteField.val().trim().toUpperCase();

        // Expresión regular para validar la patente (formato viejo y nuevo)
        var expRegPatente = /^[A-Z]{3} |^\d{3}$[A-Z]{2} \d{3} [A-Z]{2}$/


 
        patenteField.removeClass('is-valid is-invalid');


        if (!expRegPatente.test(patenteValue)) {
            patenteField.addClass('is-invalid');
            isValid = false;
        } else {
            patenteField.addClass('is-valid');
        }

        if (!isValid) {
            event.preventDefault(); 
        } else {
            form.addClass('was-validated');
        }
    });
});
