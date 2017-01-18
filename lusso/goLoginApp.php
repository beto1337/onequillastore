<?php
require('core/core.php');
  $db = new Conexion();
  $data = $db->real_escape_string($_POST['dato']);
  //echo $data="3185219406";
  //echo $pass=Encrypt('beto1337');
  $pass = Encrypt($_POST['pass']);
  $sql = $db->query("SELECT * FROM users WHERE (email='$data' OR telefono='$data') AND pass='$pass' LIMIT 1;");
  $response=array();
  $response['success']=false;
  if($db->rows($sql) > 0) {
    while($d = $db->recorrer($sql)) {
      if ($d['activo']==1) {
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
            'success'=>true,
            'message'=>"se envio todo"
        );
      }else {
        $response['message']="Su cuenta no se encuentra activa, para activarla siga el link enviado a su correo";
      }
    }

  }
  else{
    $response['message']="El correo, telefono o la contraseña ingresados son erroneas";
  }


  $db->liberar($sql);
  $db->close();
  echo json_encode($response);
?>
