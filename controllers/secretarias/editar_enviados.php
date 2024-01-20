<?php
include_once("../../bd.php");
include_once("../../ruta.php");
session_start();
//cuando se haga el envio actualizamos los datos
if ($_POST) {
    $id = $_POST['txtID'];
    $codigo = $_POST['codigo'];
    $remitente = $_POST['remitente'];
    $asunto = $_POST['asunto'];
    $fecha_envio = $_POST['fecha_envio'];
    $estado = $_POST['estado'];
    $area_destino = $_POST['area_destino'];
    $area_origen = $_POST['area_origen'];
    $tipo = $_POST['tipo'];

    $sentencia = $conexion->prepare("UPDATE `documentos`
    SET 
    codigo=:codigo, remitente=:remitente, asunto=:asunto, fecha_envio=:fecha_envio,
    estado=:estado, area_destino=:area_destino,
    area_origen=:area_origen, id_tipo=:id_tipo
     WHERE id_doc=:id_doc");

    $sentencia->bindParam(":codigo", $codigo);
    $sentencia->bindParam(":remitente", $remitente);
    $sentencia->bindParam(":asunto", $asunto);
    $sentencia->bindParam(":fecha_envio", $fecha_envio);
    $sentencia->bindParam(":estado", $estado);
    $sentencia->bindParam(":area_destino", $area_destino);
    $sentencia->bindParam(":area_origen", $area_origen);
    $sentencia->bindParam(":id_tipo", $tipo);
    $sentencia->bindParam(":id_doc", $id);
    $sentencia->execute();  
    
    //creamos y movemos el archivo actualizado a su ruta 
    $archivo = $_FILES['archivo']['name'];
    $fecha = new DateTime();
    $nombre_archivo = ($archivo!="")?$fecha->getTimestamp()."_".$_FILES['archivo']['name']:"";
    $tmp_archivo = $_FILES['archivo']['tmp_name'];
    if ($tmp_archivo!='') {
        move_uploaded_file($tmp_archivo,"../../documents/".$nombre_archivo);

        //buscamos el archivo anterior y si existe lo eliminamos
        $consulta = $conexion->prepare("SELECT archivo FROM documentos WHERE id_doc=:id_doc");
        $consulta->bindParam(":id_doc", $txtID);
        $consulta->execute();
        $registro_archivo = $consulta->fetch(PDO::FETCH_LAZY);

        if (isset($registro_archivo['archivo']) && $registro_archivo['archivo']!="") {
            if (file_exists("../../documents/".$registro_archivo['archivo'])) {
                unlink("../../documents/".$registro_archivo['archivo']);
            }
        }
        //ejecutamos la sentencia para actualizar el dato
        $sentencia = $conexion->prepare("UPDATE `documentos` SET archivo=:archivo
        WHERE id_doc=:id_doc");
        $sentencia->bindParam(":archivo", $nombre_archivo);
        $sentencia->bindParam(":id_doc", $id);
        $sentencia->execute();
    }
    $msn = "Registro actualizado";

    //redireccionamos segun el area del usuario
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
