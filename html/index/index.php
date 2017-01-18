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
      <h2>pregunta por nuestras promociones del mes</h2>
      <p>Para este mes tenemos seguros con el 20% de descuento y bonos de gasolina desde hasta 30mil pesos, aprovecha, no dejes pasar estas ofertas</p>
      <a href="?view=index" target="_self">Leer mas.</a>
  </div>
  </section>

  <section id="productos">
      <div class="contenedor">
        <?php
        $db2 = new Conexion();
        $a = $db2->query("SELECT * FROM productos ;");

        $data = $db2->recorrer($a);

        if($db2->rows($a) > 0) {
          $HTML="";
            while($data = $db2->recorrer($a)) {
            $rutai=$data['ruta'];
            if ($aux= opendir($rutai)){
              while (($archivo = readdir($aux)) !== false){
                if ($archivo!="." && $archivo!=".."){
                $ruta_completa = $rutai . '/' . $archivo;
                break;}
              }
            }
        $HTML .= '<article>
          <img src='.$ruta_completa.' alt="" >
          <center><h4>'.$data['nombre'].'</4><br><h5>'.number_format($data['precio']).'</h5>
          </center>
          </article>';
          }
          }else {
            $HTML = '<div class="alert alert-dismissible alert-info"><strong>INFORMACIÓN: </strong> Todavía no existe ninguna categoría.</div>';
          }

        echo $HTML;
        $db2->liberar($a);
        $db2->close();

        ?>
  </div>

  </section>

</main>
<?php include(HTML_DIR.'overall/footer.php'); ?>

      <!-- Scripts -->

   </body>
</html>
