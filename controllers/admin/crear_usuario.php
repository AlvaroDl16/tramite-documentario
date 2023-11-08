<?php 

    $ruta_base = "http://localhost/sistema_suiza/";
    include("../../bd.php");

    if($_POST){
        // print_r($_POST);
        $usuario = $_POST['xuser'];
        $pass = $_POST['pass'];
        $nombres_usuario = $_POST['nombres_usuario'];
        $apellidos_usuario = $_POST['apellidos_usuario'];
        $direccion_usuario = $_POST['direccion_usuario'];
        $telefono_usuario = $_POST['telefono_usuario'];
        $dni_usuario = $_POST['dni_usuario'];
        $sexo_usuario = $_POST['sexo_usuario'];
        $opciones_rol = $_POST['opciones_rol'];
        $opciones_area = $_POST['opciones_area'];
        $foto = $_FILES['foto']['name'];

        $sentencia = $conexion->prepare("INSERT INTO `usuarios` 
        (`id_usuario`, `username`, `password`, `nombres`, `apellidos`, `direccion`, `telefono`, `dni`, `sexo`, `id_rol`, `id_area`,`foto`) 
        VALUES (NULL, :xuser, :pass, :nombres_usuario, :apellidos_usuario, :direccion_usuario, :telefono_usuario, :dni_usuario, :sexo_usuario, :opciones_rol, :opciones_area, :foto)");
        $sentencia->bindParam(":xuser", $usuario);
        $sentencia->bindParam(":pass", $pass);
        $sentencia->bindParam(":nombres_usuario", $nombres_usuario);
        $sentencia->bindParam(":apellidos_usuario", $apellidos_usuario);
        $sentencia->bindParam(":direccion_usuario", $direccion_usuario);
        $sentencia->bindParam(":telefono_usuario", $telefono_usuario);
        $sentencia->bindParam(":dni_usuario", $dni_usuario);
        $sentencia->bindParam(":sexo_usuario", $sexo_usuario);
        $sentencia->bindParam(":opciones_rol", $opciones_rol);
        $sentencia->bindParam(":opciones_area", $opciones_area);

        $fecha = new DateTime();
        $nombre_foto = ($foto!="")?$fecha->getTimestamp()."_".$_FILES['foto']['name']:"";
        $tmp_foto = $_FILES['foto']['tmp_name'];
        if ($tmp_foto!='') {
            move_uploaded_file($tmp_foto,"../../images/".$nombre_foto);
        }
        $sentencia->bindParam(":foto", $nombre_foto);

        $sentencia->execute();
        header("Location:".$ruta_base."secciones/administrador/usuarios.php");

    }

    include("mostrar_areas.php");

    include("mostrar_roles.php");

?>