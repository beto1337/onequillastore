<?php
if (!(isset($_SESSION['app_id']))) {
echo header ("location:".APP_URL."");
}elseif ($users[$_SESSION['app_id']]['permisos']==2){
include('html/index/insertar.php');
}else {
  echo header ("location:".APP_URL."");
}
?>
