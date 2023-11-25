<?php 
include("./controllers/loginController.php");
include("./ruta.php");

    if(!empty($_SESSION['usuario'])){
        header("Location:".$ruta_base."controllers/verificar_rol.php");
    }else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
    <link rel="stylesheet" href="./css/login.css">
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

<?php } ?>