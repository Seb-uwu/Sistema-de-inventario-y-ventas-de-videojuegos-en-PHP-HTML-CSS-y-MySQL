<?php
    if (isset($_GET['m']) && $_GET['m'] == 1) {
    ?>
        <div class="mensaje vacio">
            <h4>Campo(s) Vacios</h4>
        </div>
    <?php
    }
    if (isset($_GET['m']) && $_GET['m'] == 2) {
    ?>
    <div class="mensaje invalido">
    <h4>Correo no válido</h4>
    </div>
    <?php
    }
    if (isset($_GET['m']) && $_GET['m'] == 3) {
        ?>
        <div class="mensajee correcto">
        <h4>Registrado correctamente</strong></h4>
        </div>
        <?php
        }
?>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
		$(".mensaje").fadeOut(1500);
        $(".mensajee").fadeOut(1500);
    },3000);
}
);
</script>