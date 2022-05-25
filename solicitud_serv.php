<?php
include 'db.php';
//////no visualiza errores de php 
///¡¡¡¡¡IMPORTANTE SOLO ACTIVAR al terminar el PROYECTO !!!!!/////
error_reporting(0);

session_start();
/// Continuar con la sesion abierta de home.php
$id_cliente = $_SESSION['id_cliente'];
/// Proteger pagina contra intrusos
if ($id_cliente == null  || $id_cliente = '') {
?>
    <!-- ADVERTENCIA DE LA PAGINA SI SE INTENTA ABRIR DE FORMA INCORRECTA   -->
    <h2 style="color:red ;"><?php // echo 'Usted no esta autorizado'; 
                            ?></h2>
<?php
    die(); //acaba aqui y no se ve nada más de la pagina que la alerta
}
?>

<?php
//encavezado de la pagina ////
require 'header.php';
?>

<body>
    <nav class="navbar navbar-light bg-light">
        <form class="container-fluid justify-content-start">
            <!-- Texto de los botones con enlace a otras páginas   -->
            <button class="btn btn-outline-warning text-dark m-1" type="button"><a class="btn" href="home.php">Mis datos</a></button>
            <button class="btn btn-outline-warning text-dark m-1" type="button"><a class="btn" href="vehiculos.php">Mis vehículos</a></button>
            <button class="btn btn-outline-warning text-dark m-1" type="button"><a class="btn" href="servicios_real.php">Servicios realizados</a></button>
            <button class="btn btn-outline-warning text-dark me-2" type="button"><a class="btn" href="serv_pendientes.php">Servicios Pendientes</a></button>
            <button class="btn btn-outline-warning text-dark m-1" type="button"><a class="btn" name="Fin_sesion" href="cerrar_sesion.php">Cerrar sesion</a></button>

        </form>
    </nav>
    <!-- Formulario de login de bootstrap -->
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 " id="Solicitud_serv">
                <h2 class="text-center text-dark mt-2">Formulario </h2>
                <div class="text-center mb-2 text-dark">Solicitud de servicios </div>
                <div class="card my-8 col-12">

                    <form action="enviar_solicitud.php" method="post" class="card-body cardbody-color p-lg-3 needs-validation ">

                        <div class="text-center m-2">
                            <img src="img/login_motor1.png" width="100px" alt="Login" class="img-fluid">
                        </div>

                        <div class="row justify-content-evenly row-cols-1 row-cols-sm-2 row-cols-md-12">
                            <div class="form-group col-md3">
                                <div class="col-md-12">
                                    <!--Este formulario se enviará si estan los campos rellenos   -->
                                    <label for="nom_servicio" class="form-label text-dark">Listado de servicios: </label>

                                    <select id="nom_servicio" class="form-select" name="servicio" required>
                                        <!--la primera linea esta desavilitada solo para mostrar texto  -->
                                        <option selected disabled value="">Selecciona uno...</option>

                                        <option>Cambio de Aceite</option>
                                        <option>Disco de freno</option>
                                        <option>Pastillas de freno</option>
                                        <option>Neumáticos</option>
                                        <option>Escobillas</option>
                                        <option>Luces</option>
                                        <option>Correa de Distribución</option>
                                        <option>Auto-Diagnosis</option>
                                        <option>Amortiguadores y muelles</option>
                                        <option>Correa de Distribución</option>
                                        <option>Liquido Hidráulico</option>
                                        <option>Baterías</option>
                                        <option>Alternadores</option>
                                        <option>Motor de Arranque</option>
                                        <option>Bomba de Agua</option>
                                    </select>
                                    <div class="valid-feedback">Campo OK</div>
                                    <div class="invalid-feedback">Complete los datos</div>
                                </div>
                            </div>
                            <div class="form-group col-md3">
                                <div class="col-md-12">
                                    <!--Este formulario se enviará si estan los campos rellenos   -->
                                    <label for="inputState" class="form-label text-dark">Matricula del vehículo: </label>
                                    <select id="inputState" class="form-select" name="matricula" required>
                                        <!--la primera linea esta desavilitada solo para mostrar texto  -->
                                        <option selected disabled value="">Selecciona uno...</option>
                                        <!--   codigo php para mostrar resutados a traves de un array
                                    en el formulario -->
                                        <?php
                                        $id_cliente = $id_propietario = $_SESSION['id_propietario'];
                                        /******** Consulta en la que el id desde recogido en vehiculos.php 
                                            me muestre los datos sin repetir informacion de los servicios realizados
                                            para ello SELECT DISTINCT es muy util  ****** */
                                        $query  = "SELECT veh.id_vehiculo, veh.matricula, cli.email from vehiculos AS veh 
                                        INNER JOIN clientes AS cli ON cli.id_cliente = veh.id_propietario 
                                        AND veh.id_propietario = '$id_cliente'";

                                        //recojer los resultados en una array
                                        $result = mysqli_query($conexion, $query); //$result2 = mysqli_query($conexion,$query);

                                        //$row son todos los resultados
                                        while ($row = mysqli_fetch_array($result)) {

                                        ?>
                                            <option><?php echo $row['matricula'] ?></option>

                                        <?php }; ?>
                                    </select>
                                    <div class="valid-feedback">Campo OK</div>
                                    <div class="invalid-feedback">Complete los datos</div>
                                </div>
                            </div>

                            <div class="form-group col-md3">
                                <label for="inputEmail4 " class="form-label text-dark">Email: </label>
                                <input type="email" class="form-control" id="email" name="email" value="">
                                <div class="valid-feedback">Campo OK</div>
                                <div class="invalid-feedback">Complete los datos</div>

                            </div>

                            <div class="form-group col-md3">
                                <label class="form-label  text-dark" for="">Fecha de solicitud: </label>
                                <input type="datetime" class="form-control " id="date" name="fecha_actual" value="" placeholder="dd/mm/yyyy">
                                <?php echo "Ejemplo: " . date("d/m/Y"); ?>
                                <div class="valid-feedback">Campo OK</div>
                                <div class="invalid-feedback">Complete los datos</div>
                            </div>

                            <div class="form-group col-md3">
                                <label class="form-label " for="">Fecha para la Cita :</label>
                                <input type="datetime" class="form-control text-dark " id="date" name="fecha_cita" value="" placeholder="dd/mm/yyyy">
                                <?php echo "Ejemplo: " . date("d/m/Y"); ?>
                                <div class="valid-feedback">Campo OK</div>
                                <div class="invalid-feedback">Complete los datos</div>
                            </div>
                            <div class="form-group col-md3">
                                <label class="form-label text-dark" for="">Hora de la cita :</label>
                                <select type="time" id="hora" class="form-select" name="hora_cita" required>
                                    la primera linea esta desavilitada solo para mostrar texto
                                    <option selected disabled value="">Selecciona una hora...</option>
                                    <option>09:00am</option>
                                    <option>09:30am</option>
                                    <option>10:00am</option>
                                    <option>11:00am</option>
                                    <option>12:00am</option>
                                    <option>12:30am</option>
                                    <option>13:00pm</option>
                                    <option>17:00pm</option>
                                    <option>17:30pm</option>
                                    <option>18:00pm</option>

                                </select>
                                <div class="valid-feedback">Campo OK</div>
                                <div class="invalid-feedback">Complete los datos</div>
                            </div>
                            <div class="text-aling-center col-md-6 mt-4">

                                <button type="submit" id="submit_solicitud" class=" btn btn-color px-5 mb-3 w-100 " name='submit_solicitud'>Enviar Solicitud</button>
                                <h2 style="color: red ;"><?php $notacorreo;   ?></h2>

                            </div>

                        </div>
                    </form>
                    <!-- fin del formulario   -->
                </div>

            </div>
        </div>
    </div>

    <?php
    // si se pincha el boton submit_solicitud realiza estas comprovaciones

    //Validamos que los datos esten completos
    if (isset($_POST["servicio"], $_POST["matricula"], $_POST["email"], $_POST["fecha_actual"], $_POST["fecha_cita"], $_POST["hora_cita"])) {
        //// alerta  de errror
        if (!$_POST['submit_solicitud']) {
            echo 'error al insertar los datos';
        }
    } // FIN de comprobación de errores 
    ?>

    <!--- PIE DE PAGINA   --->
    <?php require "footer.php" ?>
    <script>
        // Funcion de JavaScript verificar el formulario por segunda vez
        (function() {
            'use strict'

            // esta funcion es de Bootstrap validation de los campos del Formulario 
            //y muestra mensaje de una segunda accion.
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        } else {
                            alert('Su solicitud de Cita se enviará al taller, en breve recivirá un mail Confirmando Fecha y hora. ')
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>

    </html>