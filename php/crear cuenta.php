<?php
        include('base-de-datos.php');
    // Obtener datos del formulario
    $numeroId = trim($_POST['numberId']);
    $nombre = trim($_POST['name']);
    $email = trim($_POST['email']);
    $direccion = trim($_POST['direccion']);
if (isset($_POST['crearCuenta'])) {
    // Consulta SQL para insertar los datos en la tabla de cuentas
    $insertar_cuenta = "INSERT INTO creditos (Id, nombre, email, direccion) VALUES ('$numeroId', '$nombre', '$email', '$direccion')";
    $resultado_cuenta = mysqli_query($conexion, $insertar_cuenta);
    if ($resultado_cuenta) {
        echo "Cuenta creada con éxito.";
    } else {
        echo "Error al crear la cuenta: ";
    }
}
mysqli_close($conexion);
?>