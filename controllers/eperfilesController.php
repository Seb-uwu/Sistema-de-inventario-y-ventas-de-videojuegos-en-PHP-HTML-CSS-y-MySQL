<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar perfil</title>
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
        require_once 'models/perfilesModel.php';
        $v=new perfiles();
        if (isset($_POST) and $_POST['grabar'] = 'si' and !empty($_POST['perfil'])) 
        {   
            $v->editar_perfiles();   
        }
        $fila=$v->listar_perfiles_id();
    ?>
    <div id="tablita">
      <form name="form" action="" method="post">
          <table class="table display AllDataTables">
              <tr>
                  <th colspan="2">EDITAR PERFILES</th>
              </tr>
              <tr>
                  <td></td>
                  <td></td>     
                  
              </tr>
              <tr>
                  <td>PERFIL</td>
                  <td><input type="text" name="perfil" placeholder="Ingresar perfil" onFocus="poneralfinal(this.form.nom)" value="<?php echo $fila[0]['perfil'];?>"></td>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td><a href="#" title="Guardar registro" onClick="document.form.submit();"><i class="fas fa-save"></i></a><input type="hidden" name="grabar" value="si"></td>
                  <td><a href="#" title="Regresar" onClick="window.location='perfiles.php';"><i class="fas fa-arrow-left"></i></a></td>
              </tr>
          </table>
      </form>
  </div> 
</body>
</html>
