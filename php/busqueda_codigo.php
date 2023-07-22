<?php
// Conectarse a la base de datos
include("php/base-de-datos.php");

// Obtener el valor de búsqueda del cliente
if (isset($_GET['query'])) {
    $query = $_GET['query'];

    // Realizar la consulta en la base de datos
    $consulta = "SELECT Código FROM inventario WHERE Código LIKE '%$query%'";
    $resultado = mysqli_query($conexion, $consulta);

    // Crear un array para almacenar los resultados
    $results = array();

    // Recorrer los resultados y agregarlos al array
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $results[] = $fila;
    }

    // Devolver los resultados en formato JSON
    echo json_encode($results);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
