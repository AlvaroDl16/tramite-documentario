<?php

session_start();

if ($_POST) {
    include("bd.php");

    $sentencia = $conexion->prepare("SELECT *, count(*) as x_users FROM usuarios WHERE user=:user AND password=:password");

    $user = $_POST['usuario'];
    $pass = $_POST['contraseña'];

    $sentencia->bindParam(":user", $user);
    $sentencia->bindParam(":password", $pass);
    $sentencia->execute();

    $lista_usuarios = $sentencia->fetch(PDO::FETCH_LAZY);


    if ($lista_usuarios["x_users"] > 0) {
        $_SESSION['usuario'] = $lista_usuarios["user"];
        $_SESSION['cargo'] = $lista_usuarios['rol'];
        $_SESSION['area_cargo'] = $lista_usuarios['area_cargo'];

        header("Location: controllers/verificar_rol.php");
    }else{
        $mensaje = "vuelve a intentar";
    }
}

?>