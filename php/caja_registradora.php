<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/caja_registradora.css">
    <title>Caja registradora</title>
</head>
<body>
    <div class="encabezado">
        <h2>Caja registradora</h2>
    </div>
    <div class="campo2">
        <div class="calculadora">
            <div class="boton">7</div>
            <div class="boton">8</div>
            <div class="boton">9</div>
            <div class="boton">4</div>
            <div class="boton">5</div>
            <div class="boton">6</div>
            <div class="boton">1</div>
            <div class="boton">2</div>
            <div class="boton">3</div>
            <div class="boton">0</div>
            <div class="boton">.</div>
            <div class="boton">ENTER</div>
        </div>
    </div>
    
    <form  method="post" class="inputs">
        <input id="code_input" type="text" placeholder="Código" maxlength="5" autocomplete="off">
        <div id="search_results"></div>
        <input id="product_input" type="text" placeholder="Producto" disabled>
        <input id="price_input" type="number" placeholder="Precio" disabled>
        <input id="cantidad_input" type="number" placeholder="Cantidad" autocomplete="off">
        <input type="submit" value="Ingresar">
    </form>

    <div class="campo1"></div>
    <div class="footer"></div>
    <script src="../library/jquery-3.7.0.js"></script>
    <script src="../js/caja_registradora.js"></script>
</body>
</html>

