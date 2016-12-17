<header>
  <div class="contenedor">
    <div class="logo">
      <img src="images/logo.png" width="50" height="50"  />
    </div>
    <div class="busqueda">
<form class="buscar">

<input type="text" class="inputtext" name="" value="" placeholder="que estas buscando ">

   <button class="btn-buscar" name=""><span class="icon-search"></span></button>
</form>
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
          <li>
          <?php
          if (!(isset($_SESSION['app_id']))) {
            echo "<a href='javascript:openVentana();' id='sign' ><span class='icon-user'></span>Iniciar session</a>";
          }else {
            echo "<a href='#' target='_self'>". strtolower($users[$_SESSION['app_id']]['user'])."</a><a href='?view=logout' id='sign_out' class='btn btn-outlined'><span class='icon-user'></span> Sign out</a>";
          }
           ?>
       </li>
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
