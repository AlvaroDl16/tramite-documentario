<?php

session_start();

if ($_POST) {
    include("bd.php");
    $sentencia = $conexion->prepare("SELECT *, count(*) as x_users FROM usuarios
    WHERE username=:username AND password=:password");
    $user = $_POST['usuario'];
    $pass = $_POST['contraseña'];

    $sentencia->bindParam(":username", $user);
    $sentencia->bindParam(":password", $pass);

    $sentencia->execute();

    $lista_usuarios = $sentencia->fetch(PDO::FETCH_LAZY);

    if ($lista_usuarios["x_users"] > 0) {
        $_SESSION['usuario'] = $lista_usuarios["username"];
        header("Location: index.php");
    }else{
        $mensaje = "vuelve a intentar";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
    <link rel="stylesheet" href="./css/log.css">
    <script src="https://kit.fontawesome.com/4c66ccb783.js" crossorigin="anonymous"></script>
    
</head>
<body>

    <div class="login_wrapper">
        <h1 class="title">Log in</h1>
        <?php if (isset($mensaje)) {
            echo $mensaje;
        }?>
        <form method="POST" class="form__login">
        <i class="fa-solid fa-user"></i><input type="text" name="usuario" placeholder="Ingresa tu usuario" class="input__form">
        <i class="fa-solid fa-lock"></i><input type="password" name="contraseña" placeholder="Ingresa tu contraseña" class="input__form">
            <input type="submit" value="Iniciar sesion" class="cta">
        </form>

    </div>

    <script src="./js/particulas.js"></script>
</body>
</html>