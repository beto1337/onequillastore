<?php
include(HTML_DIR.'overall/header.php')
 ?>
   <body class="home" id="page">
      <!-- Header -->
<?php include(HTML_DIR.'overall/topnav.php'); ?>
      <!-- Main Content -->


      <div class="content-box">
         <!-- Hero Section -->
            <div class="hero-box">

<?php
if (!(isset($_SESSION['app_id']))) {

}elseif ($users[$_SESSION['app_id']]['permisos']==2) {
  $a='"'.APP_URL.'insertar.php"';
  echo "<div>";
  echo "<form><input type='button' class='btn btn-special' onclick='location.href=". $a . "' value='presiona aqui si quieres guardar productos perro'></form>";
  echo "</div>";

}
?>
            </div>
      </div>


<?php include(HTML_DIR.'overall/footer.php'); ?>

      <!-- Scripts -->


   </body>
</html>
