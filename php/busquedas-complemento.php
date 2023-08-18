<?php
// Conectarse a la base de datos
include("base-de-datos.php");

// Obtener el valor de búsqueda del cliente
if (isset($_GET['codigo'])) {
    $busqueda = $_GET['codigo'];
    $consulta_codigo = "SELECT Código FROM inventario WHERE Código LIKE '%$busqueda%'";
    $resultado_codigo = mysqli_query($conexion, $consulta_codigo);
    // Crear un array para almacenar los resultados
    $lista_codigos = array();
    
    // Recorrer los resultados y agregarlos al array
    while ($fila_codigos  = mysqli_fetch_assoc($resultado_codigo)) {
        $lista_codigos[] = $fila_codigos;
    }
    // Devolver los resultados en formato JSON
    echo json_encode($lista_codigos);
}
mysqli_close($conexion);
?>
