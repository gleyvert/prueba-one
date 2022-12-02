$(document).ready(function(){

    $("#id_ciudad").change(function(){
    var id_ciudad = $(this).val();
    console.log(id_ciudad);
    
    $.ajax({
    url: 'consultas/municipios.php',
    type: 'post',
    data: {id_ciudad:id_ciudad},
    dataType: 'json',
    success:function(response){
    console.log(response);
    
    var len = response.length;
    
    $("#id_municipio").empty();
    $("#id_municipio").append("<option value=''>Seleccione el municipio</option>");
        for( var i = 0; i<len; i++){
        var id_municipio = response[i]['id_municipio'];
        var municipio = response[i]['municipio'];
        $("#id_municipio").append("<option value='"+id_municipio+"'>"+municipio+"</option>");
        }
    }
    });
    });


    if($('#search').val()){
        let search = $('#search').val();
       // console.log(search);
        $.ajax({
            type: "post",
            url: "consultas/search-usuarios.php",
            data: {search : search},
            
            success: function (response) {
                //console.log(response);
                let usuarios = JSON.parse(response);
                let template = '';

                console.log(usuarios);

                usuarios.forEach(usuarios => {
                    console.log(usuarios);
                    template += `
                    <tr>
                        <td>${usuarios.nombre}</td>
                        <td>${usuarios.apellido}</td>
                        <td>${usuarios.email}</td>
                        <td>${usuarios.edad}</td>
                        <td>${usuarios.nombre_ciudad}</td>
                        <td>${usuarios.nombre_rol}</td>
                        <td>
                        <div class="btn-group" role="group" aria-label="Basic example">    
                            <a class="btn btn-outline-success" href="editar_usuario.php?id=<?php echo $row['id_usuario'] ?>">Editar<i class="fa-address-card-o"></i></a>
                            <a class="btn btn-outline-danger" href="eliminar_usuario.php?id=<?php echo $row['id_usuario'] ?>">Eliminar</a>
                        </div>
                        </td>
                    </tr>
                    `
                });
                $('#bodyId2').hide();
                $('#bodyId').html(template);
                if(template){
                    $('#bodyId').show();
                }else{
                    $('#bodyId').hide();
                }
            }
        });
    }else{
        $('#bodyId').hide();
        $('#bodyId2').show();
    }

    $('#search').keyup(function (e) { 
        if($('#search').val()){
            let search = $('#search').val();
           // console.log(search);
            $.ajax({
                type: "post",
                url: "consultas/search-usuarios.php",
                data: {search : search},
                
                success: function (response) {
                    //console.log(response);
                    let usuarios = JSON.parse(response);
                    let template = '';

                    console.log(usuarios);

                    usuarios.forEach(usuarios => {
                        console.log(usuarios);
                        template += `
                        <tr>
                            <td>${usuarios.nombre}</td>
                            <td>${usuarios.apellido}</td>
                            <td>${usuarios.email}</td>
                            <td>${usuarios.edad}</td>
                            <td>${usuarios.nombre_ciudad}</td>
                            <td>${usuarios.nombre_rol}</td>
                            <td>
                            <div class="btn-group" role="group" aria-label="Basic example">    
                                <a class="btn btn-outline-success" href="editar_usuario.php?id=<?php echo $row['id_usuario'] ?>">Editar<i class="fa-address-card-o"></i></a>
                                <a class="btn btn-outline-danger" href="eliminar_usuario.php?id=<?php echo $row['id_usuario'] ?>">Eliminar</a>
                            </div>
                            </td>
                        </tr>
                        `
                    });
                    $('#bodyId2').hide();
                    $('#bodyId').html(template);
                    if(template){
                        $('#bodyId').show();
                    }else{
                        $('#bodyId').hide();
                    }
                }
            });
        }else{
            $('#bodyId').hide();
            $('#bodyId2').show();
        }

    });


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

                    console.log(tareas);
                    
                    tareas.forEach(tareas => {
                        console.log(tareas);
                        template += `
                        <tr>
                            <td>${tareas.nombre}</td>
                            <td>${tareas.descripcion}</td>
                            <td>${tareas.creado_en}</td>
                            <td>${tareas.nombre_estatus}</td>
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

