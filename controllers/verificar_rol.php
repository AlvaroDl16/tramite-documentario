<?php

session_start();

if ($_SESSION['cargo'] == "secretaria") {
    switch ($_SESSION['area_cargo']) {
        case 'unidad academica':
            header("location: ../secciones/unidad_academica/index.php");
            break;

        case 'secretaria academica':
            header("location: ../secciones/secretaria_academica/index.php");
            break;

        case 'contabilidad academica':
            header("location: ../secciones/contabilidad_academica/index.php");
            break;

        case 'abastecimiento':
            header("location: ../secciones/abastecimiento/index.php");
            break;

        case 'tesoreria':
            header("location: ../secciones/tesoreria/index.php");
            break;

        default:
            echo "no existe esa ruta";
            break;
    }
    // header("location: ../secciones/secretarios.php");
}elseif ($_SESSION['cargo'] == "administrador") {
    header("location: ../secciones/direccion/index.php");
}
?>