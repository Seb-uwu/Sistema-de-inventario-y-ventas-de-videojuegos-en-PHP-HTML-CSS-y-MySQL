<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM ventas WHERE id_venta = ?;");
$resultado = $sentencia->execute([$id]);
if($resultado === TRUE){
	header("Location: ventas-cliente.php");
	exit;
}
else echo "Algo salió mal";
?>