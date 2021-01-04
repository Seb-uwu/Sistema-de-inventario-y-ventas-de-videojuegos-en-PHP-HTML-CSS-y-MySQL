<?php
session_start();
class conectar
{
    public function conexion()
    {
        $con=new PDO('mysql:host=localhost;dbname=venta_videojuegos','root','');
        $con->query("SET NAMES 'utf8'");
        return $con;
    }
}
?>