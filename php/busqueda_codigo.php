<?php
// Conectarse a la base de datos
include("base-de-datos.php");

// Obtener el valor de búsqueda del cliente
if (isset($_GET['query'])) {
    $query = $_GET['query'];

    // Realizar la consulta en la base de datos
    $consulta1 = "SELECT Código FROM inventario WHERE Código LIKE '%$query%'";
    $resultado1 = mysqli_query($conexion, $consulta1);

    // Crear un array para almacenar los resultados
    $results = array();

    // Recorrer los resultados y agregarlos al array
    while ($fila = mysqli_fetch_assoc($resultado1)) {
        $results[] = $fila;
    }
    // Devolver los resultados en formato JSON
    echo json_encode($results);
}

// Obtener el código seleccionado del producto
if (isset($_GET['code'])) {
    $code = $_GET['code'];

    // Realizar la consulta en la base de datos para obtener el producto y el precio
    $consulta2 = "SELECT Producto, Precio FROM inventario WHERE Código = '$code' LIMIT 1";
    $resultado2 = mysqli_query($conexion, $consulta2);

    // Crear un array para almacenar los resultados
    $data = array();

    // Agregar los datos de producto y precio al array
    while ($fila = mysqli_fetch_assoc($resultado2)) {
        $data[] = $fila;
    }

    // Devolver los resultados en formato JSON
    echo json_encode($data);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
