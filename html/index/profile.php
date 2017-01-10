<?php
include(HTML_DIR.'overall/header.php')
 ?>
<body >
      <!-- Header -->
<?php include(HTML_DIR.'overall/topnav.php'); ?>
<main>
  <?php
  if (!(isset($_SESSION['app_id']))) {

  }elseif ($users[$_SESSION['app_id']]['permisos']==2) {

    echo "<div class='save'>";
    echo "<a class='btnsave' href='?view=productos&mode=add'>guardar productos</a>";
    echo "</div>";
  }
  ?>
  <table border ='1px'>
             <tr>
                <td>Id compra</td>
                <td>Compra</td>
                <td>Precio</td>
                <td>promociones ganadas</td>
                <td>promociones usadas</td>
                <td>disponibles</td>
            </tr>
            <tr>
                <td>1232</td>
                <td>xbox 360</td>
                <td>1300000</td>
                <td>10</td>
                <td>5</td>
                <td>5</td>
            </tr>
          </table>
</main>

<?php include(HTML_DIR.'overall/footer.php'); ?>

      <!-- Scripts -->
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="views/app/js/menu.js"></script>
<script type="text/javascript">
</script>
</body>
</html>
