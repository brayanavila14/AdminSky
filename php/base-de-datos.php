<?php 
$conexion = mysqli_connect("localhost", "root", "", "sistema_caja");

if ($conexion) {
    echo '<div style="display: none;">Conectado</div>';
}else {
    echo '<div>desconectado</div>';
}
?>
