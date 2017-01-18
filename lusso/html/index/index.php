<?php
include(HTML_DIR.'overall/header.php')
 ?>
   <body >
      <!-- Header -->
<?php include(HTML_DIR.'overall/topnav.php'); ?>
      <!-- Main Content -->

<main>
  <section id="banner">
    <img src="views/images/Banners_promociones.jpg" alt="">
    <div class="contenedor">
      <?php if(isset($_GET['success'])){
          echo '<div class="Informacion">

                  <div class="alert alert-success alert-dismissable fade in">
              <button href="#" target="_self" class="close" data-dismiss="alert" >X</button>
                  <strong>Información</strong> Tu cuenta ha sido activada</a>
                </div>

          </div>';
        }

        if(isset($_GET['error'])){
            echo '<div class="Informacion">

                    <div class="alert alert-danger alert-dismissable fade in">
                <button href="#" target="_self" class="close" data-dismiss="alert" >X</button>
                    <strong>Información</strong> No se encontro la cuenta que intenta activar
                  </div>

            </div>';
        }
       ?>
      <h2>pregunta por nuestras promociones del mes</h2>
      <p>Para este mes tenemos seguros con el 20% de descuento y bonos de gasolina desde hasta 30mil pesos, aprovecha, no dejes pasar estas ofertas</p>
      <a href="?view=index" target="_self">Leer mas.</a>
  </div>
  </section>

  <section id="productos">
      <div class="contenedor">
<?php
$ruta="views/images/productos/CAROLINA_HERRERA_212_SEXY_MEN_100ML";
if ($aux= opendir($ruta)){
  while (($archivo = readdir($aux)) !== false)
              {
                  if ($archivo!="." && $archivo!="..")
                  {
                      $ruta_completa = $ruta . '/' . $archivo;
                      break;
                  }
}}
echo "<article><img src='".$ruta_completa."' alt=''><h4>samsung galaxy s7 edge</h4></article>";
?>
    <article >
      <img src="views/images/1.jpg" alt="">
      <h4>samsung galaxy s7 edge</h4>
    </article>
    <article >
      <img src="views/images/2.png" alt="">
      <h4>iphone 7s plus</h4>
    </article>
    <article >
      <img src="views/images/3.jpg" alt="">
      <h4>motorola moto Z</h4>
    </article>
  </div>

  </section>

</main>
<?php include(HTML_DIR.'overall/footer.php'); ?>

      <!-- Scripts -->

   </body>
</html>
