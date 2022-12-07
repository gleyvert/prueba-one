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
