$(document).ready(function () {
    var form = $('#buscarPersonaForm');
    form.on('submit', function (event) {
        var isValid = true;
        var dniField = $('#nroDni');
        var dniValue = dniField.val().trim();

        // Expresión regular para validar la patente (formato viejo y nuevo)
        var expRegDni = /^[\d]{7,8}$/


  
        dniField.removeClass('is-valid is-invalid');


        if (!expRegDni.test(dniValue)) {
            dniField.addClass('is-invalid');
            isValid = false;
        } else {
            dniField.addClass('is-valid');
        }

        if (!isValid) {
            event.preventDefault();
        } else {
            form.addClass('was-validated');
        }
    });
});
