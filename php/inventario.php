<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inventario.css">
    <title>Inventario - AdminSky</title>
</head>
<body>
    <div class="encabezado">
        <h2>Inventario</h2>
    </div>
    <div class="subencabezado">
        <h1 class="tittle arrays0">Código</h1>
        <h1 class="tittle arrays1">Producto</h1>
        <h1 class="tittle arrays2">Precio</h1>
        <h1 class="tittle arrays3">Cantidad</h1>
    </div>

    <?php
    session_start();
    include("base-de-datos.php");

    // Consulta para obtener los registros de la tabla inventario
    $consulta_inventario = "SELECT * FROM inventario";
    $resultado_inventario = mysqli_query($conexion, $consulta_inventario);

    // Verificar si se encontraron registros
    if (mysqli_num_rows($resultado_inventario) > 0) {
        // Mostrar los datos en una tabla
        echo '<table class="inventario">';

        // Iterar sobre los registros y mostrarlos
        while ($fila = mysqli_fetch_assoc($resultado_inventario)) {
            $code = $fila['Código'];
            $nombre = $fila['Producto'];
            $precio = $fila['Precio'];
            $cantidad = $fila['Cantidad'];

            echo '<tr>';
            echo '<td class="columns">' . $code . '</td>';
            echo '<td class="columns">' . $nombre . '</td>';
            echo '<td class="columns">$' . $precio . '</td>';
            echo '<td class="columns">' . $cantidad . '</td>';
            echo '<td class="columns"><img src="../imagenes/tres-puntos.png" alt=":" class="extra"></td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<h1 class="mensaje-error">No hay productos en el inventario.</h1>';
    }

    mysqli_close($conexion);
    ?>
</body>
</html>

