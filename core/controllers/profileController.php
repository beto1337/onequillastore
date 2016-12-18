<?php
if (!(isset($_SESSION['app_id']))) {
echo header ("location:".APP_URL."");
}else {
include('html/index/profile.php');
}

 ?>
