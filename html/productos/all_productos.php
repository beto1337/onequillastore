<?php include(HTML_DIR.'overall/header.php') ?>
<body >
<?php include(HTML_DIR.'overall/topnav.php'); ?>
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
$a = $db2->query("SELECT ruta FROM productos WHERE id_producto='15';");

$data = $db2->recorrer($a);
$rutborrar=$data[0].'/';
$db2->liberar($a);
$db2->close();

if($db->rows($sql) > 0) {
  $HTML="";
    while($data = $db->recorrer($sql)) {
    $rutai=$data['ruta'];
    if ($aux= opendir($rutai)){
      while (($archivo = readdir($aux)) !== false){
        if ($archivo!="." && $archivo!=".."){
        $ruta_completa = $rutai . '/' . $archivo;
        break;}
      }
    }
$HTML .= '<article>
  <img src='.$ruta_completa.' alt="">
  <center><h4>'.$data['nombre'].'</4><br><h5>'.number_format($data['precio']).'</h5><br>
  <a class="btn" href="?view=productos&mode=edit&id='.$data['id_producto'].'">Editar</a></br>
  <button type="button" onclick="DeleteItem(\'¿Está seguro de eliminar esta categoría?\',\'?view=productos&mode=delete&id='.$data['id_producto'].'\')" >Eliminar</button></center>
  </article>';
  }
  }else {
    $HTML = '<div class="alert alert-dismissible alert-info"><strong>INFORMACIÓN: </strong> Todavía no existe ninguna categoría.</div>';
  }

echo $HTML;





?>

  </section>

</main>
<?php include(HTML_DIR.'overall/footer.php'); ?>
</body>
</html>
