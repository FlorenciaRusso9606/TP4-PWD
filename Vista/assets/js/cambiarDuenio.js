$(document).ready(function () {
    var form = $('#cambioDuenioForm');
    form.on('submit', function (event) {
        var isValid = true;
        var dniField = $('#nroDni');
        var dniValue = dniField.val().trim();
        var patenteField = $('#patente');
        var patenteValue = patenteField.val().trim().toUpperCase();

        // Expresión regular para validar la patente (formato viejo y nuevo)
        var expRegPatente = /^[A-Z]{3} \d{3}$|^[A-Z]{2} \d{3} [A-Z]{2}$/


        // Expresión regular para validar la patente (formato viejo y nuevo)
        var expRegDni = /^[\d]{7,8}$/



        dniField.removeClass('is-valid is-invalid');


        if (!expRegDni.test(dniValue)) {
            dniField.addClass('is-invalid');
            isValid = false;
        } else {
            dniField.addClass('is-valid');
        }

       
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
