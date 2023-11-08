<?php

session_start();

$ulr_base = "http://localhost/sistema_suiza/";

$user_img = $ulr_base.'images/'.$_SESSION['foto_us'];
$user_default = $ulr_base.'images/user.jpg';

//verificamos si hay usuario logueado y si el secretario pertenece a esta area

if (!isset($_SESSION['usuario'])) {
    header("Location: ../../login.php");
}elseif ($_SESSION['cargo'] !== "secretaria" || $_SESSION['area_cargo'] !== "unidad academica") {
    header("location: ../../error.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de gestion documentaria</title>
    <link rel="stylesheet" href="<?php echo $ulr_base;?>css/styles.css">
    <script src="https://kit.fontawesome.com/4c66ccb783.js" crossorigin="anonymous"></script>
    
</head>
<body>

<header class="header_wrapper">
    <div class="user_text white_mode">
        <?php
            if ($_SESSION['foto_us']!="") {
                echo '<img src="'.$user_img.'" class="user_img"';
            }else{
                echo '<img src="'.$user_default.'" class="user_img"';
            }
        ?>
        <img src="<?php echo $ulr_base;?>images/<?php echo $_SESSION['foto_us']?>" alt="" class="user_img">
        <h3 class="user_name">Bienvenido <?php echo $_SESSION['usuario'].'-'.$_SESSION['area_cargo'];?></h3>
    </div>

    <div class="buttons">
        <button class="theme__mode">
            <span><i class="fa-solid fa-cloud-sun"></i></span>
            <span><i class="fa-solid fa-moon"></i></span>
        </button>
        <a href="<?php echo $ulr_base;?>controllers/cerrar.php" class="cerrar_sesion"><i class="fa-solid fa-arrow-right-from-bracket"></i>cerrar sesion</a>
    </div>
</header>


<aside class="sidebar">
    <header class="logo_container">
        <img src="<?php echo $ulr_base;?>images/logo.png" alt="" class="logo_img">
        <h1 class="logo_title white_mode">IESTP <span class="logo_title-blue">SUIZA</span></h1>
    </header>   

    <nav class="nav__container">
        <ul class="nav__links">
            <li>
                <a href="<?php echo $ulr_base;?>secciones/unidad_academica/index.php" class="link white_mode"><i class="fa-solid fa-house"></i>Inicio</a>
            </li>
            <li >
                <a id="dropdown" href="#" class="link white_mode"><i class="fa-solid fa-folder-open"></i>Tramites<i class="fa-solid fa-caret-down"></i></a>
                <ul class="submenu">
                    <li><a href="#" class="submenu__link white_mode"><i class="fa-solid fa-caret-right"></i>Redactar</a></li>
                    <li><a href="#" class="submenu__link white_mode"><i class="fa-solid fa-caret-right"></i>Recibidos</a></li>
                    <li><a href="#" class="submenu__link white_mode"><i class="fa-solid fa-caret-right"></i>Enviados</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="link white_mode"><i class="fa-solid fa-file-circle-question"></i>Consulta</a>
            </li>
            <li>
                <a href="#" class="link white_mode"><i class="fa-solid fa-trash-can"></i>Papelera</a>
            </li>
        </ul>
    </nav>
</aside>

<main class="main">