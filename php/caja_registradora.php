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
                <input id="codigo_input" type="number" placeholder="Código" maxlength="5" autocomplete="off">
                <div id="resultados_busqueda"></div>
                <input id="producto_input" type="text" placeholder="Producto" disabled>
                <input id="cantidad_input" type="number" placeholder="Cantidad" autocomplete="off">
                <input id="precio_input" type="number" placeholder="Precio" disabled>
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
        </div>
        <div class="footer">
            <input id="total_input" type="number" disabled>
            <input type="text" id="num_factura" disabled>
            <input type="number" id="pago_input" placeholder="Monto del Pago">
            <div class="botones">
                <button id="btnLimpiar" type="button">Limpiar</button>
                <button id="btnCancelar" type="button">Cancelar Pedido</button>
                <button id="btnRegistrar" type="button">Registrar Pedido</button>
            </div>
        </div>
    </div>
    <script src="../library/jquery-3.7.0.js"></script>
    <script src="../js/caja_registradora.js"></script>
</body>
</html>




