<?php
    include_once("../../bd.php");
    $area = $_SESSION['area_cargo'];
    $consulta = $conexion->prepare("SELECT *, count(*) AS pendientes FROM documentos 
    WHERE area_destino='$area' AND estado='pendiente'");
    $consulta->execute();
    $num_pendientes = $consulta->fetch(PDO::FETCH_LAZY);

    $sentencia = $conexion->prepare("SELECT *, count(*) AS proceso FROM documentos 
    WHERE area_destino='$area' AND estado='En proceso'");
    $sentencia->execute();
    $num_proceso = $sentencia->fetch(PDO::FETCH_LAZY);

    // consultas para las cards

    $s_aceptados = $conexion->prepare("SELECT *, count(*) AS aceptados FROM documentos 
    WHERE area_origen='$area' AND estado='Aceptado'");
    $s_aceptados->execute();
    $num_aceptados = $s_aceptados->fetch(PDO::FETCH_LAZY);

    $s_aceptados2 = $conexion->prepare("SELECT *, count(*) AS aceptados2 FROM documentos 
    WHERE area_destino='$area' AND estado='Aceptado'");
    $s_aceptados2->execute();
    $num_aceptados2 = $s_aceptados2->fetch(PDO::FETCH_LAZY);

    $s_proceso = $conexion->prepare("SELECT *, count(*) AS en_proceso FROM documentos 
    WHERE area_origen='$area' AND estado='En proceso'");
    $s_proceso->execute();
    $num_en_proceso = $s_proceso->fetch(PDO::FETCH_LAZY);

    $s_rechazados = $conexion->prepare("SELECT *, count(*) AS rechazados FROM documentos 
    WHERE area_origen='$area' AND estado='rechazado'");
    $s_rechazados->execute();
    $num_rechazados = $s_rechazados->fetch(PDO::FETCH_LAZY);

    $s_rechazados2 = $conexion->prepare("SELECT *, count(*) AS rechazados2 FROM documentos 
    WHERE area_destino='$area' AND estado='rechazado'");
    $s_rechazados2->execute();
    $num_rechazados2 = $s_rechazados2->fetch(PDO::FETCH_LAZY);

    $s_enviados = $conexion->prepare("SELECT *, count(*) AS enviados FROM documentos 
    WHERE area_origen='$area'");
    $s_enviados->execute();
    $num_enviados = $s_enviados->fetch(PDO::FETCH_LAZY);

    $s_recibidos = $conexion->prepare("SELECT *, count(*) AS recibidos FROM documentos 
    WHERE area_destino='$area'");
    $s_recibidos->execute();
    $num_recibidos = $s_recibidos->fetch(PDO::FETCH_LAZY);

