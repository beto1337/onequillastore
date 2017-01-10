<?php
include(HTML_DIR.'overall/header.php');
 include(HTML_DIR.'overall/topnav.php'); ?>
  <body>

    <main>
      <?php
if(isset($_GET['success'])) {
  echo '<div class="alert alert-dismissible alert-success">
    <strong>Compleato!</strong> el producto ha sido editado.
  </div>';
}

if(isset($_GET['error'])) {
  echo '<div class="alert alert-dismissible alert-danger">
    <strong>Error!</strong></strong> el nombre del producto no puede estar vacío.
  </div>';
}
?>
       <form  method="post" action="?view=productos&mode=editar" class="formulario" enctype="multipart/form-data" enctype="application/x-www-form-urlencoded">
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


?>

</body>
<?php include(HTML_DIR.'overall/footer.php');  ?>
