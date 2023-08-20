<?php

include("base-de-datos.php");

if (isset($_GET['codigo'])) {
    $busqueda = $_GET['codigo'];

    $consulta_codigo = "SELECT * FROM inventario WHERE Código LIKE '%$busqueda%'";
    $resultado_codigo = mysqli_query($conexion, $consulta_codigo);

    $data = [];

    while ($fila_codigos  = mysqli_fetch_assoc($resultado_codigo)) {
        $data[] = $fila_codigos;
    }

    echo json_encode($data);
}

if (isset($_GET['codigoSeleccionado'])) {
    $busqueda = $_GET['codigoSeleccionado'];
    
    $consulta_producto = "SELECT * FROM inventario WHERE Código LIKE '%$busqueda%'";
    $resultado_producto = mysqli_query($conexion, $consulta_producto);
    $data = [];

    while ($fila_producto  = mysqli_fetch_assoc($resultado_producto)) {
        $data[] = $fila_producto;
    }

    echo json_encode($data);
}
mysqli_close($conexion);
?>