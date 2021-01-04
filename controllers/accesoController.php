<?php
if (!empty($_POST)) {
    require_once 'models/accesoclienteModel.php';
    $a = new acceso_cliente_model();
    $a->logueo();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="css/login.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  </head>
  <body>
    <div>
      <div class="content">
      </div>
        <div class="login-box"> 
            <form name="form" id="cuadro-login" method="post" action="index.php">
                <div class="avatar">
                    <img src="img/avatar.png" width="120"alt="">
                </div>
                <p>Inicio de Sesión "Gamer-ez"</p>
                <div class="textbox">
                    <i class="fas fa-user"></i>
                    <input name="login" type="text" requiere="" class="inputstyle" maxlength="50" placeholder="Ingrese su usuario" />
                </div>
                <div class="textbox">
                    <i class="fas fa-lock"></i>
                    <input name="pass" type="password" requiere="" class="inputstyle" id="password"  value="" maxlength="50"  placeholder="Ingrese su contraseña" />
                </div>         
                <div class="registrar">
                <i class="fas fa-user-plus"></i>
                <a class="regislb" href="registrar.php">Regístrese</a>
                </div>
                <button  type="button" class="btn" onclick="mostrarContrasena()"><i class="fa fa-eye"></i>  Ver Contraseña</button>
                <button type="button" class="btn" onClick="document.form.submit();"> Iniciar Sesión</button>
                <div class="cambio-usuario">
                <a href="controllers/accesoadminController.php">Cómo administrador <i class="fas fa-users-cog"></i></a>
                </div>
                <div>
                  <?php
                    require_once ("estado.php");
                  ?>
                </div>
                </div>
            </form>
        </div>  
    </body>
</div>   
</html>
<script>
  function mostrarContrasena() {
    var tipo = document.getElementById("password");
    if (tipo.type == "password") {
      tipo.type = "text";
    } else {
      tipo.type = "password";
    }
  }
</script>