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
