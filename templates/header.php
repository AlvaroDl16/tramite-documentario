<?php
include_once("../../ruta.php");
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../../login.php");
}elseif ($_SESSION['cargo'] !== "administrador" || $_SESSION['area_cargo'] !== "administrador") {
    header("location: ../../error.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de gestion documentaria</title>
    <link rel="stylesheet" href="<?php echo $ulr_base;?>css/sty.css">
    <script src="https://kit.fontawesome.com/4c66ccb783.js" crossorigin="anonymous"></script>
    <script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
  
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<?php if(isset($_GET['msn'])){ ?>
    <script>
        Swal.fire({icon:"succes", title:"<?php echo $_GET['msn']; ?>"})
    </script>
<?php } ?>

<header class="header_wrapper">
    <div class="user_text white_mode">
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
        <img src="<?php echo $ulr_base;?>images/logo.webp" alt="" class="logo_img">
        <h1 class="logo_title white_mode">IESTP <span class="logo_title-blue">SUIZA</span></h1>
    </header>   

    <nav class="nav__container">
        <ul class="nav__links">
            <li>
                <a href="<?php echo $ulr_base;?>secciones/administrador/index.php" class="link white_mode">
                    <i class="fa-solid fa-house"></i>Inicio
                </a>
            </li>

            <li>
                <a href="#" class="link white_mode">
                    <i class="fa-solid fa-school"></i>Areas
                </a>
            </li>

            <li>
                <a id="dropdown" href="#" class="link white_mode">
                    <div class="texts_icons">
                        <div><i class="fa-solid fa-gear"></i>configuración</div>
                        <i class="fa-solid fa-caret-down"></i>
                    </div>
                </a>
                <ul class="submenu">
                    <li>
                        <a href="<?php echo $ulr_base;?>secciones/administrador/usuarios.php" class="submenu__link white_mode">
                            <i class="fa-solid fa-users"></i>Usuarios
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo $ulr_base;?>secciones/administrador/crear_usuario.php" class="submenu__link white_mode">
                            <i class="fa-solid fa-user-plus"></i>Crear usuario
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" class="link white_mode">
                    <i class="fa-solid fa-user"></i>Perfil
                </a>
            </li>
            
        </ul>
    </nav>
</aside>

<main class="main">