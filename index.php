<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <title>AdminSky</title>
</head>
<body>
    <div class="contenedor">
        <h1>AdminSky</h1>
        <form method="post">
            <input id="input-usuario" type="number" placeholder="Usuario(numero de identificación)" name="username" autocomplete="off">
            <input id="input-password" type="password" placeholder="Codigo" name="code" autocomplete="off">
            <img id="eye-password" src="imagenes/ojo-ver.png"></img>
            <input type="submit" name="ingresar" value="Ingresar">
        </form>
    </div>
    <?php 
    include 'php/validar.php';
    ?>
    <script src="js/index.js"></script>
</body>
</html>
