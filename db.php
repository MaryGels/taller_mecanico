<?php
//datos de conexion con la base de datos: valores //
$servidor = 'localhost';
$usuario = 'root';
$password = '';
$database = 'taller_mecanico';
//Comprovacion de conexion  ///

    $conexion = new mysqli($servidor,$usuario,$password,$database);

    if ($conexion->connect_errno) {
       die("conexión fallida". $conexion->connect_errno); 
    }//en el caso de no conectar terminar aquí mostrando error

?>