<?php

session_start();
include("base-de-datos.php");

if (isset($_POST['registra'])) {
    $ID_empleado = trim($_POST['cod-empleado']);

    $nombre_empresa = trim($_POST['nombre_empresa']);
    $newnombre_empresa  = str_replace(" ", "_", $nombre_empresa );

    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['contraseña']);
    $password2 = trim($_POST['contraseña2']);
    $correo = trim($_POST['email']);

    // Verificar si el usuario ya está registrado
    $consultusername = "SELECT 'company_name', 'username', 'password' FROM  empleados_" . $newnombre_empresa . " WHERE username = '$usuario'";
    $resultusername = mysqli_query($conexion, $consultusername);

    if (mysqli_num_rows($resultusername) > 0) {
        echo '<h3 class="mensaje-error">¡El usuario ' . $usuario . ' ya está registrado!</h3>';
        exit;
    }

    if (empty($nombre_empresa) || empty($usuario) || empty($password) || empty($password2) || empty($correo)) {
        echo '<h3 class="mensaje-error">¡No has ingresado todos los campos!</h3>';
        exit;
    }

    if (empty($nombre_empresa)) {
        echo '<h3 class="mensaje-error">¡ingresa el nombre de la empresa, Por favor!</h3>';
        exit;
    }

    if (empty($correo)) {
        echo '<h3 class="mensaje-error">¡ingresa el email, Por favor!</h3>';
        exit;
    }

    if (empty($usuario)) {
        echo '<h3 class="mensaje-error">¡ingresa el usuario, Por favor!</h3>';
        exit;
    }

    if (strlen($usuario) < 3) {
        echo '<h3 class="mensaje-error">¡El usuario es muy corto!</h3>';
        exit;
    }

    if (empty($password)) {
        echo '<h3 class="mensaje-error">¡ingresa la coontraseña, Por favor!</h3>';
        exit;
    }

    if (strlen($password) < 6) {
        echo '<h3 class="mensaje-error">¡La contraseña es muy corta!</h3>';
        exit;
    }

    if ($password != $password2) {
        echo '<h3 class="mensaje-error">¡La contraseña no coincide!</h3>';
        exit;
    }

    $consulta = "INSERT INTO empleados_" . $newnombre_empresa . "( ID_employee, company_name, username, password, email) VALUES ('$ID_empleado','$nombre_empresa','$usuario','$password','$correo')";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_affected_rows($conexion) > 0) {
        $_SESSION['mensaje'] = '<div class="mensaje-exito">¡Registro exitoso, bienvenido ' . $usuario. '!</div>';
        header("Location: ../index.php");
        exit;
    } else {
        echo '<h3 class="mensaje-error">¡Ha ocurrido un error al registrar el usuario!</h3>';
        exit;
    }
}
?>
