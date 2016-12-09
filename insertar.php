<?php
require('core/core.php');
if ((isset($_SESSION['app_id']))) {
if ($users[$_SESSION['app_id']]['permisos']==2) {
  if(isset($_GET['view'])) {
    if(file_exists('core/controllers/' . strtolower($_GET['view']) . 'Controller.php')) {
      include('core/controllers/' . strtolower($_GET['view']) . 'Controller.php');
    } else {
      include('core/controllers/errorController.php');
    }
  } else {
    include('core/controllers/insertarController.php');
  }
}
}

else {
echo header ("location:".APP_URL."");


 ?>
