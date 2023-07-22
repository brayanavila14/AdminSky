<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/caja.css">
    <title>Caja - Sistema caja registradora</title>
</head>
<body>
<div class="caja-registradora">
    <h1>Caja Registradora</h1>
    <form method="post">
        <div class="contenedor">
            <div class="campo">
                <h4>Nombre del Producto</h4>
                <input type="text" placeholder="Ingrese el nombre del producto" name="nombre">
            </div>
            <div class="campo">
            <h4>Precio</h4>
                <input type="number" placeholder="Ingrese el precio" readonly name="precio" id="precio">
            </div>
            <div class="campo">
                <h4>Cantidad</h4>
                <input type="number" placeholder="Ingrese la cantidad" name="cantidad">
            </div>
        </div>
        <div class="botones">
            <input type="submit" name="agregar" value="Agregar">
            <input type="submit" name="limpiar" value="Limpiar">
        </div>
    </form>
    <div class="footer">
        <h4>Total</h4>
        <input type="number" placeholder="Total" readonly name="total" id="total">
        <h4>Pago</h4>
        <input type="number" placeholder="Efectivo" name="efectivo" id="efectivo">
        <h4>Devuelta</h4>
        <input type="number" placeholder="Devuelta" readonly name="devuelta" id="devuelta">
        
        <input type="submit" name="pagar" value="Pagar">
        <input type="submit" name="cancelar" value="Cancelar">
    </div>
</div>
<?php
include("cajaregistradora.php.php");
?>
<script src="../js/caja.js"></script>
</body>
</html>

