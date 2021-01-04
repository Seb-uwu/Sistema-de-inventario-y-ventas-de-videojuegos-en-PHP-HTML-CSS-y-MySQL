<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar usuarios</title>
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
      <td colspan="2">INGRESO DE USUARIOS</td>
  </tr>
  <tr>
      <td></td>
      <td>
      <?php
        if(isset($_GET['m']) and $_GET['m']==1)
        {
            ?>
            <h3>Datos guardados correctamente</h3>
            <?php
        }
      ?>
      </td>
  </tr>
  <tr>
      <td>NOMBRE</td>
      <td><input type="text" name="nom" placeholder="Ingresar nombre"></td>
  </tr>
  <tr>
      <td>CORREO</td>
      <td><input type="text" name="cor" placeholder="Ingresar correo"></td>
  </tr>
  <tr>
      <td>PERFIL</td>
      <td><select name="idp">
      <option value=" "></option>
      <option value="1">Administrador</option>
      <option value="2">Empleado</option>
      <option value="3">Cliente</option>
      </select></td>
  </tr>
  <tr>
      <td>USUARIO</td>
      <td><input type="text" name="usu" placeholder="Ingresar usuario"></td>
  </tr>
  <tr>
      <td>CONTRASEÑA</td>
      <td><input type="text" name="con" placeholder="Ingresar contraseña"></td>
  </tr>
  <tr>
      <td></td>
      <td></td>
  </tr>
  <tr>
      <td><a href="#" title="Guardar Registro" onclick="document.form.submit();"><i class="fas fa-save"></i></a><input type="hidden" name="Save" value="si"></td>
      <td><a href="#" title="Regresar" onclick="window.location='usuario.php';"><i class="fas fa-arrow-left"></i></a></td>
  </tr>
  <tr>
      <td></td>
      <td></td>
  </tr>
  <?php
  if(isset($_POST) and $_POST['Save']="si" and !empty($_POST['usu']))
  {
      require_once 'models/usuarioModel.php';
      $c=new usuario();
      $c->agregar_usuario();
  }
  ?>
  </table>
  </form>
  </div>
</body>
</html>