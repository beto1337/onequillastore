<?php include(HTML_DIR.'overall/header.php');?>
<body >
<?php include(HTML_DIR.'overall/topnav.php');?>
<main>
<section class="engine"> <a rel="nofollow" href="#"> <?php echo APP_TITTLE;  ?></a> </section>

<section>
  <div class="alert alert-dismissible alert-success">
    <strong>contraseña cambiada¡</strong> se ha generado una nueva constraseña <strong> <?php echo $password ?></strong>, prueba
    <a href='javascript:openVentana();' >Iniciar session</a> con ella.

  </div>
</section>
</main>
<?php include(HTML_DIR.'overall/footer.php');?>
</body>
</html>
