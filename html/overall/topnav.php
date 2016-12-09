<header class="main-header">
   <div class="container">
      <div class="header-content">

         <nav class="site-nav">
           <a href="index.php">
              <img src="img/logo.png" width="100" height="100" /> </a>
           <form class="destinations-form">
               <div class="input-line">
                  <input type="text" name="destination" value="" class="form-input check-value" placeholder="Que producto deseas ?" />
                  <button type="button" name="destination-submit" class="form-submit btn btn-special "><span class="icon-search"></span> Buscar</button>
               </div>
            </form>
            <ul class="clean-list site-links ">
               <li><a href="Productos.html" class='btn btn-outlined' >Menu</a>
                <ul>
                        <br><br>
                        <li><a href="Productos.html">Productos</a>
                    <ul>
                        <li><a href="#">Audio</a> </li>
                        <li><a href="#">Accesorios</a> </li>
                        <li><a href="#">Cosas para el hogar</a> </li>
                        <li><a href="#">Cuidado personal</a> </li>
                        <li><a href="#">Perfumes</a> </li>
                        <li><a href="#">Relojes </a> </li>
                        <li><a href="#">Tegnologia </a> </li>
                        <li><a href="#">Videojuegos </a> </li>
                    </ul>
                 </li>
c
                    </ul>
               </li>
            </ul>
            <?php
            if (!(isset($_SESSION['app_id']))) {
              echo "<a href='javascript:openVentana();' id='sign' class='btn btn-outlined'><span class='icon-user'></span> Iniciar session</a>";
            }else {
              echo "<p> ". strtolower($users[$_SESSION['app_id']]['user'])."</p><a href='?view=logout' id='sign_out' class='btn btn-outlined'><span class='icon-user'></span> Sign out</a>";
            }
             ?>


         </nav>
      </div>
   </div>
   <?php
   if (isset($_GET['success'])) {
     echo '
     <div class="mbr-section__container container mbr-section__container--isolated">
     <div class="alert alert-dismissible alert-info">
       <strong>ACTIVADO</strong> tu usuario ha sido activado correctamente.
     </div></div>';
   }
    ?>
    <?php
    if (isset($_GET['error'])) {
      echo '
      <div class="mbr-section__container container mbr-section__container--isolated">
      <div class="alert alert-dismissible alert-danger">
        <strong>ERROR!!!</strong> no se ha podido activar tu usuario.
      </div></div>';
    }
     ?>
</header>
<div  id="ventana1" class="ventana1">
  <?php
if (!(isset($_SESSION['app_id']))) {
  include 'html/public/login.html';
 include 'html/public/reg.html';
 include 'html/public/lostpass.html';
}
 ?>
<!-- -->

</div>
