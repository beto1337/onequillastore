<?php
include(HTML_DIR.'overall/header.php')
 ?>
   <body >
      <!-- Header -->
<?php include(HTML_DIR.'overall/topnav.php'); ?>
      <!-- Main Content -->

<main>
  <section id="banner">
    <img src="images/Banners_promociones.jpg" alt="">
    <div class="contenedor">
      <h2>pregunta por nuestras promociones del mes</h2>
      <p>Para este mes tenemos seguros con el 20% de descuento y bonos de gasolina desde hasta 30mil pesos, aprovecha, no dejes pasar estas ofertas</p>
      <a href="#">Leer mas.</a>
  </div>
  </section>

        <section id="productos">
            <div class="contenedor">
    <article >
      <img src="images/1.jpg" alt="">
      <h4>samsung galaxy s7 edge</h4>
    </article>
    <article >
      <img src="images/2.png" alt="">
      <h4>iphone 7s plus</h4>
    </article>
    <article >
      <img src="images/3.jpg" alt="">
      <h4>motorola moto Z</h4>
    </article>
  </div>

  </section>
  <?php
  if (!(isset($_SESSION['app_id']))) {

  }elseif ($users[$_SESSION['app_id']]['permisos']==2) {
    $a='"'.APP_URL.'insertar.php"';
    echo "<div>";
    echo "<form><input type='button' class='btn btn-special' onclick='location.href=". $a . "' value='presiona aqui si quieres guardar productos perro'></form>";
    echo "</div>";
  }
  ?>
</main>
<?php include(HTML_DIR.'overall/footer.php'); ?>

      <!-- Scripts -->
      <script src="http://code.jquery.com/jquery-latest.js"></script>
      <script src="views/app/js/menu.js"></script>
        <script type="text/javascript">
        </script>
   </body>
</html>
