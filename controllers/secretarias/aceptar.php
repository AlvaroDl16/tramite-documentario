<?php
if($_GET){
    include_once("../../ruta.php");
    session_start();
    include("../../bd.php");
    $txtid = $_GET['txtID'];

    $consulta = $conexion->prepare("SELECT estado FROM documentos WHERE id_doc=:id_doc");
    $consulta->bindParam("id_doc", $txtid);
    $consulta->execute();

    $estado = $consulta->fetch(PDO::FETCH_LAZY);

    $estado = "Aceptado";

    $sentencia = $conexion->prepare("UPDATE documentos SET estado=:estado 
    WHERE id_doc=:id_doc");
    $sentencia->bindParam(":estado", $estado);
    $sentencia->bindParam(":id_doc", $txtid);
    $sentencia->execute();
    $msn = "Registro aceptado";

    switch ($_SESSION['area_cargo']) {
        case 'direccion':
            header("Location:".$ruta_base."secciones/direccion/recibidos.php?msn=".$msn);
            break;
    
        case 'unidad academica':
            header("location:".$ruta_base."secciones/unidad_academica/recibidos.php?msn=".$msn);
            break;
    
        case 'secretaria academica':
            header("location:".$ruta_base."secciones/secretaria_academica/recibidos.php?msn=".$msn);
            break;
    
        case 'contabilidad academica':
            header("location: ../secciones/contabilidad_academica/recibidos.php?msn=".$msn);
            break;
    
        case 'abastecimiento':
            header("location:".$ruta_base."secciones/abastecimiento/recibidos.php?msn=".$msn);
            break;
    
        case 'tesoreria':
            header("location:".$ruta_base."secciones/tesoreria/recibidos.php?msn=".$msn);
            break;
    
        case 'dsi':
            header("Location:".$ruta_base."secciones/desarrollo_sistemas/recibidos.php?msn=".$msn);
            break;
    
        default:
            echo "no existe esa ruta";
            break;
    }

}
