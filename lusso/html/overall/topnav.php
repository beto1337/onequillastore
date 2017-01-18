<header>
  <div class="contenedor">
    <div class="logo">
    <a href="?view=index" target="_self"><img src="views/images/logop.png" width="45px" height="45px"  /></a>
    </div>
  

    <input type="checkbox" id="btn-menu" >
    <label for="btn-menu" class="icon-menu"></label>
    <nav class="menu">
      <ul>
    <li class="submenu"><a href="#" target="_self" >Productos <span class="icon-down-open"></span></a>
      <ul class="children">
      <li><a href="#" target="_self">Todos</a> </li>
      <li><a href="#" target="_self">Audio</a> </li>
      <li><a href="#" target="_self">Accesorios</a> </li>
      <li><a href="#" target="_self">Cosas para el hogar</a> </li>
      <li><a href="#" target="_self">Cuidado personal</a> </li>
      <li><a href="#" target="_self">Perfumes</a> </li>
      <li><a href="#" target="_self">Relojes </a> </li>
      <li><a href="#" target="_self">Tegnologia </a> </li>
      <li><a href="#" target="_self">Videojuegos </a> </li>

        </ul>
      </li>
         <li class="submenu">
           <a href="#" target="_self">Menu <span class="icon-down-open"></span></a>
        <ul class="children">
          <li><a href="#" target="_self">Sobre nosotros</a> </li>
          <li><a href="#" target="_self">Promociones</a> </li>
          <li><a href="#" target="_self">Blog</a> </li>
          <li><a href="#" target="_self">Contactanos</a> </li>
        </ul>
          </li>

          <?php
          if (!(isset($_SESSION['app_id']))) {
            echo "<li><a href='javascript:openVentana();' id='sign' ><span class='icon-user'></span>Iniciar session</a></li>";
          }else {
            echo "<li><a href='?view=Profile' target='_self'>". strtolower($users[$_SESSION['app_id']]['user'])."</a></li><li><a href='?view=logout' target='_self' id='sign_out'><span class='icon-user'></span> Sign out</a></li>";
          }
           ?>
      </ul>
    </nav>
  </div>
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
