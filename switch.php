<?php
//date(n) para optener el dia del 1 al 7 de lunes a domingo
$numero_dia = date('N');

$nombre_dia = '';
switch ($numero_dia) {
 case 1:
 $nombre_dia = "Lunes";
 break;
 case 2:
 $nombre_dia = "Martes";
 break;
 case 3:
 $nombre_dia = "Miércoles";
 break;
 case 4:
 $nombre_dia = "Jueves";
 break;
 case 5:
 $nombre_dia = "Viernes";
 break;
 case 6:
 $nombre_dia = "Sábado";
 break;
 case 7:
 $nombre_dia = "Domingo";
 break;
 default:
  $nombre_dia = "No sabemos que día es";
   }

echo $numero_dia;
echo $nombre_dia;

echo '<br/>';

$variable="posible valor 2";

switch ($variable) {
    case "posible valor 1":
    case "posible valor 2":
    case "posible valor 3":
    /* algoritmo a ejecutar si el valor de $variable es
    posible valor 1, posible valor 2 o posible valor 3
    */
    echo 'funciona el posible caso de algo';
    break;
    case "posible valor 4":
    /* algoritmo a ejecutar si el valor de $variable es
    posible valor 4
    */
    echo 'no hay variable';
    break;
    default:
    // algoritmo a ejecutar si valor no ha sido contemplado en
    // ningúno de los «case» anteriores
   }

$datos_de_juan = array(
    'apellido' => 'Pérez',
    'fecha de nacimiento' => '23-11-1970',
    'telefonos' =>array(
        'Casa' => '4310-9030',
        'Móvil' => '15 4017-2530',
        'Trabajo' => '4604-9000'),
        'Casado' => True,
        'Pasaporte' => false,
);

echo $datos_de_juan['telefonos']['Casa'];

$mi_array = array('Ana', 'Gabriela', 'Julia', 'Noelia');
$mi_array[] = 'Cecilia';
print_r($mi_array);

?>

