
<?php 
include 'db.php';
//Utilizar sesion abierta
session_start();

//comprovacion de la sesion 
$id_propietario=$_SESSION['id_propietario'];

/// Proteger pagina de intrusos
if($id_propietario == null  || $id_propietario = ''){ ?>
  <h2 style="color:red ;" ><?php echo '¡¡¡ Usted no esta autorizado !!!'; ?></h2>
  <?php
   die();//acaba aqui y no se ve nada mas que la alerta
 }
 
 $id_propietario=$_SESSION['id_propietario'];
/******** Consulta en la que el id desde recogido en vehiculos.php 
    me muestre los datos sin repetir informacion de los servicios realizados
    para ello SELECT DISTINCT es muy util  ****** */
 
    // si se pincha el boton submit_solicitud
    if (isset($_POST['submit_solicitud'])) {
        // declarar variable 
        $servicio = $_POST['servicio'];
        $vehiculo = $_POST['matricula'];
        $email = $_POST['email'];
        $fecha_sol = $_POST['fecha_actual'];
        $fecha_cita = $_POST['fecha_cita'];
        $hora_cita = $_POST['hora_cita'];

       

// Tratar la variable de fecha para insertarla correctamente en la base de datos
$f = explode('/', $fecha_sol);
$f2 = explode('/', $fecha_cita);
//recoger el resultado para introducirlo en el insert into correctamente
$fechasol = $f[2]."-".$f[1]."-".$f[0];
$fechacita = $f2[2]."-".$f2[1]."-".$f2[0];

// insercion de datos en la BD del taller_mecanico
$insert_datos = "INSERT INTO solicitud_form (id_sol, sol_servicio, sol_vehiculo, sol_email, sol_fecha, sol_fecha_cita, sol_hora_cita) 
VALUES (0,'$servicio','$vehiculo','$email','$fechasol','$fechacita','$hora_cita') ";

$ejecutar_insertar = mysqli_query($conexion, $insert_datos);

///comprovacion de la insercion y realizacion de insercion 2
if ($ejecutar_insertar = true){
//regresar a la magina de solicitud
header("location:solicitud_serv.php");
}
  //// alerta  de errror
    if (!$ejecutar_insertar){
        echo 'error al insertar los datos';
    }
}  
 
?>