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

        $sentencia = $conexion->prepare("INSERT INTO `usuarios` (`id_usuario`, `username`, `password`, `nombres`, `apellidos`, `direccion`, `telefono`, `dni`, `sexo`, `id_rol`, `id_area`) VALUES (NULL, :xuser, :pass, :nombres_usuario, :apellidos_usuario, :direccion_usuario, :telefono_usuario, :dni_usuario, :sexo_usuario, :opciones_rol, :opciones_area)");
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

        $sentencia->execute();
        header("Location:".$ruta_base."secciones/administrador/usuarios.php");

    }

    $consulta = $conexion->prepare("SELECT * FROM areas_administrativas");
    $consulta->execute();
    $lista_areas = $consulta->fetchAll(PDO::FETCH_ASSOC);

    $consulta2 = $conexion->prepare("SELECT * FROM roles");
    $consulta2->execute();
    $lista_roles = $consulta2->fetchAll(PDO::FETCH_ASSOC);

?>