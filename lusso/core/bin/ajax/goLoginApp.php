<?php

  $db = new Conexion();
  $data = $db->real_escape_string($_POST['useri']);
  $pass = Encrypt($_POST['contraseña']);
  $sql = $db->query("SELECT * FROM users WHERE (email='$data' OR telefono='$data') AND pass='$pass' LIMIT 1;");
  $response=array();
  $response['success']=false;
  if($db->rows($sql) > 0) {
    while($d = $db->recorrer($sql)) {
      $response=array(
        'id' => $d['id'],
          'nombre' => $d['nombre'],
          'apellido' => $d['apellido'],
          'pass' => $d['pass'],
          'email' => $d['email'],
          'telefono' => $d['telefono'],
          'permisos' => $d['permisos'],
          'codigo_user' => $d['codigo_user'],
          'activo' => $d['activo'],
          'keyreg' => $d['keyreg'],
          'success'=>true
      );

    }
  }


  $db->liberar($sql);
  $db->close();
  echo json_encode($response);
?>
