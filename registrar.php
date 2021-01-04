<?php
if (!empty($_POST)) {
    require('config.php');
    require_once 'models/registroModel.php';
    $r = new registro_model();
    $r->registro();
    $r->buscarepetido();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Regístrate</title>
    <link rel="icon" href="favicon.ico" />
    <link rel="stylesheet" href="alertifyjs/css/alertify.css">
    <link rel="stylesheet" href="alertifyjs/css/themes/default.css">
    <link rel="stylesheet" href="css/registro.css"/>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="alertifyjs/alertify.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  </head>
  <body>
    <div>
      <div class="content">
      </div>
        <div class="login-box"> 
            <form name="form" id="cuadro-login" method="post" action="registrar.php">
                <div class="avatar">
                    <img src="img/avatarregis.png" width="120"alt="">
                </div>
                <p>Regístrate en "Gamer-ez"</p>
                <!-- NOMBRE -->
                <div class="textbox">
                    <i class="fas fa-smile"></i>
                    <input name="nom" type="text" requiere="" class="inputstyle" maxlength="50" placeholder="Ingrese su nombre" />
                </div>
                <!-- CORREO -->
                <div class="textbox">
                    <i class="fas fa-envelope"></i>
                    <input name="correo" type="text" requiere="" class="inputstyle" maxlength="50" placeholder="Ingrese su correo" />
                </div>
                <!-- USUARIO -->
                <div class="textbox">
                    <i class="fas fa-user"></i>
                    <input name="usu" type="text" requiere="" class="inputstyle" maxlength="50" placeholder="Ingrese su usuario" />
                </div>
                <!-- CONTRASEÑA -->
                <div class="textbox">
                    <i class="fas fa-lock"></i>
                    <input name="pass" type="password" requiere="" class="inputstyle" id="password"  value="" maxlength="50"  placeholder="Ingrese su contraseña" />
                </div>
                <button type="button" class="btn" onClick="document.form.submit();">Registrar</button>
                <button type="button" class="btn" onclick="location.href='index.php'">Atrás</button>
                <div>          
                </div>
                <?php
                    require_once ("estadoregis.php");
                  ?>
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