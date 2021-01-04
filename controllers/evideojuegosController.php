<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar videojuegos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTablesbootstrap.min.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/Aiconos.css">
    <link rel="stylesheet" href="style.css">
    <script src="js/cursor.js"></script>
</head>
<body onload="document.form.nom.focus();">
    <?php
        require_once 'cabecera.php';
        require_once 'models/videojuegosModel.php';
        $v=new videojuegos();
        if (isset($_POST) and $_POST['grabar'] = 'si' and !empty($_POST['nom'])) 
        {   
            $v->editar_videojuegos();   
        }
        $fila=$v->listar_videojuegos_id();
    ?>
    <div id="tablita">
      <form enctype="multipart/form-data" name="form" action="" method="post">
          <table class="table display AllDataTables">
              <tr>
                  <th colspan="2">EDITAR VIDEOJUEGO</th>
              </tr>
              <tr>
                  <td></td>
                  <td></td>     
                  
              </tr>
              <tr>
      <td>CODIGO</td>
      <td><input type="text" name="cod" placeholder="Ingresar codigo" value="<?php echo $fila[0]['codigo'];?>"></td>
  </tr>
              <tr>
      <td>VIDEOJUEGO</td>
      <td><input type="text" name="nom" placeholder="Ingresar videojuego" value="<?php echo $fila[0]['nom_game'];?>"></td>
  </tr>
  <tr>
      <td>DESCRIPCIÓN</td>
      <td><input class="text" type="text" name="des" placeholder="Ingresar descripcion"  value="<?php echo $fila[0]['des_game'];?>"></td>
  </tr>
  <tr>
      <td>CATEGORIA</td>
      <td><select name="cat" id="">
      <option value="<?php echo $fila[0]['cat_game'];?>"><?php echo $fila[0]['cat_game'];?></option>
      <option value="RPG">RPG</option>
      <option value="Shooter">Shooter</option>
      <option value="Aventura">Aventura</option>
      <option value="Rogue Like">Rogue Like</option>
      </select></td>
      <!-- <td><input type="text" name="cat" placeholder="Ingresar descripcion"  value="?php echo $fila[0]['cat_game'];?>"></td> -->
  </tr>
  <tr>
      <td>STOCK</td>
      <td><input type="text" name="sto" placeholder="Ingresar stock"  value="<?php echo $fila[0]['stock'];?>"></td>
  </tr>
  <tr>
      <td>PRECIO</td>
      <td><input type="text" name="pre" placeholder="Ingresar precio"  value="<?php echo $fila[0]['precio_game'];?>"></td>
  </tr>
  <tr>
      <td>CREADOR O DESARROLLADORA</td>
      <td><input type="text" name="cre" placeholder="Ingresar creador"  value="<?php echo $fila[0]['creador_game'];?>"></td>
  </tr>
  <tr>
      <td>IMAGEN DE PORTADA</td>
      <td><img class="img-vid" src="<?php echo $fila[0]['img_game'];?>" alt=""></td>
      <td><input enctype="multipart/form-data" type="file" name="img"?></td>
  </tr>
              <tr>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td><a href="#" title="Guardar registro" onClick="document.form.submit();"><i class="fas fa-save"></i></a><input type="hidden" name="grabar" value="si"></td>
                  <td><a href="#" title="Regresar" onClick="window.location='videojuegos.php';"><i class="fas fa-arrow-left"></i></a></td>
              </tr>
          </table>
      </form>
  </div> 
</body>
</html>
