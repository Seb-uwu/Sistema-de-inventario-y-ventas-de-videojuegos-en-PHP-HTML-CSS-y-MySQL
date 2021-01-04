<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario</title>
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
        require_once 'models/usuarioModel.php';
        $v=new usuario();
        if (isset($_POST) and $_POST['grabar'] = 'si' and !empty($_POST['nom'])) 
        {   
            $v->editar_usuario();   
        }
        $fila=$v->listar_usuario_id();
    ?>
    <div id="tablita">
      <form name="form" action="" method="post">
          <table class="table display AllDataTables">
              <tr>
                  <th colspan="2">EDITAR USUARIO</th>
              </tr>
              <tr>
                  <td></td>
                  <td></td>     
                  
              </tr>
              <tr>
      <td>NOMBRE</td>
      <td><input type="text" name="nom" placeholder="Ingresar nombre"  value="<?php echo $fila[0]['nom_usuario'];?>"></td>
  </tr>
  <tr>
      <td>CORREO</td>
      <td><input type="text" name="cor" placeholder="Ingresar correo"  value="<?php echo $fila[0]['correo_usuario'];?>"></td>
  </tr>
  <tr>
      <td>PERFIL</td>
      <td><select name="idp">
      <option value="<?php echo $fila[0]['id_perfil'];?>"></option>
      <option value="1">Administrador</option>
      <option value="2">Empleado</option>
      <option value="3">Cliente</option>
      </select></td>
  </tr>
  <tr>
      <td>USUARIO</td>
      <td><input type="text" name="usu" placeholder="Ingresar usuario" value="<?php echo $fila[0]['usuario'];?>"></td>
  </tr>
  <tr>
      <td>CONTRASEÑA</td>
      <td><input type="text" name="con" placeholder="Ingresar contraseña" value="<?php echo $fila[0]['contraseña'];?>"></td>
  </tr>
              <tr>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td><a href="#" title="Guardar registro" onClick="document.form.submit();"><i class="fas fa-save"></i></a><input type="hidden" name="grabar" value="si"></td>
                  <td><a href="#" title="Regresar" onClick="window.location='usuario.php';"><i class="fas fa-arrow-left"></i></a></td>
              </tr>
          </table>
      </form>
  </div> 
</body>
</html>
