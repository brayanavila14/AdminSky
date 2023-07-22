<?php
session_start();

include("base-de-datos.php");



    if (isset($_POST['agregar'])) {

        $name = trim($_POST['name']);
        $precio = trim($_POST['valor']);
        $cantidad = trim($_POST['cant']);

        $newnombre_empresa = str_replace(" ", "_", $_SESSION['empresa']);

        if (empty($name) || empty($precio) || empty($cantidad)) {
            echo '<h3 class="mensaje-error">¡No has ingresado todos los campos!</h3>';
            exit;
        }

        // Verificar si el producto ya está registrado
        $consultaproduct = "SELECT * FROM inventario WHERE nombre_producto ='$name' LIMIT 1";
        $resultadoproduct = mysqli_query($conexion, $consultaproduct);

        if (mysqli_num_rows($resultadoproduct) > 0) {
            echo '<div class="mensaje-error">¡El producto ya ha sido ingresado!</div>';
            exit;
        } else {
            $insertproduct = "INSERT INTO inventario(nombre_producto, precio_actual, cantidad_disponible) VALUES ('$name','$precio','$cantidad')";
            $resultadoinsert = mysqli_query($conexion, $insertproduct);

            if ($resultadoinsert) {
                echo '<div class="mensaje-exito">¡El producto se ha ingresado con éxito!</div>';
                exit;
            } else {
                echo '<div class="mensaje-error">¡Ups... hubo un error, vuelve a intentarlo!</div>';
                exit;
            }
        }
    }

    if (isset($_POST['update'])) {

        $name = trim($_POST['name']);
        $precio = trim($_POST['valor']);
        $cantidad = trim($_POST['cant']);


        if (empty($name) || empty($precio) || empty($cantidad)) {
            echo '<h3 class="mensaje-error">¡No has ingresado todos los campos!</h3>';
            exit;
        }
        // Verificar si el producto ya está registrado
        $consultaproduct = "SELECT * FROM inventario_" . $newnombre_empresa . " WHERE nombre_producto ='$name' LIMIT 1";
        $resultadoproduct = mysqli_query($conexion, $consultaproduct);

        if (mysqli_num_rows($resultadoproduct) > 0) {
            $actualizar = "UPDATE inventario_" . $newnombre_empresa . " SET nombre_producto='$name', precio_actual='$precio', cantidad_disponible='$cantidad' WHERE nombre_producto='$name'";
            $resultadoactualizar = mysqli_query($conexion, $actualizar);

            if ($resultadoactualizar) {
                echo '<div class="mensaje-exito">¡El producto se ha actualizado con éxito!</div>';
                exit;
            } else {
                echo '<div class="mensaje-error">¡Ups... hubo un error, vuelve a intentarlo!</div>';
                exit;
            }
        } else {
            echo '<div class="mensaje-error">¡El producto no ha sido ingresado, por favor ingréselo!</div>';
            exit;
        }
    }
?>


