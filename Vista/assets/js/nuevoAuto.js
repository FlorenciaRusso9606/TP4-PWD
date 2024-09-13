$(document).ready(function () {
    let form = $("#nuevoAutoForm");
    form.on("submit", function (event) {
      let isValid = true;
  
      // Validar DNI
      let dniField = $("#nroDni");
      let expRegDni = /^[\d]{7,8}$/;
      if (!validateField(dniField, expRegDni)) {
        isValid = false;
      }
  
      // Validar Marca y Modelo
      let expRegMarcaModelo = /^[A-Za-zÑñÁáÉéÍíÓóÚú0-9\s.,'-]+$/;
      let marcaField = $("#marca");
      let modeloField = $("#modelo");
      if (!validateField(marcaField, expRegMarcaModelo)) {
        isValid = false;
      }
      if (!validateField(modeloField, expRegMarcaModelo)) {
        isValid = false;
      }
  
      // Validar patente
      let patenteField = $('#patente');
      let expRegPatente = /^[A-Z]{3} \d{3}$|^[A-Z]{2} \d{3} [A-Z]{2}$/;
      if (!validateField(patenteField, expRegPatente)) {
        isValid = false;
      }
  
      if (!isValid) {
        event.preventDefault(); // Evita el envío del formulario si no es válido
      } else {
        form.addClass("was-validated");
      }
    });
  
    function validateField(field, regex) {
      let value = field.val().trim();
      field.removeClass("is-valid is-invalid");
      let isValid = regex.test(value);
  
      if (!isValid) {
        field.addClass("is-invalid");
      } else {
        field.addClass("is-valid");
      }
  
      return isValid;
    }
});
