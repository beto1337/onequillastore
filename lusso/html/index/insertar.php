<?php
include(HTML_DIR.'overall/header.php');
 include(HTML_DIR.'overall/topnav.php'); ?>
  <body>
    <main>
       <form  method="post"  class="formulario" enctype="multipart/form-data">
        <table border="1px"> <!-- Lo cambiaremos por CSS -->
           <tr>
              <td><label>nombre del producto:</label></td>
              <td><input type="text" name ="nombre" id="nombre"></td>
          </tr>
          <tr>
              <td><label>precio:</label></td>
              <td><input type="number" name ="precio" id="precio"></td>
          </tr>
          <tr>
              <td><label>cantidad en stock:</label></td>
              <td><input type="number" name ="cantidad" id="cantidad" ></td>
          </tr>
          <tr>
              <td><label>descripcion:</label></td>
              <td><textarea name ="descripcion" id="descripcion"></textarea></td>
          </tr>
          <tr>
              <td><label>marca:</label></td>
              <td><input type="text" name ="marca" id="marca"></td>
          </tr>
          <tr>
              <td><label>Categoria:</label></td>
              <td><select name="categoria" id="categoria"><br />
                        <option>Audio</option>
                        <option>accesorio</option>
                        <option>para el hogar</option>
                        <option>Cuidado personal</option>
                        <option>Perfumes</option>
                        <option>Relojes</option>
                        <option>Tecnologia</option>
                        <option>Video juegos</option>
                        </select></td>
          </tr>
          <tr>
              <td><label>Cargar imagenes</label></td>
              <td> <input type="file" id="file" name="file[]" accept="image/*" multiple></td>
          </tr>
        </table>
        <input type="submit"></td>
         </form>
         </main>
<?php
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
            $db = new Conexion();
            $db->query("INSERT INTO productos (nombre,precio,cantidad,descripcion,marca,categoria,ruta) VALUES ('$nombre','$precio','$cantidad','$descripcion','$marca','$categoria','$direccioncarpeta'); ");
            $db->close();
            echo "<h3 style='color:blue'>se ha guardodo con exito</h1>";
          }
          else {
          $errors = "no ha seleccionado ningun archivo";
          echo "$errors";
            }
}
 include(HTML_DIR.'overall/footer.php'); ?>
</body>
