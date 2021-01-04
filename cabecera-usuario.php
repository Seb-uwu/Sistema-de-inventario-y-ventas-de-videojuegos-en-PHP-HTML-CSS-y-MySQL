<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos-menu.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/titulo.css">
    <title>GAMER EZ</title> 
</head> 
<body>
<div class="titulo-usuario">
    <div class="info-usuario">
        <?php 
        require_once 'models/accesoclienteModel.php'; 
        require_once ("tipocliente.php");
        ?>     
    </div>
        <?php
        require_once ("verificar.php");
        ?>
</div>
</body>
</html>