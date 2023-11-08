<?php 

    
    $ruta_base = "http://localhost/sistema_suiza/";
    include("../../bd.php");

    if (isset($_GET['txtID'])) {
        $txtID=$_GET['txtID'];

        $consulta = $conexion->prepare("SELECT foto FROM usuarios WHERE id_usuario=:id_usuario");
        $consulta->bindParam(":id_usuario", $txtID);
        $consulta->execute();
        $regsitro_foto = $consulta->fetch(PDO::FETCH_LAZY);

        if (isset($regsitro_foto['foto']) && $regsitro_foto['foto']!="") {
            if (file_exists("../../images/".$regsitro_foto['foto'])) {
                unlink("../../images/".$regsitro_foto['foto']);
            }
        }

        $proceso = $conexion->prepare("DELETE FROM usuarios WHERE id_usuario=:id_usuario");
        $proceso->bindParam(":id_usuario", $txtID);
        $proceso->execute();
        header("Location:".$ruta_base."secciones/administrador/usuarios.php");
    }
?>