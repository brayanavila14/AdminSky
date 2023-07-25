<?php
session_start();


if (!$_SESSION['Usuario']) {
    header("Location: ../index.php");
    exit;

    // Verificar si existe un mensaje en la variable de sesión
} elseif (isset($_SESSION['mensaje'])) {
    echo $_SESSION['mensaje'];
    unset($_SESSION['mensaje']); // Limpiar el mensaje de la variable de sesión para que no se muestre nuevamente en futuras visitas
    }
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inicio_empleado.css">
    <title>Inicio - sistema de caja registradora</title>
</head>
<body>
    <div class="contenedor">
            <a href="caja.php" class="opcion">
                <img src="../imagenes/caja-registradora.png">
                <h5>Caja registradora</h5>
            </a>
    </div>
</body>
</html>