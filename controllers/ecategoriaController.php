<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar categoria</title>
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
        require_once 'models/categoriaModel.php';
        $v=new categoria();
        if (isset($_POST) and $_POST['grabar'] = 'si' and !empty($_POST['cat'])) 
        {   
            $v->editar_categoria();   
        }
        $fila=$v->listar_categoria_id();
    ?>
    <div id="tablita">
      <form name="form" action="" method="post">
          <table class="table display AllDataTables">
              <tr>
                  <th colspan="2">EDITAR CATEGORIA</th>
              </tr>
              <tr>
                  <td></td>
                  <td></td>     
                  
              </tr>
              <tr>
                  <td>CATEGORIA</td>
                  <td><input type="text" name="cat" placeholder="Ingresar categoria" onFocus="poneralfinal(this.form.nom)" value="<?php echo $fila[0]['categoria'];?>"></td>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td><a href="#" title="Guardar registro" onClick="document.form.submit();"><i class="fas fa-save"></i></a><input type="hidden" name="grabar" value="si"></td>
                  <td><a href="#" title="Regresar" onClick="window.location='categoria.php';"><i class="fas fa-arrow-left"></i></a></td>
              </tr>
          </table>
      </form>
  </div> 
</body>
</html>
