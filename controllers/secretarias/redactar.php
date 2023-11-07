<?php 

    $ruta_base = "http://localhost/sistema_suiza/";
    include("../../bd.php");

    if($_POST){
        $codigo = $_POST['codigo'];
        $remitente = $_POST['remitente'];
        $asunto = $_POST['asunto'];
        $archivo = $_POST['archivo'];
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
        $sentencia->bindParam(":archivo",$archivo);
        $sentencia->bindParam(":fecha_envio",$fecha_envio);
        $sentencia->bindParam(":estado",$estado);
        $sentencia->bindParam(":area_destino",$area_destino);
        $sentencia->bindParam(":area_origen",$area_origen);
        $sentencia->bindParam(":tipo",$tipo);

        $sentencia->execute();
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