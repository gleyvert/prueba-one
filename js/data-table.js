
var tabla_tarea;

$(document).ready(function () {
   let template = '';
   tabla_tarea = $("#tabla-ajax").DataTable({
    'ajax': 'consultas/tabla_tareas.php',
    "ordering": false,
     
    //Para cambiar el lenguaje a español
"language": {
        "lengthMenu": "Mostrar _MENU_ registros",
        "zeroRecords": "No se encontraron resultados",
        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sSearch": "Buscar:",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast":"Último",
            "sNext":"Siguiente",
            "sPrevious": "Anterior"
         },
         "sProcessing":"Procesando...",
    },

    
 responsive: "true",

 dom: 'Bfrtlip'       
 
    
    
});

    /* $('#tabla-ajax').DataTable({
        ajax: {
          url: 'consultas/tabla_tareas.php',
          dataSrc: ''
         },
          columns: [ 
            {"data": "id_tarea"},
            {"data": "nombre"},
            {"data": "descripcion"},
            {"data": "creado_en"},
            {"defaultContent": 
            "<button type='button' id='buttonEditar' class='editar btn btn-primary' data-toggle='modal' data-target='#editar' data-whatever='@mdo'><i class='fas fa-edit'></i></button>"},
            {"defaultContent": 
            "<button type='button' id='buttonEliminar' class='eliminar btn btn-danger' data-toggle='modal' data-target='eliminar' data-whatever='@mdo'><i class='fas fa-trash-alt'></i></button>"}
              
              
           ]
        } ); */
       
        $('#tabla-php').hide();


    

});


function editarTarea(id_tarea) {
    console.log(id_tarea);
     $.ajax({
        url: "consultas/editar_tarea.php",
        type: "POST",
        data: {id_tarea:id_tarea},
        //dataType: 'json',
        success: function(response) {
            let tarea = JSON.parse(response);
            //console.log(tarea[0]['nombre']);
            $('#id_tarea').val(tarea[0]['id_tarea']);
            console.log(tarea[0]['id_tarea']);
            $('#nombre_tarea').val(tarea[0]['nombre']);
            $('#descripcion_tarea').val(tarea[0]['descripcion']);
            $('#option').val(tarea[0]['id_status']);
            //console.log(tarea[0]['id_status']);
           //document.querySelector("#eid_grupo").value=response[0].id_grupo;
           //document.querySelector("#enombre_grupo").value=response[0].nombre_grupo;
            //document.querySelector("#eobservaciones").value=response[0].observaciones;
        }
    });
  }

  function eliminarTarea(id_tarea){
    console.log(id_tarea);
    Swal.fire({
        title: 'SEGURO?',
        text: "Esta seguro de que desea eliminar la tarea!?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borrar esto!',
        cancelButtonText: 'Calcelar'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "consultas/eliminar_tarea.php",
                type: "POST",
                data: {id_tarea:id_tarea},
                //dataType: 'json',
                success: function(response) {
                    let tarea = JSON.parse(response);
                    console.log(response);
                    //console.log(tarea[0]['nombre']);
                  Swal.fire(
                    'Deleted!',
                    tarea,
                    'success'
                    )
                  tabla_tarea.ajax.reload(null, true);   
                }
            });
            
        }
      }) 

  }

  
  function guardarTarea(){
    var select_status= $('#option').val();
    var input_nombre = $('#nombre_tarea').val();
    var input_descripcion = $('#descripcion_tarea').val();
    var input_id_tarea = $('#id_tarea').val();

    console.log(select_status);
    console.log(input_nombre);
    console.log(input_descripcion);
    console.log(input_id_tarea);


    $.ajax({
        type: "POST",
        url: "consultas/update_editar.php",
        data: {select_status,input_nombre,input_descripcion,input_id_tarea},
        //dataType: "dataType",
        success: function (response) {
           // var message = JSON.parse(response);
            // var tarea = JSON.parse(response);
            console.log(response);
            tabla_tarea.ajax.reload(null, true);  
            $("#ModalEditar").modal("hide"); 
          
            Swal.fire(
                'Editado!',
                'Tarea editada satisfactorimante',
                'success'
              )
            //alert(response);
        }
    });

  }
 
      /*  $(document).on('click', '.task-item', function(){
            let element = $(this)[0].parentElement.parentElement;
            let id= $(element).attr('taskId');
            $.post('task-single.php', {id}, function(response){
                const task = JSON.parse(response);
                
                $('#name').val(task.name);
                $('#description').val(task.description);
                $('#taskId').val(task.id);
                edit=true;
            })
            
        
        })
     */

    $('#btn1').click(function (e) { 
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
          })
        
    });