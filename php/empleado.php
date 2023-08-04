<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/empleado.css">
    <title>Empleados - AdminSky</title>
</head>
<body>
    <div class="encabezado">
        <h2>Empleados</h2>
    </div>
    <div class="subencabezado">
        <h1 class="tittle arrays0"># de identidad</h1>
        <h1 class="tittle arrays1">Nombre</h1>
        <h1 class="tittle arrays2">Segundo Nombre</h1>
        <h1 class="tittle arrays3">Apellidos</h1>
    </div>
    <?php
    include("base-de-datos.php");
    
    // Consulta para obtener los registros de empleados de la tabla personal
    $consulta_empleado = "SELECT * FROM personal WHERE Cargo='Empleado'";
    $resultado_empleado = mysqli_query($conexion, $consulta_empleado);

    // Verificar si se encontraron registros
    if (mysqli_num_rows($resultado_empleado) > 0) {
        // Mostrar los datos en una tabla
        echo '<table class="empleados">';

        // Iterar sobre los registros y mostrarlos
        while ($fila = mysqli_fetch_assoc($resultado_empleado)) {
            $IDnumber = $fila['Id'];
            $name = $fila['Nombre'];
            $second_name = $fila['Segundo nombre (opcional)'];
            $last_name = $fila['Apellidos'];
            echo '<tr>';
            echo '<td class="columns">' . $IDnumber . '</td>';
            echo '<td class="columns">' . $name . '</td>';
            echo '<td class="columns">' . $second_name . '</td>';
            echo '<td class="columns">' . $last_name . '</td>';
            echo '<td class="columns"><img src="../imagenes/tres-puntos.png" alt=":" class="extra"></td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<h1 class="mensaje-error">No hay empleados registrados</h1>';
    }

    mysqli_close($conexion);
    ?>
</body>
</html>
