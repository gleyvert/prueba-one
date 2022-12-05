$(document).ready(function () {
   let template = '';
   tabla_grupo = $("#tabla-ajax").DataTable({
    'ajax': 'consultas/tabla_tareas.php',

   
    

     
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


        
const editarTarea=(id_tarea)=>{
     $.ajax({
        url: 'consultas/tabla_tareas.php',
        type: "POST",
        data: {id_tarea},
        dataType: 'json',
        success: function(response) {
           // console.log(response[0]);
           document.querySelector("#eid_grupo").value=response[0].id_grupo;
           document.querySelector("#enombre_grupo").value=response[0].nombre_grupo;
            document.querySelector("#eobservaciones").value=response[0].observaciones;
        }
    });
  }

        $(document).on('click', '.task-item', function(){
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
});