$(document).ready(function () {
   let template = '';
    $('#tabla-ajax').DataTable({
        ajax: {
          url: 'consultas/tabla_tareas.php',
          dataSrc: ''
         },
          columns: [ 
            {"data": "nombre"},
            {"data": "descripcion"},
            {"data": "creado_en"},
            {"defaultContent": 
            "<button type='button' id='buttonEditar' class='editar btn btn-primary' data-toggle='modal' data-target='editar' data-whatever='@mdo'<i class='far fa-edit'></i></button>"},
            {"defaultContent": 
            "<button type='button' id='buttonEditar' class='editar btn btn-primary' data-toggle='modal' data-target='editar' data-whatever='@mdo'<i class='far fa-trash-alt'></i></button>"}
              
              
           ]
        } );
        $('#buttonEditar').on("click", function () {
            console.log('hola');
        });
        $('#buttonEditar').click(function (e) {  
            console.log('hola');
            e.preventDefault();
            
        });
        //obtener_data_editar("#tabla-ajax tbody", table);

        var obtener_data_editar = function(tbody,table){
            $(tbody).on("click","button.editar", function(){
                var data = table.row( $(this).parents("tr")).data();
                console.log(data);
            })
        }
    
        $('#tabla-php').hide();

});