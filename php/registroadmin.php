<?php
session_start();
include("base-de-datos.php");

if (isset($_POST['registra'])) {
    $cod = mysqli_real_escape_string($conexion, trim($_POST['cod']));

    $name = mysqli_real_escape_string($conexion, trim($_POST['nombre_empresa']));
    $newname = str_replace(" ", "_", $name );

    $usuario = mysqli_real_escape_string($conexion, trim($_POST['usuario']));
    $password = mysqli_real_escape_string($conexion, trim($_POST['contraseña']));
    $password2 = mysqli_real_escape_string($conexion, trim($_POST['contraseña2']));
    $correo = mysqli_real_escape_string($conexion, trim($_POST['correo']));

    // Verificar si el usuario ya está registrado
    $consulta = "SELECT * FROM administrador WHERE usuario = '$usuario'";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        echo '<h3 class="mensaje-error">¡El usuario ' . $usuario . ' ya está registrado!</h3>';
        exit;
    }

    if (empty($name) || empty($correo) || empty($usuario) || empty($password) || empty($password2)) {
        echo '<h3 class="mensaje-error">¡No has ingresado todos los campos!</h3>';
        exit;
    }

    if (strlen($usuario) < 3) {
        echo '<h3 class="mensaje-error">¡El usuario es muy corto!</h3>';
        exit;
    }

    if (strlen($password) < 5) {
        echo '<h3 class="mensaje-error">¡La contraseña es muy corta!</h3>';
        exit;
    }

    if ($password != $password2) {
        echo '<h3 class="mensaje-error">¡La contraseña no coincide!</h3>';
        exit;
    }

    $consulta = "INSERT INTO administrador(ID, nombre_empresa, usuario, contraseña, email) VALUES ('$cod','$name','$usuario','$password','$correo')";
    $resultado = mysqli_query($conexion, $consulta);

    if ($conexion) {
        $empleadosTable = "CREATE TABLE empleados_" . $newname . " (
            ID_employee VARCHAR(8) NOT NULL,
            company_name VARCHAR(255) NOT NULL,
            username VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            PRIMARY KEY (ID_employee),
            FOREIGN KEY (company_name) REFERENCES administrador (nombre_empresa)
        );";
        
        $resultEmpleados = mysqli_query($conexion, $empleadosTable);
        
        $inventarioTable = "CREATE TABLE inventario_" . $newname . " (
            nombre_producto VARCHAR(255) NOT NULL,
            precio_actual INT NOT NULL,
            cantidad_disponible INT NOT NULL,
            PRIMARY KEY (nombre_producto)
        );";
        
        
        $resultInventario = mysqli_query($conexion, $inventarioTable);
        
        

        if ($resultEmpleados && $resultInventario) {
            $_SESSION['mensaje'] = '<div class="mensaje-exito">¡Registro exitoso, bienvenido ' . $name . '!</div>';
            header("Location: ../index.php");
            exit;
        } else {
            echo '<h3 class="mensaje-error">¡Ha ocurrido un error al crear las tablas!</h3>';
            exit;
        }
    } else {
        echo '<h3 class="mensaje-error">¡Ha ocurrido un error al registrar el usuario!</h3>';
        exit;
    }
}
?>
