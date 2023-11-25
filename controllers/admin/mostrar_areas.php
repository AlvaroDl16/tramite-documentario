<?php
    $consulta_area = $conexion->prepare("SELECT * FROM areas_administrativas");
    $consulta_area->execute();
    $lista_areas = $consulta_area->fetchAll(PDO::FETCH_ASSOC);
