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
    
    });