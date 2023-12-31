<?php 
    if($_POST){
        session_start();
        include_once("../../bd.php");
        include_once("../../ruta.php");
        $codigo = $_POST['codigo'];
        $remitente = $_POST['remitente'];
        $asunto = $_POST['asunto'];
        $archivo = $_FILES['archivo']['name'];
        $fecha_envio = $_POST['fecha_envio'];
        $estado = $_POST['estado'];
        $area_destino = $_POST['area_destino'];
        $area_origen = $_POST['area_origen'];
        $tipo = $_POST['tipo'];

        $sentencia = $conexion->prepare("INSERT INTO documentos(
            id_doc, codigo, remitente, asunto, archivo, fecha_envio, estado, area_destino, area_origen, id_tipo)
            VALUES(
            NULL,:codigo,:remitente,:asunto,:archivo,:fecha_envio,:estado,:area_destino,:area_origen,:tipo)");
        
        $sentencia->bindParam(":codigo",$codigo);
        $sentencia->bindParam(":remitente",$remitente);
        $sentencia->bindParam(":asunto",$asunto);

        $fecha = new DateTime();
        $nombre_archivo = ($archivo!="")?$fecha->getTimestamp()."_".$_FILES['archivo']['name']:"";
        $tmp_archivo = $_FILES['archivo']['tmp_name'];
        if ($tmp_archivo!='') {
            move_uploaded_file($tmp_archivo,"../../documents/".$nombre_archivo);
        }
        $sentencia->bindParam(":archivo",$nombre_archivo);

        $sentencia->bindParam(":fecha_envio",$fecha_envio);
        $sentencia->bindParam(":estado",$estado);
        $sentencia->bindParam(":area_destino",$area_destino);
        $sentencia->bindParam(":area_origen",$area_origen);
        $sentencia->bindParam(":tipo",$tipo);
        $sentencia->execute();
        $msn = "Registro agregado";
        
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
                header("location:".$ruta_base."secciones/contabilidad_academica/enviados.php?msn=".$msn);
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
