<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/caja_registradora.css">
    <title>Caja registradora - AdminSky</title>
</head>
<body>
    <div class="encabezado">
        <h2>Caja registradora</h2>
    </div>
    <form  method="post" class="inputs">
        <input id="codigo_input" type="text" placeholder="Código" maxlength="5" autocomplete="off">
        <div id="resultados_busqueda"></div>
        <input id="producto_input" type="text" placeholder="Producto" disabled>
        <input id="precio_input" type="number" placeholder="Precio" disabled>
        <input id="cantidad_input" type="number" placeholder="Cantidad" autocomplete="off">
        <input id="ingresar_producto" type="submit" value="Ingresar">
    </form>
    <button id="btnEliminar" type="button">Eliminar tabla</button>
    <div class="campo1">
    </div>
    <div class="footer">
        <input id="total_input" type="number" disabled>
    </div>
    <script src="../library/jquery-3.7.0.js"></script>
    <script src="../js/caja_registradora.js"></script>
</body>
</html>


