
$('#button').on('click', function () {
    if ( $('#nombre_ciudad').val() == ''){
        $('#nombre_ciudad').attr('class', 'form-control is-invalid');
    }else{
        var nombre_ciudad = $('#nombre_ciudad').val();
        $.ajax({
            type: "POST",
            url: "consultas/ciudades.php",
            data: {nombre_ciudad},
            //dataType: "dataType",
            success: function (response) {
               // console.log(response);
                //var nombre_ciu = JSON.parse(response);
                //console.log(nombre_ciu);
                $("#ModalAgregarCiudad").modal("hide");

                if(response){
                 Swal.fire(
                    'Guardado!',
                    response,
                    'success'
                  )
                  $('#nombre_ciudad').val('');
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error...',
                        text: 'La ciudad ya existe',
                      })
                      $('#nombre_ciudad').attr('class', 'form-control is-invalid');
                }
               
            }
        });
    }
    
});


$('#button2').on('click', function () {
    if ( $('#id_ciudad2').val() == ''){
        $('#divSelect').attr('class', 'form-group mt-2 was-validated');
    }
      if ( $('#nombre_municipio').val() == ''){
        $('#nombre_municipio').attr('class', 'form-control is-invalid');
    }
    if($('#id_ciudad2').val() != '' &&  $('#nombre_municipio').val() != ''){
        var nombre_municipio = $('#nombre_municipio').val();
        var id_ciudad = $('#id_ciudad2').val();
        console.log(id_ciudad);
        console.log(nombre_municipio);

        $.ajax({
            type: "POST",
            url: "consultas/municipiosAgre.php",
            data: {nombre_municipio,id_ciudad},
            //dataType: "dataType",
            success: function (response) {
               // console.log(response);
                //var nombre_ciu = JSON.parse(response);
                //console.log(nombre_ciu);
                $("#ModalAgregarMunicipio").modal("hide");

                if(response){
                 Swal.fire(
                    'Guardado!',
                    response,
                    'success'
                  )
                  $('#nombre_municipio').val('');
                  $('#id_ciudad2').val('');
                  $('#divSelect').attr('class', 'form-group mt-2');
                  $('#nombre_municipio').attr('class', 'form-control');
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error...',
                        text: 'La ciudad ya existe',
                      })
                      $('#nombre_municipio').attr('class', 'form-control is-invalid');
                }
               
            }
        });
    }
    
});

$(document).ready(function () {
    $('#search-tarea').keyup(function (e) { 
        if($('#search-tarea').val()){
            let search_tarea = $('#search-tarea').val();
           // console.log(search);
            $.ajax({
                type: "post",
                url: "consultas/search-tareas.php",
                data: {search_tarea : search_tarea},
                
                success: function (response) {
                    console.log(response);
                    let tareas = JSON.parse(response);
                    let template = '';
                    var clase = '';
                    console.log(tareas);
                    var status = {
                        pendiente: 'danger', 
                        en_curso: 'warning', 
                        realizada: 'success'
                    };
                   
                  
                    tareas.forEach(tareas => {
                        //console.log(tareas);
                        var clase = status[tareas.nombre_status];
                        console.log(clase);
                        //console.log(status);
                        template += `
                        <tr>
                            <td>${tareas.nombre}</td>
                            <td>${tareas.descripcion}</td>
                            <td>${tareas.creado_en}</td>
                            <td><span class="badge badge-${clase}">${tareas.nombre_status}</span></td>
                            <td>
                            <div class="btn-group" role="group" aria-label="Basic example">    
                                <a class="btn btn-outline-success" href="editar_usuario.php?id=<?php echo $row['id_usuario'] ?>">Editar<i class="fa-address-card-o"></i></a>
                                <a class="btn btn-outline-danger" href="eliminar_usuario.php?id=<?php echo $row['id_usuario'] ?>">Eliminar</a>
                            </div>
                            </td>
                        </tr>
                        `
                    });
                    $('#body-tareasId2').hide();
                    $('#body-tareasId').html(template);
                    if(template){
                        $('#body-tareasId').show();
                    }else{
                        $('#body-tareasId').hide();
                    }
                }
            });
        }else{
            $('#body-tareasId').hide();
            $('#body-tareasId2').show();
        }

    });
});