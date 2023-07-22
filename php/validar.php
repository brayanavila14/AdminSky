<?php
session_start();
include("php/base-de-datos.php");

if (isset($_POST['ingresar'])) {
    $username = trim($_POST['username']);
    $code = trim($_POST['code']);

    if (empty($username) || empty($code)) {
        echo '<div class="mensaje-error">¡No has ingresado todos los campos!</div>';
        exit;
    }
    
    $consulta_personal = "SELECT * FROM personal WHERE Id = '$username' LIMIT 1";
    $resultado_personal = mysqli_query($conexion, $consulta_personal);
    
    if (mysqli_num_rows($resultado_personal) > 0) {
        $info_personal = mysqli_fetch_assoc($resultado_personal);
        
        if ($info_personal['Id'] == $username && $info_personal['Código'] == $code) {
            $_SESSION['Usuario'] = $username;
            $_SESSION['Mensaje'] = '<div class="mensaje-exito">¡Bienvenido, ' . $info_personal['nombre'] . ' ' . $info_personal['apellidos'] . '!</div>';
            
            if ($info_personal['Cargo'] == "Jefe" ) {
                header("Location: php/inicio_administrador.php");
            } elseif ($info_personal['Cargo'] == "Empleado") {
                header("Location: php/inicio_empleado.php");
            }
            exit;
        } else {
            echo '<div class="mensaje-error">¡La contraseña no coincide, Vuelve a intentarlo!</div>';
        }
    } else {
        echo '<div class="mensaje-error">¡Empleado aún no registrado, favor comuníquese con su jefe!</div>';
    }
}

mysqli_close($conexion);
?>

