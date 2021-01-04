<?php 
require_once("config.php");
include_once "cabecera-usuario.php" 
?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT ventas.total_venta, ventas.fecha, ventas.id_venta, GROUP_CONCAT(	videojuegos.codigo, '..',  videojuegos.nom_game, '..', videojuegos_vendidos.cantidad SEPARATOR '__') AS videojuegos FROM ventas INNER JOIN videojuegos_vendidos ON videojuegos_vendidos.id_venta = ventas.id_venta INNER JOIN videojuegos ON videojuegos.id_videojuego = videojuegos_vendidos.id_videojuego GROUP BY ventas.id_venta ORDER BY ventas.id_venta;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<link rel="stylesheet" href="css/tablasventas.css">
	<div class="col-xs-12"></div>
		<h1 class="titulo-opciones">Compras Realizadas <i class="fas fa-shopping-bag"></i></h1>
		<div class="divtbn">
			<!-- <a class="btnsuccess" href="Comprar-videojuegos.php">Realizar Nueva Compra <i class="fa fa-plus"></i></a> -->
		</div>
		<br>
		<table class="tablaventas">
			<thead>
				<tr>
					<th>Nº venta</th>
					<th>Fecha</th>
					<th>Productos vendidos</th>
					<th>Total</th>
					<!-- <th>Eliminar</th> -->
				</tr>
			</thead>
			<tbody>
				<?php foreach($ventas as $venta){ ?>
				<tr>
					<td><?php echo $venta->id_venta ?></td>
					<td><?php echo $venta->fecha ?></td>
					<td>
						<table class="tablaventas">
							<thead>
								<tr>
									<th>Código</th>
									<th>Nombre</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $venta->videojuegos) as $productosConcatenados){ 
								$videojuego = explode("..", $productosConcatenados)
								?>
								<tr>
									<td><?php echo $videojuego[0] ?></td>
									<td><?php echo $videojuego[1] ?></td>
									<td><?php echo $videojuego[2] ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
					<td><?php echo $venta->total_venta?></td>
					<!-- <td><a class="btn btn-danger" href="<?php echo "eliminarVenta-cliente.php?id=" . $venta->id_venta?>"><i class="fa fa-trash"></i></a></td> -->
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
</html>