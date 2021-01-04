<?php
    if (isset($_GET['m']) && $_GET['m'] == 1) {
    ?>
        <div class="mensaje vacio">
            <h4>Los Datos estan Vacios</h4>
        </div>
    <?php
    }
    if (isset($_GET['m']) && $_GET['m'] == 2) {
    ?>
    <div class="mensaje invalido">
    <h4>El Usuario o la Contraseña no son validos <strong>Intente Nuevamente</strong></h4>
    </div>
    <?php
    }
?>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
		$(".mensaje").fadeOut(1500);
    },3000);
}
);
</script>