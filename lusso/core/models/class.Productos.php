<?php

class Productos {

  private $db;
  private $id;
  private $nombre;

  public function __construct() {
    $this->db = new Conexion();
  }

  private function Errors($url) {
    try {
      if(empty($_POST['nombre'])) {
        throw new Exception(1);
      } else {
        $this->nombre = $this->db->real_escape_string($_POST['nombre']);
        $nombredireccion=str_replace(" ", "_", $this->nombre);
        $this->precio=$this->db->real_escape_string($_POST['precio']);
        $this->cantidad=$this->db->real_escape_string($_POST['cantidad']);
        $this->descripcion=$this->db->real_escape_string($_POST['descripcion']);
        $this->marca=$this->db->real_escape_string($_POST['marca']);
        $this->categoria=$this->db->real_escape_string($_POST['categoria']);
        $this->direccioncarpeta='views/images/productos/'.$nombredireccion;
        $limite_kb = 200;
      }
    } catch(Exception $error) {
      header('location: '.$url .$error->getMessage());
      exit;
    }
  }

  public function Add() {
    $this->Errors('?view=Productos&mode=add&error=');
    if($_POST) //si se ha presionado enviar
    {
            $nombre=$_POST['nombre'];
            $nombredireccion=str_replace(" ", "_", $nombre);
            $precio=$_POST['precio'];
            $cantidad=$_POST['cantidad'];
            $descripcion=$_POST['descripcion'];
            $marca=$_POST['marca'];
            $categoria=$_POST['categoria'];
            $direccioncarpeta='views/images/productos/'.$nombredireccion;
            $errors = '';
            $resultado = 0;
            $limite_kb = 200;

              if ( isset($_FILES["file"])) {
                for ($i=0; $i <count($_FILES["file"]["name"]) ; $i++) {
                    if($_FILES['file']['size'][$i] <= $limite_kb * 1024) {

                      if(!(file_exists ($direccioncarpeta))){
                      mkdir($direccioncarpeta,0755);
                      chmod($direccioncarpeta, 0755);
                      }
                      $nombrei=$_FILES["file"]["name"][$i];
                      $ruta_provisional=$_FILES["file"]["tmp_name"][$i];
                      $src=$direccioncarpeta."/".$nombrei;
                      move_uploaded_file($ruta_provisional, $src);
                    }
                    else
                    {
                      $mo=$_FILES['file']['size'];
                    $errors = "<h1 style='color:red'>El archivo seleccionado exede el peso permitido</h1>";
                    echo "$errors";
                    var_dump($mo);
                    }
                }
                echo "<h3 style='color:blue'>se ha guardodo con exito</h1>";
              }
              else {
              $errors = "no ha seleccionado ningun archivo";
              echo "$errors";
                }
    }
    $nombredireccion=str_replace(" ", "_",$this->nombre);
    $direccioncarpeta='views/images/productos/'.$nombredireccion;
    $this->db->query("INSERT INTO productos (nombre,precio,cantidad,descripcion,marca,categoria,ruta) VALUES ('$this->nombre','$this->precio','$this->cantidad','$this->descripcion','$this->marca','$this->categoria','$direccioncarpeta');");
    header('location: ?view=productos&mode=add&success=true');
  }

  public function Edit() {
    $this->id = intval($_GET['id']);
    $this->Errors('?view=productos&mode=add&id='.$this->id.'&error=');
    $this->db->query("UPDATE productos SET nombre='$this->nombre' WHERE id='$this->id';");
    header('location: ?view=productos&mode=edit&id='.$this->id.'&success=true');
  }


  public function Delete() {
    function eliminarDir($carpeta)
    {
        foreach(glob($carpeta . "/*") as $archivos_carpeta)
        {

            if (is_dir($archivos_carpeta))
            {
                eliminarDir($archivos_carpeta);
            }
            else
            {
                unlink($archivos_carpeta);
            }
        }

        rmdir($carpeta);
    }
    $this->id = intval($_GET['id']);
    $db2 = new Conexion();
    $a = $db2->query("SELECT ruta FROM productos WHERE id_producto='$this->id';");

    $data = $db2->recorrer($a);
    echo $rutborrar=$data[0].'/';

    $db2->liberar($a);
    $db2->close();
    eliminarDir($rutborrar);
    $q = "DELETE FROM productos WHERE id_producto='$this->id';";
    $this->db->query($q);
    rmdir($rutborrar);
    header('location: ?view=productos');
  }

  public function __destruct() {
    $this->db->close();
  }

}
?>
