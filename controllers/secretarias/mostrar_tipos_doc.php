<?php
    $consulta_tipo = $conexion->prepare("SELECT * FROM tipo_documento");
    $consulta_tipo->execute();
    $lista_tipos = $consulta_tipo->fetchAll(PDO::FETCH_ASSOC);
