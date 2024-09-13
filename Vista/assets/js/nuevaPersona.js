$(document).ready(function () {
    let form = $("#nuevaPersonaForm");
    form.on("submit", function (event) {
      let isValid = true;
  
      // Validar DNI
      let dniField = $("#nroDni");
      let expRegDni = /^[\d]{7,8}$/;
      if (!validateField(dniField, expRegDni)) {
        isValid = false;
      }
  
      // Validar Nombre y Apellido
      let expRegNombAp =
        /^([A-Za-zÑñÁáÉéÍíÓóÚú]+['-]?[A-Za-zÑñÁáÉéÍíÓóÚú]*)+(\s[A-Za-zÑñÁáÉéÍíÓóÚú]+['-]?[A-Za-zÑñÁáÉéÍíÓóÚú]*)*$/;
      let nameField = $("#nombre");
      let apellidoField = $("#apellido");
      if (!validateField(nameField, expRegNombAp)) {
        isValid = false;
      }
      if (!validateField(apellidoField, expRegNombAp)) {
        isValid = false;
      }
  
      // Validar Teléfono
      let expRegTel = /^[0-9]{10}$/;
      let telefonoField = $("#telefono");
      if (!validateField(telefonoField, expRegTel)) {
        isValid = false;
      }
  
      // Validar Domicilio
      const domicilioExpReg = /^[A-Za-zÑñÁáÉéÍíÓóÚú0-9\s.,'-]+$/;
      let domicilioField = $("#domicilio");
      if (!validateField(domicilioField, domicilioExpReg)) {
        isValid = false;
      }
  
      // Validar Fecha de Nacimiento
      let fecha = $("#fechaNac").val();
      if (!validateDate(fecha)) {
        isValid = false;
      }
  
      if (!isValid) {
        event.preventDefault();
      } else {
        form.addClass("was-validated");
      }
    });
  
    function validateDate(fecha) {
      let [anio, mes, dia] = fecha.split("-").map(Number); 
      let isValid = true;
  
      if (isNaN(dia) || isNaN(mes) || isNaN(anio)) {
        isValid = false;
      }
  
      if (dia <= 0 || mes <= 0 || mes > 12 || anio <= 0) {
        isValid = false;
      }
  
      const diasEnMes = [
        31,
        esBisiesto(anio) ? 29 : 28,
        31,
        30,
        31,
        30,
        31,
        31,
        30,
        31,
        30,
        31,
      ];
      if (dia > diasEnMes[mes - 1]) {
        isValid = false;
      }
  
      return isValid;
    }
  
    function esBisiesto(anio) {
      return (anio % 4 === 0 && anio % 100 !== 0) || anio % 400 === 0;
    }
  
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
  