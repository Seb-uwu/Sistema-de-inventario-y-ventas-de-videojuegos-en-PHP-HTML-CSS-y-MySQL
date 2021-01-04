<?php 
require_once("config.php");
include_once "cabecera-usuario.php";
if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;
?>
<link rel="stylesheet" href="css/tablasventas.css">
	<div class="col-xs-12">
		<h1 class="titulo-opciones">Carrito de Compras <i class="fa fa-shopping-cart"></i></h1>
		<?php
			if(isset($_GET["status"])){
				if($_GET["status"] === "1"){
					?>
						<div class="alert alert-success">
							<strong>¡Correcto!</strong> Venta realizada correctamente
						</div>
					<?php
				}else if($_GET["status"] === "2"){
					?>
					<div class="alert alert-info">
							<strong>Venta cancelada</strong>
						</div>
					<?php
				}else if($_GET["status"] === "3"){
					?>
					<div class="alert alert-info">
							<strong>Hecho:</strong> Producto quitado de la lista
						</div>
					<?php
				}else if($_GET["status"] === "4"){
					?>
					<div class="alert alert-warning">
							<strong>Error:</strong> El producto que buscas no existe
						</div>
					<?php
				}else if($_GET["status"] === "5"){
					?>
					<div class="alert alert-danger">
							<strong>Error: </strong>El producto está agotado
						</div>
					<?php
					}else if($_GET["status"] === "6"){
						?>
						<div class="alert alert-danger">
								<strong>Error: </strong>No hay productos en el carrito
							</div>
						<?php
				}else{
					?>
					<div class="alert alert-danger">
							<strong>Error:</strong> Algo salió mal mientras se realizaba la venta
						</div>
					<?php
				}
			}
		?>
		<br>
		<br><br>
		<table class="tablaventas">
			<thead>
				<tr>
					<th>ID cliente</th>
					<th>ID</th>
					<th>Videojuego</th>
					<th>Precio de venta</th>
					<th>Cantidad</th>
					<th>Total</th>
					<th>Quitar</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				include_once "base_de_datos.php";
				include("./conexion.php");
				$query = "SELECT FROM usuarios WHERE id_usuario = ?;";
				$resultado = $conexion->query($query);

				foreach($_SESSION["carrito"] as $indice => $producto){ 
						$granTotal += $producto->total;
					?>
				<tr>
					<td><?php echo $_SESSION['session_id_user']?></td>
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->nom_game ?></td>
					<td><?php echo $producto->precio_game ?></td>
					<td><?php echo $producto->cantidad ?></td>
					<td><?php echo $producto->total ?></td>
					<td><a class="btn btn-danger" href="<?php echo "quitarDelCarrito.php?indice=" . $indice?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<h3 class="total">Total: S/. <?php echo $granTotal; ?></h3>
		<form class="formterminar" action="./terminarVenta.php" method="POST">
			<input name="total" type="hidden" value="<?php echo $granTotal;?>">
			<button type="submit" class="btn btn-success">Terminar venta</button>
			<a href="./cancelarVenta.php" class="btn btn-danger">Cancelar venta</a>
		</form>
	</div>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
		$(".alert").fadeOut(1500);
    },3000);
}
);
</script>