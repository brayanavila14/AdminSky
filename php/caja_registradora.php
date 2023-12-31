<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/caja_registradora.css">
    <script src="../library/jquery-3.7.0.js"></script>
    <title>Caja registradora - AdminSky</title>
</head>
<body>
    <header><input id="Volver" type="button" value="Volver">Caja registradora</header>
    <section>
        <form id="contenedor" method="post">
            <input id="codigo_input" type="number" placeholder="Código" maxlength="5"><div id="resultados_busqueda"></div>
            <input id="producto_input" type="text" placeholder="Producto" disabled>
            <input id="precio_input" type="number" placeholder="Precio" disabled><input id="cantidad_input" type="number" placeholder="Cantidad">
            <input id="ingresar_producto" type="submit" value="Ingresar">
        </form>
    </section>
    <section id="encabezado">
        <h2>Items</h2>
        <h2>Código</h2>
        <h2>Producto</h2>
        <h2>Empaque</h2>
        <h2>Precio</h2>
        <h2>Cantidad</h2>
        <h2>Total</h2>
    </section>
    <main id="factura"></main>
    <footer>
        <input id="t-pago" type="number" placeholder="Monto total" disabled>
        <label for="m-pago">método de pago:</label>
        <select id="m-pago" name="metodoPago">
            <option value="efectivo">Efectivo</option>
            <option value="transferencia">Transferencia</option>
        </select>
        <input id="confirmar_button" type="submit" value="Confirmar"><input id="limpiar_button" type="submit" value="Limpiar">
    </footer>
    <script src="../js/caja_registradora.js"></script>
</body>
</html>