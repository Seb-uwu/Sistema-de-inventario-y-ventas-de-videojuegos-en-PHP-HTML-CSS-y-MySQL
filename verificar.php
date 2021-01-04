<?php
    include_once "agregarAlCarrito.php";
    if(!isset($_SESSION["id_videojuego"])) $_SESSION["id_videojuego"] = [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--<link rel="stylesheet" href="css/estilo.css">-->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
  <body>
    <nav>
        <div class="logo">
            <div class="titulo">
                <img class="logotipo" src="img/logogamesez.png"> 
            </div>
        </div>
        <input type="checkbox" id="click">
        <label for="click" class="menu-btn"><i class="fas fa-bars"></i></label>
        <ul>
        <?php
            
            if($_SESSION['session_perfil']==3)
            {
                ?>
				<li><a href="Comprar-videojuegos.php">Comprar Videojuegos <i class="fas fa-gamepad"></i></a></li>
				<li><a href="vender.php">Ver Carrito<i class="fa fa-shopping-cart"> </i>(<?php 
				echo (empty($_SESSION["carrito"]))?0:count($_SESSION["carrito"]);?>)</a></li>
				<li><a href="ventas-cliente.php">Compras Realizadas  <i class="fas fa-shopping-bag"></i></a></li>	
                <li><a href="javascript:(void);" onClick="window.location='salir.php?s=1';">Salir <i class="fas fa-sign-out-alt"></i></a></li>
            <?php
            }
            ?>       
        </ul>
    </nav>
</body>
</html>
