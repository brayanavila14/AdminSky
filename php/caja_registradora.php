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
    <div class="container">
        <div class="header">
            <h2>Caja registradora</h2>
        </div>
        <div class="calculator">
            <form method="post" class="inputs">
                <input id="codigo_input" type="text" placeholder="Código" maxlength="5" autocomplete="off">
                <div id="resultados_busqueda"></div>
                <input id="producto_input" type="text" placeholder="Producto" disabled>
                <input id="precio_input" type="number" placeholder="Precio" disabled>
                <input id="cantidad_input" type="number" placeholder="Cantidad" autocomplete="off">
                <button id="ingresar_producto" type="submit">Ingresar</button>
            </form>
            <div class="table-container">
                <table class="tabla-datos">
                    <tr class="encabezado">
                        <th>Código</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </table>
            </div>
            <div class="total">
                <input id="total_input" type="number" disabled>
            </div>
        </div>
        <button id="btnEliminar" type="button">Eliminar tabla</button>
    </div>
    <script src="../library/jquery-3.7.0.js"></script>
    <script src="../js/caja_registradora.js"></script>
</body>
</html>




