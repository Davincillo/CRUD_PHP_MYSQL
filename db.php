<?php 

session_start();// Iniciamos sesion para poder guardar datos.

$conexion = mysqli_connect(
    'localhost', // Dominio
    'root',//usuario por defecto en Xampp
    '',
    'crud' //nombre bbdd
);

// if(isset($conexion)){
//     echo 'La conexión a la base de datos realizada con éxito';
// }

?>