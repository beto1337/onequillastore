<?php
/*	$conexion = @mysql_connect('localhost','root','1337') or die('No se encontró el servidor' .mysql_error());
	$db="onequilla";
	mysql_select_db($db)or die('No se encontró la base de datos');
*/
class Conexion extends mysqli {

  public function __construct() {

    parent::__construct(DB_HOST,'root','beto1337','onequilla');
    $this->connect_errno ? die('Error en la conexión a la base de datos') : null;

    $this->set_charset("utf8");
}

  public function rows($query) {
    return mysqli_num_rows($query);
  }

  public function liberar($query) {
    return mysqli_free_result($query);
  }

  public function recorrer($query) {
    return mysqli_fetch_array($query);
  }

}
?>
