<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar videojuegos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTablesbootstrap.min.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/Aiconos.css">
    <link rel="stylesheet" href="style.css">
</head>
<body onLoad="document.form.nom.focus()";>
  <?php
  require_once 'cabecera.php';
 
  ?>
  <div id="tablita">
  <form enctype="multipart/form-data"  name="form" action="" method="post">
  <table class="table display AllDataTables">
  <tr>
      <td colspan="2">INGRESAR VIDEOJUEGOS</td>
  </tr>
  <tr>
      <td></td>
      <td>
      <?php
        if(isset($_GET['m']) and $_GET['m']==1)
        {
            ?>
            <h3>Datos Guardados correctamente</h3>
            <?php
        }
      ?>
      </td>
  </tr>
  <tr>
      <td>CODIGO</td>
      <td><input type="text" name="cod" placeholder="Ingresar código"></td>
  </tr>
  <tr>
      <td>VIDEOJUEGO</td>
      <td><input type="text" name="nom" placeholder="Ingresar nombre"></td>
  </tr>
  <tr>
      <td>DESCRIPCIÓN</td>
      <td><input type="text" name="des" placeholder="Ingresar descripción"></td>
  </tr>
  <tr>
      <td>CATEGORIA</td>
      <td><select name="cat" id="">
      <option value="RPG">RPG</option>
      <option value="SHOOTER">SHOOTER</option>
      <option value="AVENTURA">AVENTURA</option>
      <option value="ROGUE LIKE">ROGUE LIKE</option>
      </select></td>
      <!-- <td><input type="text" name="cat" placeholder="Ingresar descripcion"  value="?php echo $fila[0]['cat_game'];?>"></td> -->
  </tr>
  <tr>
      <td>STOCK</td>
      <td><input type="text" name="sto" placeholder="Ingresar stock"></td>
  </tr>
  <tr>
      <td>PRECIO</td>
      <td><input type="text" name="pre" placeholder="Ingresar precio"></td>
  </tr>
  <tr>
      <td>CREADOR O DESARROLLADORA</td>
      <td><input type="text" name="cre" placeholder="Ingresar creador"></td>
  </tr>
  <tr>
      <td>IMAGEN PORTADA</td>
      <td><input enctype="multipart/form-data" type="file" name="img" accept=".jpg , .png , .gif"></td>
  </tr>
  <tr>
      <td></td>
      <td></td>
  </tr>
  <tr>
      <td><a href="#" title="Guardar videojuego" onclick="document.form.submit();"><i class="fas fa-save"></i></a><input type="hidden" name="Save" value="si"></td>
      <td><a href="#" title="Regresar" onclick="window.location='videojuegos.php';"><i class="fas fa-arrow-left"></i></a></td>
  </tr>
  <tr>
      <td></td>
      <td></td>
  </tr>
  <?php
  if(isset($_POST) and $_POST['Save']="si" and !empty($_POST['nom']))
  {
      require_once 'models/videojuegosModel.php';
      $c=new videojuegos();
      $c->agregar_videojuegos();
  }
  ?>
  </table>
  </form>
  </div>
</body>
</html>