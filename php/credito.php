<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contabilidad de Créditos</title>
    <link rel="stylesheet" href="../css/credito.css">
</head>
<body>
    <header>
        <h1>Contabilidad de Créditos</h1>
    </header>
    <main>
        <section class="creditos">
            <!-- Agrega este formulario en tu HTML -->
            <form action="crear_cuenta.php" method="post">
                <input type="number" name="numberId" placeholder="C.C." maxlength="10">
                <input type="text" name="name" placeholder="Nombre">
                <input type="email" name="email" placeholder="Email">
                <input type="text" name="direccion" placeholder="Dirección">
                <input type="submit" name="crearCuenta" value="Crear cuenta">
            </form>
        </section>
        <section class="registros">
            <!-- Aquí puedes mostrar los créditos registrados en una tabla -->
            <!-- Puedes utilizar JavaScript para llenar la tabla dinámicamente -->
        </section>
    </main>
    <footer>
        <p>&copy;2023 AdminSky | Todos los derechos reservados</p>
    </footer>
    <script src="scripts.js"></script>
    <?php
        include('base-de-datos.php');
    ?>
</body>
</html>

