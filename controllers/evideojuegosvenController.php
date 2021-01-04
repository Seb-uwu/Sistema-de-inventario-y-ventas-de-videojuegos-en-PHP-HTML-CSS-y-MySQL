<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar ventas de videojuegos</title>
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
        require_once 'models/videojuegosvenModel.php';
        $v=new videojuegosven();
        if (isset($_POST) and $_POST['grabar'] = 'si' and !empty($_POST['idv'])) 
        {   
            $v->editar_videojuegosven();   
        }
        $fila=$v->listar_videojuegosven_id();
    ?>
    <div id="tablita">
      <form name="form" action="" method="post">
          <table class="table display AllDataTables">
              <tr>
                  <th colspan="2">EDITAR VIDEOJUEGOS VENDIDOS</th>
              </tr>
              <tr>
                  <td></td>
                  <td></td>     
                  
              </tr>
              <tr>
                  <td>VENTA ID</td>
                  <td><input type="text" name="idv" placeholder="Ingresar id venta" onFocus="poneralfinal(this.form.nom)" value="<?php echo $fila[0]['id_venta'];?>"></td>
              </tr>
              <tr>
                  <td>CANTIDAD</td>
                  <td><input type="text" name="can" placeholder="Ingresar cantidad" onFocus="poneralfinal(this.form.nom)" value="<?php echo $fila[0]['cantidad'];?>"></td>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td><a href="#" title="Guardar registro" onClick="document.form.submit();"><i class="fas fa-save"></i></a><input type="hidden" name="grabar" value="si"></td>
                  <td><a href="#" title="Regresar" onClick="window.location='videojuegosven.php';"><i class="fas fa-arrow-left"></i></a></td>
              </tr>
          </table>
      </form>
  </div> 
</body>
</html>
