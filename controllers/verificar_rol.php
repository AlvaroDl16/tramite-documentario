<?php

include_once("../ruta.php");
session_start();

if ($_SESSION['cargo'] == "secretaria") {
    switch ($_SESSION['area_cargo']) {
        case 'direccion':
            header("location:".$ruta_base."secciones/direccion/index.php");
            break;

        case 'unidad academica':
            header("location:".$ruta_base."secciones/unidad_academica/index.php");
            break;

        case 'secretaria academica':
            header("location:".$ruta_base."secciones/secretaria_academica/index.php");
            break;

        case 'contabilidad academica':
            header("location: ../secciones/contabilidad_academica/index.php");
            break;

        case 'abastecimiento':
            header("location:".$ruta_base."secciones/abastecimiento/index.php");
            break;

        case 'tesoreria':
            header("location:".$ruta_base."secciones/tesoreria/index.php");
            break;

        case 'dsi':
            header("location:".$ruta_base."secciones/desarrollo_sistemas/index.php");
            break;

        default:
            echo "no existe esa ruta";
            break;
    }
}elseif ($_SESSION['cargo'] == "administrador") {
    header("location:".$ruta_base."secciones/administrador/index.php");
}
?>