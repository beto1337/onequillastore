<?php

if (!isset($_SESSION['app_id']) and isset($_GET['key'])){

 $db= new conexion();
  $keypass=$db->real_escape_string($_GET['key']);
  $sql = $db->query("SELECT id,newpass FROM users WHERE keypass='$keypass' LIMIT 1;");
  $newpass="losqsea";
   if ($db->rows($sql)>0) {
 $data=$db->recorrer($sql);
 $id_user=$data[0];
 $newpass = Encrypt($data[1]);
 $password=$data[1];
 $db->query("UPDATE users SET keypass='', newpass='', pass='$newpass' WHERE id='$id_user' ;");
 include('html/lostpass_mensaje.php');

  }else {
  header ('location: ?view=index');
}
  $db->liberar($sql);
  $db->close();

}else {
  header ('location: ?view=index');
}
  ?>
