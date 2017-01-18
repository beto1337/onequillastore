<?php

function Productos() {
  $db = new Conexion();
  $sql = $db->query("SELECT * FROM productos;");
  if($db->rows($sql) > 0) {
    while($data = $db->recorrer($sql)) {
      $categorias[$data['id']] = array(
        'id' => $data['id_producto'],
        'nombre' => $data['nombre']
      );
    }
  } else {
    $productos = false;
  }
  $db->liberar($sql);
  $db->close();

  return $categorias;
}

?>
