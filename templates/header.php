<?php

session_start();

$ulr_base = "http://localhost/sistema_suiza/";
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio del sistema</title>
    <link rel="stylesheet" href="./css/estilos.css">
    <script src="https://kit.fontawesome.com/4c66ccb783.js" crossorigin="anonymous"></script>
    
</head>
<body>

<header class="header_wrapper">
    <div class="user_text">
        <img src="./images/alvaro.jpg" alt="" class="user_img">
        <h3 class="user_name">Bienvenido <?php echo $_SESSION['usuario'];?></h3>
    </div>

    <div class="buttons">
        <div class="theme__mode"></div>
        <a href="<?php echo $ulr_base;?>cerrar_sesion.php" class="cerrar_sesion"><i class="fa-solid fa-arrow-right-from-bracket"></i>cerrar sesion</a>
    </div>
</header>