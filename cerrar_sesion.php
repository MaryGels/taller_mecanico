<?php
//cerrar sesion
session_start();

//////no visualizar errores de php //
/// activado al final del proyecto ///
error_reporting(0);

/// destruye todas las sesiones abiertas hasta ese momento
session_destroy();
// y te redirecciona a la pagina Inicial index.php
header("location:index.php");
?>
