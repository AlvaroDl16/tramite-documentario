<?php 
    
    include("../../bd.php");

    $consulta = $conexion->prepare("SELECT * FROM usuarios,roles,areas_administrativas 
    WHERE usuarios.id_rol=roles.id_rol AND usuarios.id_area=areas_administrativas.id_area");
    $consulta->execute();
    $lista_usuarios = $consulta->fetchAll(PDO::FETCH_ASSOC);

?>