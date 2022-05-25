

<?php 
//conexion con la base de datos TALLER_MECANICO
include 'db.php';

//Utilizar sesion
session_start();

//////no visualiza errores de php 
///¡¡¡¡¡IMPORTANTE SOLO ACTIVAR al terminar el PROYECTO !!!!!/////
error_reporting(0);
//conexion con la sesion abierta $id_cliente de vehiculos.php
$id_propietario = $id_cliente = $_SESSION['id_cliente'];
/// Proteger pagina de intrusos
if($id_cliente == null  || $id_cliente = ''){ ?>
  <h2 style="color:red ;" ><?php echo '¡¡¡ Usted no esta autorizado !!!'; ?></h2> 
  <?php
  die();//acaba aqui y no se ve nada mas que la alerta
 }
 $id_cliente=$_SESSION['id_cliente'];
 echo $id_propietario;

// $id_cliente=$_SESSION['id_cliente'];
      /******** Consulta en la que el id desde recogido en vehiculos.php 
          me muestre los datos sin repetir informacion de los servicios realizados
          para ello SELECT DISTINCT es muy util  ****** */

 $query = "SELECT solic.sol_vehiculo,veh.marca, veh.id_propietario, solic.sol_servicio, solic.sol_fecha, solic.sol_fecha_cita,solic.sol_hora_cita,
 mec.nom_mecanico, mec.cargo FROM solicitud_form AS solic, vehiculos AS veh, servicios AS serv, mecanicos AS mec
WHERE veh.matricula = solic.sol_vehiculo AND solic.sol_servicio = serv.nom_servicio
AND mec.id_mecanico = serv.id_encargado AND veh.id_propietario ='$id_cliente' order by solic.sol_fecha_cita desc " ;

//recojer los resultados en una array
$result = mysqli_query($conexion, $query);
//la variable que recoge los datos es $row 

//$row son todos los resultados



?>
<?php require "header.php"; ?>
<body>
    <nav class="navbar navbar-light bg-light">
        <form class="container-fluid justify-content-start">
            <!-- Texto de los botones con enlace a otras páginas   -->
            <button class="btn btn-outline-warning text-dark me-2" type="button"><a class="btn" href="home.php" >Mis datos</a></button>
            <button class="btn btn-outline-warning text-dark me-2" type="button"><a class="btn" href="vehiculos.php" >Mis vehículos</a></button>
            <button class="btn btn-outline-warning text-dark me-2" type="button"><a class="btn" href="servicios_real.php" >Servicios realizados</a></button>
            <button class="btn btn-outline-warning text-dark me-2" type="button"><a class="btn" href="solicitud_serv.php" >Solicitar Servicios</a></button>
            <button class="btn btn-outline-warning text-dark me-2" type="button"><a class="btn" name="Fin_sesion" href="cerrar_sesion.php">Cerrar sesion</a></button>
          
        </form>
    </nav>
    <div class="container-text text-center">
      <h2>Servicios Pendientes de Realizar</h2>
    </div>
    <div class="container">
    <table class="table table-striped">
  <thead>
    <tr>
        <!--cabeceras de tablas    -->
      <th scope="col">matrícula</th>
      <th scope="col">Marca</th>
      <th scope="col">Servicio solicitado</th>
      <th scope="col">Encargado del Servicio</th>
      <th scope="col">fecha de la solicitud</th>
      <th scope="col">fecha Cita</th>
      <th scope="col">Hora Cita</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <?php 
      //bucle para mostrar resultados en la tabla
      while ($row = mysqli_fetch_array($result)){
      
       ?>
        <!--   Datos del cliente logeado recogidos en la consulta de la linea 14 a la 19  -->
      <th scope="row"><?php echo $row['sol_vehiculo']; ?></th>
      <td><?php echo $row['marca']; ?></td>
      <td><?php echo $row['sol_servicio']; ?></td>
      <td><?php echo $row['nom_mecanico']. ' '.$row['cargo']; ?></td>
      <td><?php echo $row['sol_fecha']; ?></td>
      <td><?php echo $row['sol_fecha_cita']; ?></td>
      <td><?php echo $row['sol_hora_cita']; ?></td>
    </tr>
   <?php }//fin del WHILE ?>
  </tbody>
</table>
    </div>
    
<?php include"footer.php";

