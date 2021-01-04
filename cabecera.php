<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header class="headertop">
        <img class="logotop"src="img/logogamesez.png" alt="">
        <h2 class="titulogamer">Sistema de videojuegos: "Gamer-Ez"</h2>
        <?php
        require_once 'models/accesoModel.php';
        $obj = new acceso_model();
        $fila = $obj->consulta_id();
        ?>
        <h3 class="titulousuario">Usuario: <?php echo $_SESSION['session_user'].' - '.$fila[0]['perfil']; ?> </h3>
        <?php
        require_once 'menu.php';
        ?>
    </header>
    
</body>
</html>