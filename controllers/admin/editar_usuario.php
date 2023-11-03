<?php 

    $ruta_base = "http://localhost/sistema_suiza/";
    include("../../bd.php");

    if (isset($_GET['txtID'])) {
        $txtID=$_GET['txtID'];

        $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE id_usuario=:id_usuario");
        $consulta->bindParam(":id_usuario", $txtID);
        $consulta->execute();
        $lista = $consulta->fetch(PDO::FETCH_LAZY);

        $consulta_area = $conexion->prepare("SELECT * FROM areas_administrativas");
        $consulta_area->execute();
        $lista_areas = $consulta_area->fetchAll(PDO::FETCH_ASSOC);

        $consulta_rol = $conexion->prepare("SELECT * FROM roles");
        $consulta_rol->execute();
        $lista_roles = $consulta_rol->fetchAll(PDO::FETCH_ASSOC);
    }

    if ($_POST) {
        $id = $_POST['txtID'];
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

        $sentencia = $conexion->prepare("UPDATE `usuarios`
        SET 
         username=:xuser, password=:pass, nombres=:nombres_usuario, apellidos=:apellidos_usuario,
         direccion=:direccion_usuario, telefono=:telefono_usuario,
         dni=:dni_usuario, sexo=:sexo_usuario, id_rol=:opciones_rol, id_area=:opciones_area
         WHERE id_usuario=:id_usuario");
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
        $sentencia->bindParam(":id_usuario", $id);
        $sentencia->execute();

        header("Location:".$ruta_base."secciones/administrador/usuarios.php");
    }
    
    
?>