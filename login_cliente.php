<?php
include "header.php";
?>
<?php
//se llama a la base de datos archivo bd.php
require 'db.php';
//se inicia sesion de cliente 
//aqui abro por primera vez la sesion
session_start();

//////no visualiza errores de php 
///¡¡¡¡¡IMPORTANTE SOLO ACTIVAR al terminar el PROYECTO !!!!!/////
error_reporting(0);

?>

<body>
  <nav class="navbar navbar-light bg-light">
    <form class="container-fluid justify-content-start">
      <button class="btn btn-outline-warning me-2" type="button"><a class="btn" href="cerrar_sesion.php">inicio</a></button>
    </form>
  </nav>

    <!-- Formulario de login de bootstrap -->
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3 " id="login_cliente">
          <h2 class="text-center text-dark mt-5">Login Form</h2>
          <div class="text-center mb-5 text-dark">Acceso: Area de Clientes</div>
        
          <div class="card my-5">
<!--    Se envian a la pagina validar.php cuando los datos se hayan comprovado -->
            <form action="validar.php" method="post" class=" card-body cardbody-color p-lg-5 needs-validation" novalidate>

              <div class="text-center">
                <img src="img/login_motor1.png" width="100px" alt="Login">
              </div>

              <div class="mb-3"><!-- div de email del cliente registrado-->
              <label for="email">Email</label>
              <!-- requered se utiliza para marcar los campos requeridos  -->
              <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email" required>
              <!-- Estos div son los mensajes en el caso de estar llenos o no -->
              <div class="valid-feedback">Campo OK</div>
               <div class="invalid-feedback">Complete los datos</div>
              </div>
              <div class="mb-3"><!-- div de password que en este caso es el DNI con letra-->
              <label for="password">Password</label>
              <input type="password" class="form-control" id="passwd" name="password" placeholder="password" required>
              <!-- Estos div son los mensajes en el caso de estar llenos o no -->
              <div class="valid-feedback">Campo OK</div>
               <div class="invalid-feedback">Complete los datos</div>
            </div>
              <div class="text-center">

                <button type="submit" id="submit_login" class="btn btn-color px-5 mb-5 w-100" name='submit_login'>Login</button>
              <?php  echo $_SESSION['error'] ;   ?>
              </div>
    
            </form>
            <!-- fin del formulario   -->
          </div>

        </div>
      </div>
    </div>
    <?php require "footer.php" ?>
<script>
  // Esta funcion JavaScript verifica que no le falta ningun dato obligatorio al formulario
  //y es una de las ayudas de BOOTSTRAP
(function () {
  'use strict'

  // validation de formulario class =' needs-validation ' todos sus campos
  var forms = document.querySelectorAll('.needs-validation')

  // Solo lo verifica cuando se presiona el boton de enviar (Sudmit_login)
  //y crea una caja de contenido con mensaje para ratificar el envio de datos
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }else{ //este mensaje sale como aviso y para corroborar que quiere enviarlos.
          alert('Los datos se envian para validar si son correctos, si no lo son regresara a esta pagina')
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
    </html>