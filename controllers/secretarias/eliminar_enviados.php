<?php
include_once("../../ruta.php");

if(isset($_GET['txtID'])){
    
    include_once("../../bd.php");
    session_start();
    $txtID=$_GET['txtID'];

    $consulta = $conexion->prepare("SELECT archivo FROM documentos WHERE id_doc=:id_doc");
    $consulta->bindParam(":id_doc", $txtID);
    $consulta->execute();
    $registro_archivo = $consulta->fetch(PDO::FETCH_LAZY);

    if (isset($registro_archivo['archivo']) && $registro_archivo['archivo']!="") {
        if (file_exists("../../documents/".$registro_archivo['archivo'])) {
            unlink("../../documents/".$registro_archivo['archivo']);
        }
    }

    $proceso = $conexion->prepare("DELETE FROM documentos WHERE id_doc=:id_doc");
    $proceso->bindParam(":id_doc", $txtID);
    $proceso->execute();
    $msn = "Registro eliminado";

    switch ($_SESSION['area_cargo']) {
        case 'direccion':
            header("Location:".$ruta_base."secciones/direccion/enviados.php?msn=".$msn);
            break;
    
        case 'unidad academica':
            header("location:".$ruta_base."secciones/unidad_academica/enviados.php?msn=".$msn);
            break;
    
        case 'secretaria academica':
            header("location:".$ruta_base."secciones/secretaria_academica/enviados.php?msn=".$msn);
            break;
    
        case 'contabilidad academica':
            header("location: ../secciones/contabilidad_academica/enviados.php?msn=".$msn);
            break;
    
        case 'abastecimiento':
            header("location:".$ruta_base."secciones/abastecimiento/enviados.php?msn=".$msn);
            break;
    
        case 'tesoreria':
            header("location:".$ruta_base."secciones/tesoreria/enviados.php?msn=".$msn);
            break;
    
        case 'dsi':
            header("Location:".$ruta_base."secciones/desarrollo_sistemas/enviados.php?msn=".$msn);
            break;
    
        default:
            echo "no existe esa ruta";
            break;
    }

}
