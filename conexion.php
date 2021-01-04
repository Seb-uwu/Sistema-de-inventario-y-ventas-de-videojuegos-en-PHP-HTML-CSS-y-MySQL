<?php
$conexion= new mysqli("localhost","root","","venta_videojuegos");
if ($conexion) {
}
else{
    echo "Conexion Fallida";
}
?>