<?php
    $consulta_rol = $conexion->prepare("SELECT * FROM roles");
    $consulta_rol->execute();
    $lista_roles = $consulta_rol->fetchAll(PDO::FETCH_ASSOC);
