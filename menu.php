<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <?php
    if($_SESSION['session_perfil']==1)
    {
    ?>
        <ul class="menu">
            <li>
                <a href="videojuegos.php">
                <div class="icon">
                    <i class="fas fa-gamepad"></i>
                </div>
                <div class="name">Videojuegos</div>
                </a>
            </li>
            <li>
                <a href="videojuegosven.php">
                <div class="icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <div class="name">Videojuegos vendidos</div>
                </a>
            </li>
            <li>
                <a href="categoria.php">
                <div class="icon">
                    <i class="fas fa-list-ul"></i>
                </div>
                <div class="name">Categoria videojuegos</div>
                </a>
            </li>
            <li>
                <a href="ventas.php">
                <div class="icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <div class="name">Ventas</div>
                </a>
            </li>
            <li>
                <a href="usuario.php">
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="name">Usuarios</div>
                </a>
            </li>
            <li>
                <a href="perfiles.php">
                <div class="icon">
                    <i class="fas fa-id-card"></i>
                </div>
                <div class="name">Perfiles</div>
                </a>
            </li>
            <li>
                <a href="javascript:(void);" onClick="window.location='salir.php?s=1';">
                <div class="icon">
                    <i class="fas fa-sign-out-alt"></i>
                </div>
                <div class="name">Salir</div>
                </a>
            </li>
        </ul>
    <?php
    }
    if($_SESSION['session_perfil']==2)
    {
        ?>
        <ul class="menu">
            <li>
                <a href="videojuegos.php">
                <div class="icon">
                    <i class="fas fa-gamepad"></i>
                </div>
                <div class="name">Videojuegos</div>
                </a>
            </li>
            <li>
                <a href="videojuegosven.php">
                <div class="icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <div class="name">Videojuegos vendidos</div>
                </a>
            </li>
            <li>
                <a href="categoria.php">
                <div class="icon">
                    <i class="fas fa-list-ul"></i>
                </div>
                <div class="name">Categoria videojuegos</div>
                </a>
            </li>
            <li>
                <a href="ventas.php">
                <div class="icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <div class="name">Ventas</div>
                </a>
            </li>
            <li>
                <a href="javascript:(void);" onClick="window.location='salir.php?s=1';">
                <div class="icon">
                    <i class="fas fa-sign-out-alt"></i>
                </div>
                <div class="name">Salir</div>
                </a>
            </li>
        </ul>
        <?php
    }
    if($_SESSION['session_perfil']==3)
    {
        ?>
        
        <ul class="menu">
        <li>
            <a href="videojuegoscatalogo.php">
            <div class="icon">
                <i class="fas fa-gamepad"></i>
            </div>
            <div class="name">Catalogo</div>
            </a>
        </li>
        <li>
            <a href="videojuegosven.php">
            <div class="icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <div class="name">Carrito de compras</div>
            </a>
        </li>
        <li>
                <a href="javascript:(void);" onClick="window.location='salir.php?s=1';">
                <div class="icon">
                    <i class="fas fa-sign-out-alt"></i>
                </div>
                <div class="name">Salir</div>
                </a>
            </li>
    </ul>   
    <?php
        }
        ?>
</body>
</html>