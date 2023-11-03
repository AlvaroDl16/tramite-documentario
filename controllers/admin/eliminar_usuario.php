<?php 

    
    $ruta_base = "http://localhost/sistema_suiza/";
    include("../../bd.php");

    if (isset($_GET['txtID'])) {
        $txtID=$_GET['txtID'];

        $proceso = $conexion->prepare("DELETE FROM usuarios WHERE id_usuario=:id_usuario");
        $proceso->bindParam(":id_usuario", $txtID);
        $proceso->execute();
        header("Location:".$ruta_base."secciones/administrador/usuarios.php");
    }
?>