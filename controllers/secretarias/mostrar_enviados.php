<?php
    include_once("../../bd.php");
    $area_origen = $_SESSION['area_cargo'];
    $consulta = $conexion->prepare("SELECT * FROM documentos, tipo_documento
    WHERE area_origen='$area_origen' AND documentos.id_tipo=tipo_documento.id_tipo
    ORDER BY documentos.id_doc DESC");
    $consulta->execute();
    $lista_areas = $consulta->fetchAll(PDO::FETCH_ASSOC);
