<?php

    include("../../bd.php");
    $nombre = $_POST['txtnombre'];
    $apellido = $_POST['txtapellido'];
    $rol = $_POST['rol'];
    $area = $_POST['area'];

    $enviar = $conexion->prepare("INSERT INTO `usuarios` (`id`, `user`, `password`, `rol`, `area_cargo`) 
    VALUES (NULL,:txtnombre,:txtapellido,:rol,:area)");

    $enviar->bindParam(':txtnombre',$nombre);
    $enviar->bindParam(':txtapellido',$apellido);
    $enviar->bindParam(':rol',$rol);
    $enviar->bindParam(':area',$area);
    $enviar->execute();

    header("location: usuarios.php");

?>