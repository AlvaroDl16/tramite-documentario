<?php

session_start();

if ($_POST) {
    include("bd.php");

    // $sentencia = $conexion->prepare("SELECT *, count(*) as x_users FROM 
    // usuarios, roles, personal,areas_administrativas WHERE
    //  usuarios.id_rol=roles.id AND usuarios.id_personal=personal.id AND
    //   personal.id_area=areas_administrativas.id AND
    //    user=:user AND password=:password");
    $sentencia = $conexion->prepare("SELECT *, count(*) as x_users FROM usuarios, roles, areas_administrativas WHERE usuarios.id_rol=roles.id_rol AND usuarios.id_area=areas_administrativas.id_area AND username=:username AND password=:password");

// SELECT *, count(*) as x_users FROM usuarios, roles, areas_administrativas WHERE usuarios.id_rol=roles.id_rol AND usuarios.id_area=areas_administrativas.id_area AND username="AlvaroDL" AND password="12345";  codigo nuevo 

    $user = $_POST['usuario'];
    $pass = $_POST['contraseña'];

    $sentencia->bindParam(":username", $user);
    $sentencia->bindParam(":password", $pass);
    $sentencia->execute();

    $lista_usuarios = $sentencia->fetch(PDO::FETCH_LAZY);

    if ($lista_usuarios["x_users"] > 0 && $lista_usuarios["username"] == $user && $lista_usuarios["password"] == $pass) {
        $_SESSION['usuario'] = $lista_usuarios["username"];
        $_SESSION['cargo'] = $lista_usuarios['rol'];
        $_SESSION['area_cargo'] = $lista_usuarios['nombre_area'];

        header("Location: controllers/verificar_rol.php");
    }else{
        $mensaje = "vuelve a intentar";
    }
}

?>