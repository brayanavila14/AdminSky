<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registro-formulario.css">
    <title>registro administrador</title>
</head>
<body>
<input class="volver" type="button" value="Volver" onclick="location.href='registro.php';">
    <div class="contenedor">
        <form id="formulario" method="post">
            <h1 class="tittle">Registro</h1>
            <div class="contenido">
            <?php

            // Generar ID aleatorio de 8 caracteres alfanuméricos
            // primero divido en codigo en dos partes, una que va a hacer la especial y la otra la común.

            // parte especial
            $part1 = substr(str_shuffle('0123456789'), 0, 4);

            // parte común
            $part2 = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDFGHIFKLMNOPQRSTUVWXYZ0123456789'), 0, 8);

            // se genera un codigo especial para el administrador
            $codempresa = $part1. '-'. $part2 ;

            ?>
                <input id="codigo" class="campo" name="cod" type="text" placeholder="Código de empresa" value="<?php echo $codempresa; ?>" readonly>
                <input class="campo" name="nombre_empresa" type="text" placeholder="Nombre de empresa" autocomplete="off">
                <input class="campo" name="correo" type="email" placeholder="Correo electrónico" autocomplete="off">
                <input class="campo" name="usuario" type="text" placeholder="Usuario" autocomplete="off">
                <input id="clave" class="campo" name="contraseña" type="password" placeholder="Contraseña" autocomplete="off">
                <input id="clave2" class="campo" name="contraseña2" type="password" placeholder="Verifica tu contraseña" autocomplete="off">
            </div>
            <input id="registrar" class="boton-registrar" type="submit" name="registra" value="Registrar">
        </form>
    </div>
    
    <?php 
    include("registroadmin.php");
    ?>
    <script src="../js/funcionextras.js"></script>
</body>
</html>