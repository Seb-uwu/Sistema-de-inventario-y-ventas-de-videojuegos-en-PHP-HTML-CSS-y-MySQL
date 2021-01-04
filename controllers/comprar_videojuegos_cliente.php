<?php
include_once "./cabecera-usuario.php";
?>
<?php 
if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;
?>

<div class="container">
<!-- STATUS AL VENDER -->
	<?php
			if(isset($_GET["status"])){
				if($_GET["status"] === "1"){
					?>
						<div class="alert alert-success">
							<strong>¡Correcto!</strong> Videojuego agregado al carrito exitosamente
						</div>
					<?php
				}else if($_GET["status"] === "4"){
					?>
					<div class="alert alert-danger">
							<strong>Venta cancelada</strong> El videojuego/stock no existe
						</div>
					<?php
				}else if($_GET["status"] === "5"){
					?>
					<div class="alert alert-danger">
							<strong>Venta cancelada</strong> El videojuego/stock no existe
						</div>
						<?php
				}
			}
						?>
    <h1 class="titulo-principal">Videojuegos <i class="fas fa-gamepad"></i></h1>
	<div class="row">
		<?php
			include("./conexion.php");
			$query = "SELECT * FROM videojuegos";
			$resultado = $conexion->query($query);
			while ($row = $resultado->fetch_assoc()){  
		?>

		<div class="col-3">
			<div class="card">
			<img title="" alt="Título" class="card-img-top" height="370px" src="<?php echo $row['img_game'];?>"/>
				<div class="card-body">
					<p class="producto">Nombre de Videojuego:</p>
					<h4 class="card-title"><?php echo $row['nom_game'];?></h4>
					<p class="precio">Descripción:</p>
					<p class="card-des"><?php echo $row['des_game'];?></p>
					<p class="precio">Categoria:</p>
					<p class="card-text"><?php echo $row['cat_game'];?></p>
					<p class="precio">Precio:</p>
					<p class="card-text">S/. <?php echo $row['precio_game'];?></p>
					<a class="btn btn-primary" href="agregarAlCarrito.php?codigo=<?php echo $row['codigo'];?>">Anadir al Carrito<i class="fa fa-shopping-cart"></i></a>
				</div>
			</div>
		</div>
		<?php
        	}
        ?>
	</div>
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
</body>
</html>