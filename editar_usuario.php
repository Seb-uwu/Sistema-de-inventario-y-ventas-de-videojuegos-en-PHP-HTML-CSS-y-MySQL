<?php

require_once 'config.php';
if(isset($_SESSION['session_user']) and isset($_SESSION['session_perfil']) and !empty($_SESSION['session_user']) and !empty($_SESSION['session_perfil'])) {
    require_once 'controllers/eusuarioController.php';
} else {
    echo "<script>
            alert('Usted debe loguearse para ingresar al sistema');
            window.location='index.php';
            </script>";
}
