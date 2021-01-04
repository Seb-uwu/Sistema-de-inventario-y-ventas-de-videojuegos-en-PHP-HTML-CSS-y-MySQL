<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar perfiles</title>
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
  <form name="form" action="" method="post">
  <table class="table display AllDataTables">
  <tr>
      <td colspan="2">INGRESO DE PERFILES</td>
  </tr>
  <tr>
      <td></td>
      <td>
      <?php
        if(isset($_GET['m']) and $_GET['m']==1)
        {
            ?>
            <h3>Datos Guardados con exito!!</h3>
            <?php
        }
      ?>
      </td>
  </tr>
  <tr>
      <td>PERFIL</td>
      <td><input type="text" name="perfil" placeholder="Ingresar perfil"></td>
  </tr>
  <tr>
      <td></td>
      <td></td>
  </tr>
  <tr>
      <td><a href="#" title="Guardar Registro" onclick="document.form.submit();"><i class="fas fa-save"></i></a><input type="hidden" name="Save" value="si"></td>
      <td><a href="#" title="Regresar" onclick="window.location='perfiles.php';"><i class="fas fa-arrow-left"></i></a></td>
  </tr>
  <tr>
      <td></td>
      <td></td>
  </tr>
  <?php
  if(isset($_POST) and $_POST['Save']="si" and !empty($_POST['perfil']))
  {
      require_once 'models/perfilesModel.php';
      $v=new perfiles();
      $v->agregar_perfiles();
  }
  ?>
  </table>
  </form>
  </div>
</body>
</html>