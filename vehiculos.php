<?php
 include 'db.php';

//Utilizar sesion que ya esta abierta en home.php
session_start();
//////no visualiza errores de php 
///¡¡¡¡¡IMPORTANTE SOLO ACTIVAR al terminar el PROYECTO !!!!!/////
error_reporting(0);
//guardar la variable de sesion $id_cliente para comprovar permisos de cliente
$id_cliente=$_SESSION['id_cliente'];
/// Proteger pagina para intrusos
if($id_cliente == null  || $id_cliente = ''){ ?>
 <h2 style="color:red ;" ><?php echo 'Usted no esta autorizado'; ?></h2>
 <?php
  die();//acaba aqui si la variable no tiene informacion correcta
}

$id_cliente=$_SESSION['id_cliente'];

/******** Consulta en la que el id recogido en login_cliente.php 
    me muestre los datos completos del cliente ****** */ 
    $query  = "SELECT cli.id_cliente, cli.nombre, cli.apellidos,veh.id_vehiculo, veh.id_propietario,
    veh.matricula,veh.marca,veh.modelo, veh.antiguedad, veh.combustible from clientes AS cli INNER JOIN
    vehiculos AS veh ON cli.id_cliente = veh.id_propietario AND veh.id_propietario = '$id_cliente'";

//recojer los resultados en una array
$result = mysqli_query($conexion, $query);

?>

<?php
 require "header.php"; 
 ?>

<body>
    <nav class="navbar navbar-light bg-light">
        <form class="container-fluid justify-content-start">
            <!-- Texto de los botones con enlace a otras páginas   -->
            <button class="btn btn-outline-warning text-dark me-2" type="button"><a class="btn" href="home.php" >Mis datos</a></button>
            <button class="btn btn-outline-warning text-dark me-2" type="button"><a class="btn" href="servicios_real.php" >Servicios realizados</a></button>
            <button class="btn btn-outline-warning text-dark me-2" type="button"><a class="btn" href="serv_pendientes.php" >Servicios Pendientes</a></button>
            <button class="btn btn-outline-warning text-dark me-2" type="button"><a class="btn" href="solicitud_serv.php" >Solicitar Servicios</a></button>
            <button class="btn btn-outline-warning text-dark me-2" type="button"><a class="btn" name="Fin_sesion" href="cerrar_sesion.php">Cerrar sesion</a></button>
           
        </form>
    </nav>
    <div class="container">
    <table class="table table-striped">
      <h2>Tus vehículos</h2>
  <thead>
    <tr>
        <!--cabeceras de tablas    -->
        
      <th scope="col">Codigo vehículo</th>
      <th scope="col">matricula</th>
      <th scope="col">marca</th>
      <th scope="col">modelo</th>
      <th scope="col">combustible</th>
      <th scope="col">Año</th>
    </tr>
  </thead>
  <tbody>
  <?php  // la conexion y la consulta esta en la linea 22-27 de esta misma página
  while ($row = mysqli_fetch_array($result)){
  //$row son todos los resultados
  $_SESSION['id_propietario'] = $row['id_propietario'];
 ?>
    <tr>
        <!--  Mostrar Datos de la consulta recogidos  -->
      
      <th scope="row"><?php echo $row['id_vehiculo']; ?></th>
      <td><?php echo $row['matricula']; ?></td>
      <td><?php echo $row['marca']; ?></td>
      <td><?php echo $row['modelo']; ?></td>
      <td><?php echo $row['combustible']; ?></td>
      <td><?php echo $row['antiguedad']; ?></td>
    </tr>
<?php  } // FIN del While ?>

  </tbody>
</table>
    </div>
<?php include"footer.php";?>
