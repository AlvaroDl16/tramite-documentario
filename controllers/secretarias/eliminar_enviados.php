<?php
$ruta_base = "http://localhost/sistema_suiza/";

if(isset($_GET['txtID'])){
    
    include("../../bd.php");
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

    switch ($_SESSION['area_cargo']) {
        case 'direccion':
            header("Location:".$ruta_base."secciones/direccion/enviados.php");
            break;
    
        case 'unidad academica':
            header("location:".$ruta_base."secciones/unidad_academica/enviados.php");
            break;
    
        case 'secretaria academica':
            header("location:".$ruta_base."secciones/secretaria_academica/enviados.php");
            break;
    
        case 'contabilidad academica':
            header("location: ../secciones/contabilidad_academica/enviados.php");
            break;
    
        case 'abastecimiento':
            header("location:".$ruta_base."secciones/abastecimiento/enviados.php");
            break;
    
        case 'tesoreria':
            header("location:".$ruta_base."secciones/tesoreria/enviados.php");
            break;
    
        case 'dsi':
            header("Location:".$ruta_base."secciones/desarrollo_sistemas/enviados.php");
            break;
    
        default:
            echo "no existe esa ruta";
            break;
    }

}
?>