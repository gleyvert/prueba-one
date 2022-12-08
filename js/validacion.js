/*
$("#guardar_usuario").click(function (e) {
  console.log("funcioan");
  if ($("#nombre").val() == "") {
    $("#nombre").attr("class", "form-control is-invalid");
  }
  if ($("#apellido").val() == "") {
    $("#apellido").attr("class", "form-control is-invalid");
  }
  if ($("#email").val() == "") {
    $("#email").attr("class", "form-control is-invalid");
  }
  if ($("#edad").val() == "") {
    $("#edad").attr("class", "form-control is-invalid");
  }
  if ($("#rol").val() == "") {
    $("#rol").attr("class", "form-select custom-select");
  }
  //e.preventDefault();
});

$("#nombre").keyup(function (e) {
  if ($("#nombre").val() == "") {
    $("#nombre").attr("class", "form-control is-invalid");
  } else {
    $("#nombre").attr("class", "form-control");
  }
});
*/

(function () {
  'use strict';
  window.addEventListener('load', function () {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
        
      }, false);
      $("#nombre").keyup(function (e) {
        if ($("#nombre").val() == "") {
          $("#nombre").attr("class", "form-control is-invalid");
          console.log('dunciona locotr');
        } else {
          $("#nombre").attr("class", "form-control");
          console.log('dunciona locotr');
        }
      });
    });
  }, false);
})();