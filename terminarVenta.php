<?php
if (($_POST["total"])<=0) {
	header("Location: vender.php?status=6");
}
else {
	require_once('vender.php');
	if(!isset($_POST["total"])) exit;
	$idc= $_SESSION['session_id_user'];
	$total = $_POST["total"];
	$cantidad= $producto->cantidad;
	$cod= $producto->codigo;
	include_once "base_de_datos.php";
	$ahora = date("Y-m-d H:i:s");
	$sentencia = $base_de_datos->prepare("INSERT INTO ventas(codigo, id_cliente, cantidad, fecha, total_venta) VALUES (?, ?, ?, ?, ?);");
	$sentencia->execute([$cod, $idc, $cantidad, $ahora, $total]);

	$sentencia = $base_de_datos->prepare("SELECT id_venta FROM ventas ORDER BY id_venta DESC LIMIT 1;");
	$sentencia->execute();
	$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

	$idVenta = $resultado === false ? 1 : $resultado->id_venta;

	$base_de_datos->beginTransaction();
	$sentencia = $base_de_datos->prepare("INSERT INTO videojuegos_vendidos(id_videojuego, id_venta, cantidad) VALUES (?, ?, ?);");
	$sentenciaExistencia = $base_de_datos->prepare("UPDATE videojuegos SET stock = stock - ? WHERE id_videojuego = ?;");
	foreach ($_SESSION["carrito"] as $producto) {
		$total += $producto->total;
		$sentencia->execute([$producto->id_videojuego, $idVenta, $producto->cantidad]);
		$sentenciaExistencia->execute([$producto->cantidad, $producto->id_videojuego]);
	}
	$base_de_datos->commit();
	unset($_SESSION["carrito"]);
	$_SESSION["carrito"] = [];
	header("Location: vender.php?status=1");
}

?>
