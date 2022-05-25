<!--  Conexion con la cabecera de la pagina en el archivo header.php  -->
<?php include 'header.php';?>

<!--  Comienzo del contenedor principal del body -->
<div class="container"> <!-- Letrero del taller -->
      <div class="text-center d-block w-100" > 
          <!--Imagen taller  -->
<img class= "figure-img img-fluid p-lg-5"src="img/taller_mecanico.png" width= "40%" height= "40%" alt="imagen del rotulo del taller">
 </div><!-- FIN del Letrero del taller -->

 <!--linea de botones de menu NAV -->
    <nav class="navbar navbar-light bg-light">
        <form class="container-fluid justify-content-start">
           
            <button class="btn btn-outline-warning me-2" type="button"><a class="btn" href="login_cliente.php">
            Login Clientes</a></button>   
        </form>
    </nav>
    <!--- Fin del NAV -->

    <!-- contenedor del titulo -->
   <div class="col-md-6 offset-md-3">
    <h1 class="text-center text-dark mt-5">Asi somos...</h1>
  </div>

   <!--Comienzo del contenedor del texto -->
  <div class='container' type='text'>
    <div class="texto"type='text'>
    <h2>Mucho esfuerzo y ganas</h2>
    <p>Taller Mecanico es una joven pero experimentada empresa que centra sus esfuerzos en ofrecer a sus clientes un completo servicio de reparación y acondicionamiento de vehículos.</p>

    <p>Otra de nuestras aficiones es la reparación de todo tipo de coches clasicos, ofrecemos el mismo servicio y atención que cualquier otro vehiculo, incluso lo mimamos un poquito mas ya que por sus años necesitan una atención diferente.</p>

    <p>Cuenta con personal altamente cualificado y con años de experiencia en el sector de la automoción. Somos un equipo competente y eficaz, con amplios conocimientos técnicos. Le ofrecemos una amplia gama de productos a unos precios muy competitivos y de la máxima calidad respaldados por un equipo que se caracteriza por su trato cordial y espíritu de servicio.</p>

    <p>Nos encantará mostrarle todas las posibilidades y opciones a su disposición; estamos convencidos de que encontrará lo que está buscando.</p>

    <p>La meta principal de Taller Mecanico es, sin lugar a dudas, poder satisfacer a todas las necesidades de nuestros clientes. Nuestros puntos fuertes son : una dilatada experiencia y un extraordinario concepto de atención al cliente.</p>
    <p>En Taller podemos ofrecerte el servicio que necesites. Nuestra amplia experiencia nos permite darte una solución a cualquier problema o intervención que necesites en tu automóvil.</p>

  </div>
  <div class="container container2">
    <h3>Listado de servicios</h3>
    <div class="row align-items-start">
      <div class="col">
        <table class="table align-center">
          <thead>
            <tr>
              <!--cabecera de tabla    -->
              <th scope="col">Mecanica Rápida</th>
            </tr>
          </thead><!--  Datos --->
          <tbody>

            <tr>
              <td>Cambio de aceite</td>
            </tr>
            <tr>
              <td>Cambio de filtros</td>
            </tr>
            <tr>
              <td>Escobillas</td>
            </tr>
            <tr>
              <td>Luces</td>
            </tr>
            <tr>
              <td>Neumáticos</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col">
        <table class="table align-middle">
          <thead>
            <tr>
              <!--  datos de tabla  -->
              <th>Revisiones</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Auto-Diagnostico</td>
            </tr>
            <tr>
              <td>Liquido de frenos</td>
            </tr>
            <tr>
              <td>Liquido de radiador</td>
            </tr>
            <tr>
              <td>Liquido del limpiaparabrisas</td>
            </tr>
            <tr>
              <td>Liquido hidraulico</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col">
        <table class="table align-middle">
          <thead>
            <tr>
              <!-- cabecera de tabla    -->
              <th scope="col">Reparaciones y sustituciones</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <!-- Datos del cliente logeado recogidos en la consulta de la linea 14 a la 19  -->
              <td>Discos de frenos</td>
            </tr>
            <tr>
              <td>Pastillas de frenos</td>
            </tr>
            <tr>
              <td>Correa de Distribuición</td>
            </tr>
            <tr>
              <td>Motor de arranque</td>
            </tr>
            <tr>
              <td>Amortiguadores y muelles</td>
            </tr>

          </tbody>
        </table>
      </div>
      </div>
  </div>
      <P>
        Mecánica especifica como Electromecánica y un largo etc...
      </P>
    
  </div>
<!-- Incluir el pie de pagina footer.php -->
<?php include 'footer.php';?>