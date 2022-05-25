
<?php 
include 'db.php';
//Utilizar sesion abierta de cliente
session_start();
//////no visualizar errores de php 
///¡¡¡¡¡¡¡IMPORTANTE !!!!!/////
error_reporting(0);
/// SOLO UTILIZAR AL FINAL 


$id_cliente=$_SESSION['id_cliente'];
/// Proteger pagina contra intrusos no logeados
if($id_cliente == null  || $id_cliente = ''){ ?>
 <h2 style="color:red ;" ><?php echo 'Usted no esta autorizado'; ?></h2>
 <?php
  die();//acaba aqui y no se ve nada mas que la alerta
}


//crear una variable de sesion para utilizar en la consulta
$id_cliente = $_SESSION['id_cliente'];
/******** Consulta en la que el id recogido en login_cliente.php 
    me muestre los datos completos del cliente ****** */

    $query= "SELECT * FROM clientes WHERE id_cliente = '$id_cliente'";

//recojer los resultados en una array
$result = mysqli_query($conexion, $query);
$row = mysqli_fetch_array($result);//$roww son todos los resultados


?>

<?php require "header.php"; ?>

<body>
    <nav class="navbar navbar-light bg-light">
        <form class="container-fluid justify-content-start">
            <!-- Texto de los botones con enlace a otras páginas   -->
            <button class="btn btn-outline-warning text-dark me-2" type="button"><a class="btn" href="vehiculos.php" >Mis vehículos</a></button>
            <button class="btn btn-outline-warning text-dark me-2" type="button"><a class="btn" href="servicios_real.php" >Servicios Realizados</a></button>
            <button class="btn btn-outline-warning text-dark me-2" type="button"><a class="btn" href="solicitud_serv.php" >Solicitar Servicios</a></button>
            <button class="btn btn-outline-warning text-dark me-2" type="button"><a class="btn" href="serv_pendientes.php" >Servicios Pendientes</a></button>
            <button class="btn btn-outline-warning text-dark me-2" type="button"><a class="btn" name="Fin_sesion" href="cerrar_sesion.php">Cerrar sesion</a></button>
           
        </form>
    </nav>
    <div class="container">
    <table class="table table-striped">
  <thead>
    <tr>
        <!--cabeceras de tablas    -->
      <th scope="col">Codigo cliente</th>
      <th scope="col">Nombre y apellidos</th>
      <th scope="col">Direccion</th>
      <th scope="col">DNI</th>
      <th scope="col">Telf. de contacto</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <!--   Datos del cliente logeado recogidos en la consulta de la linea 14 a la 19  -->
      <th scope="row"><?php echo $row['id_cliente']; ?></th>
      <td><?php echo $row['nombre'].' '.$row['apellidos']; ?></td>
      <td><?php echo $row['direccion']; ?></td>
      <td><?php echo $row['dni']; ?></td>
      <td><?php echo $row['telefono']; ?></td>
      <td><?php echo $row['email']; ?></td>
    </tr>
    
  </tbody>
</table>
    </div>
<?php include"footer.php";
