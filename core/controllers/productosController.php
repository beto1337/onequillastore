<?php

if(isset($_SESSION['app_id']) and $users[$_SESSION['app_id']]['permisos'] >= 2) {

  $isset_id = isset($_GET['id']) and is_numeric($_GET['id']) and $_GET['id'] >= 1;

  require('core/models/class.Productos.php');
  $productos = new Productos();

  switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
    case 'add':
      if($_POST) {
        $productos->Add();
      } else {
        include(HTML_DIR . 'productos/add_producto.php');
      }
    break;
    case 'edit':
      if($isset_id and array_key_exists($_GET['id'],$_categorias)) {
        if($_POST) {
          $productos->Edit();
        } else {
          include(HTML_DIR . 'productos/edit_productos.php');
        }
      } else {
        header('location: ?view=productos');
      }
    break;
    case 'delete':
      if($isset_id) {
        $productos->Delete();
      } else {
        header('location: ?view=productos');
      }
    break;
    default:
      $db = new Conexion();
      $sql = $db->query("SELECT * FROM productos;");
      include(HTML_DIR . 'productos/all_productos.php');
      $db->liberar($sql);
      $db->close();
    break;
  }
} else {
  header('location: ?view=index');
}

?>
