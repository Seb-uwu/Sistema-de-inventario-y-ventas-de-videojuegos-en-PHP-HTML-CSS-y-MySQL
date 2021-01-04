<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTablesbootstrap.min.css">
    <link rel="stylesheet" href="css/tabla.css">
    <link rel="stylesheet" href="css/iconos.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require_once 'cabecera.php';
    ?>
    <div id="tablita">
    <table class="table display AllDataTables">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE DE USUARIO</th>
                <th>CORREO</th>
                <th>ID PERFIL</th>
                <th>USUARIO</th>
                <th>CONTRASEÑA</th>  
                <th></th>
                <th><a href="#" title="Agregar Registros" onclick=window.location='agregar_usuario.php'><i class="fas fa-plus-square">Agregar</i></a></th>
            </tr>
        </thead>
        <tbody>
        <?php
            require_once 'models/usuarioModel.php';
            $c=new usuario();
            $fila=$c->listar_usuario();
            require_once 'views/usuarioView.phtml';
        ?>
        </tbody>
    </table>
    <script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script>
		$(document).ready( function () {
		    $('.AllDataTables').DataTable({
		    	language: {
		    		"sProcessing":     "Procesando...",
				    "sLengthMenu":     "Mostrar _MENU_ registros",
				    "sZeroRecords":    "No se encontraron resultados",
				    "sEmptyTable":     "Ningún dato disponible en esta tabla",
				    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
				    "sInfoPostFix":    "",
				    "sSearch":         "Buscar: ",
				    "sUrl":            "",
				    "sInfoThousands":  ",",
				    "sLoadingRecords": "Cargando...",
				    "oPaginate": {
				        "sFirst":    "Primero",
				        "sLast":     "Último",
				        "sNext":     "Siguiente",
				        "sPrevious": "Anterior"
				    },
				    "oAria": {
				        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
				    }
		    	}
		    });
		} );
    </script>
    </div>
</body>
</html>