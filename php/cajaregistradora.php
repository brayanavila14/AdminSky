<?php
include("base-de-datos.php");

if (empty($name) || empty($precio) || empty($cantidad)) {
    echo '<h3 class="mensaje-error">¡No has ingresado todos los campos!</h3>';
    exit;
} else {
    
    while (isset($_POST['agregar'])) {
    $nombre = $fila['nombre_producto'];
    $precio = $fila['precio_actual'];
    $cantidad = $fila['cantidad_disponible'];

    // Mostrar los datos en el HTML
    echo '<div class="inventario">';
    echo '<div id="nameproduct">';
    echo '<p class="nombre">' . $nombre . '</p>';
    echo '</div>';
    echo '<div id="precioproduct">';
    echo '<p class="precio">$' . $precio . '</p>';
    echo '</div>';
    echo '<div id="cantproduct">';
    echo '<p class="cantidad">' . $cantidad . '</p>';
    echo '</div>';
            echo '</div>';
        }
        if (isset($_POST['agregar'])) {

            $name = trim($_POST['name']);
            $precio = trim($_POST['valor']);
            $cantidad = trim($_POST['cantidad']);
}   
}
?>