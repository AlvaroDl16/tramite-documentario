<?php 
include("../../bd.php");
$ruta_base = "http://localhost/sistema_suiza/";
   
if($_POST){
    $id = $_POST['txtID'];
    $estado = "En proceso";
    $destino = $_POST['area_despacho'];

    $consulta = $conexion->prepare("UPDATE documentos 
    SET estado=:estado, area_destino=:area_destino
    WHERE id_doc=:id_doc");
    $consulta->bindParam("estado", $estado);
    $consulta->bindParam("area_destino", $destino);
    $consulta->bindParam("id_doc", $id);
    $consulta->execute();  

    session_start();
    switch ($_SESSION['area_cargo']) {
        case 'direccion':
            header("Location:".$ruta_base."secciones/direccion/recibidos.php");
            break;
    
        case 'unidad academica':
            header("location:".$ruta_base."secciones/unidad_academica/recibidos.php");
            break;
    
        case 'secretaria academica':
            header("location:".$ruta_base."secciones/secretaria_academica/recibidos.php");
            break;
    
        case 'contabilidad academica':
            header("location: ../secciones/contabilidad_academica/recibidos.php");
            break;
    
        case 'abastecimiento':
            header("location:".$ruta_base."secciones/abastecimiento/recibidos.php");
            break;
    
        case 'tesoreria':
            header("location:".$ruta_base."secciones/tesoreria/recibidos.php");
            break;
    
        case 'dsi':
            header("Location:".$ruta_base."secciones/desarrollo_sistemas/recibidos.php");
            break;
    
        default:
            echo "no existe esa ruta";
            break;
    }
}

?>