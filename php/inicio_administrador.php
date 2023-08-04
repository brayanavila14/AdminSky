<?php
session_start();


if (!$_SESSION['Usuario']) {
    header("Location: ../index.php");
    exit;

    // Verificar si existe un mensaje en la variable de sesión
} elseif (isset($_SESSION['Mensaje'])) {
    echo $_SESSION['Mensaje'];
    unset($_SESSION['Mensaje']); // Limpiar el mensaje de la variable de sesión para que no se muestre nuevamente en futuras visitas
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inicio_administrador.css">
    <title>Inicio - AdminSky</title>
</head>
<body>
    <div class="contenedor">
        <div class="opciones">
            <h2>Opciones</h2>
            <a class="opcion" href="caja_registradora.php">
                <img src="../imagenes/caja-registradora.png" alt="">
                <h5>Caja registradora</h5>
            </a>
            <a class="opcion" href="inventario.php">
                <img src="../imagenes/inventario.png" alt="">
                <h5>Inventario</h5>
            </a>
            <a class="opcion" href="credito.php">
                <img src="../imagenes/credito.png" alt="">
                <h5>Créditos</h5>
            </a>
            <a class="opcion" href="empleado.php">
                <img src="../imagenes/empleado.png" alt="">
                <h5>Empleados</h5>
            </a>
            <a class="opcion" href="movimientos.php">
                <img src="../imagenes/movimientos.png" alt="">
                <h5>Movimientos</h5>
            </a>
        </div>
    </div>
</body>
</html>
