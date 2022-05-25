<?php 
include 'db.php';
//Utilizar sesion
session_start();
//////no visualiza errores de php 
///¡¡¡¡¡IMPORTANTE SOLO ACTIVAR al terminar el PROYECTO !!!!!/////
//error_reporting(0);
//conexion con la sesion $id_vehiculo de veiculos.php
$id_propietario=$_SESSION['id_propietario'];
/// Proteger pagina de intrusos
if($id_propietario == null  || $id_propietario = ''){ ?>
  <h2 style="color:red ;" ><?php echo '¡¡¡ Usted no esta autorizado !!!'; ?></h2>
  <?php
   die();//acaba aqui y no se ve nada mas que la alerta
 }
 $id_cliente = $id_propietario=$_SESSION['id_propietario'];
/******** Consulta en la que el id desde recogido en vehiculos.php 
    me muestre los datos sin repetir informacion de los servicios realizados
    para ello SELECT DISTINCT es muy util  ****** */

    $query  = "SELECT DISTINCT veh.id_vehiculo,veh.matricula,veh.marca,veh.modelo,
    veh.id_propietario ,realiz.id_servicio, realiz.fecha_realizacion, serv.nom_servicio, serv.id_encargado, mec.id_mecanico, mec.nom_mecanico, mec.cargo,
    realiz.fecha_realizacion FROM vehiculos AS veh, serv_realizados AS realiz, servicios AS serv, mecanicos AS mec
    WHERE veh.id_vehiculo = realiz.id_vehiculo AND realiz.id_servicio = serv.id_servicio
    AND serv.id_encargado = mec.id_mecanico AND veh.id_propietario ='$id_propietario' order by realiz.fecha_realizacion desc " ;

//recojer los resultados en una array
$result = mysqli_query($conexion, $query);
//la variable que recoge los datos es $row que se encuentras en la linea 51

?>
<?php require "header.php"; ?>
<body>
    <nav class="navbar navbar-light bg-light">
        <form class="container-fluid justify-content-start">
            <!-- Texto de los botones con enlace a otras páginas   -->
            <button class="btn btn-outline-warning text-dark me-2" type="button"><a class="btn" href="home.php" >Mis datos</a></button>
            <button class="btn btn-outline-warning text-dark me-2" type="button"><a class="btn" href="vehiculos.php" >Mis vehículos</a></button>
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
      <th scope="col">matrícula</th>
      <th scope="col">Marca</th>
      <th scope="col">Servicio Realizado</th>
      <th scope="col">Encargado del servicio</th>
      <th scope="col">fecha de Rep. o Revisión</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <?php 
      while ($row = mysqli_fetch_array($result)){
        //$row son todos los resultados

        $_SESSION['id_cliente'] = $row['id_propietario'];
        $_SESSION['id_vehiculo']= $row['id_vehiculo'];
        $_SESSION['id_servicio']= $row['id_servicio'];
       
        // la $_SESSION es el dato que utilizare en otra pagina si la necesito
       ?>
      
        <!--   Datos del cliente logeado recogidos en la consulta de la linea 14 a la 19  -->
      <th scope="row"><?php echo $row['matricula']; ?></th>
      <td><?php echo $row['marca']; ?></td>
      <td><?php echo $row['nom_servicio']; ?></td>
      <td><?php echo $row['nom_mecanico'].' '.$row['cargo']; ?></td>
      <td><?php echo $row['fecha_realizacion']; ?></td>
    </tr>
    <?php  } 
    //los resultados se encuentran ordenados por fecha más actual a la más antigua
    //fin del while ?>
  </tbody>
</table>
    </div>
    
<?php include"footer.php";

