
<?php
//conexion base de datos
include 'db.php';
session_start();

//recoger los datos en variables
$email = $_POST['email'];
//strtoupper es para que la letra del DNI = password siempre se coloque en mayusculas
$password= strtoupper($_POST['password']);

$consulta="SELECT * FROM clientes WHERE email = '$email' AND dni = '$password'";

//$conexion viene de db.php

//recojer los resultados en una array
$result = mysqli_query($conexion, $consulta);
$row = mysqli_fetch_array($result);//$roww son todos los resultados

$error="";
//preguntar y ver si la respuesta se coresponde con la consulta de la linea 10 
if($row['email']== $email && $row['dni'] ==$password){

    $_SESSION["id_cliente"] = $row["id_cliente"];
    //redireccionar si es ok a la pagina home.php que es el area de cliente
   header("location: home.php");
   
}else{
  $_SESSION['error']=$error= "El email o el password no son correctos";
  
        die( 
  
          header("location: login_cliente.php")
        
        );//termina aqui tu evaluación   
}


?>