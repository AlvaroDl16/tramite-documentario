<?php 

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

    }

    $consulta = $conexion->prepare("SELECT * FROM areas_administrativas");
    $consulta->execute();
    $lista_areas = $consulta->fetchAll(PDO::FETCH_ASSOC);

    $consulta2 = $conexion->prepare("SELECT * FROM roles");
    $consulta2->execute();
    $lista_roles = $consulta2->fetchAll(PDO::FETCH_ASSOC);

?>
<?php include("../../templates/header.php"); ?>

    <section>
        <form  method="post">
            <h3>Datos del usuario</h3>
            <label for="xuser"><input type="text" placeholder="Usuario" 
            name="xuser"></label>
            <label for="pass"><input type="text" placeholder="Contraseña" 
            name="pass"></label>
            <label for="nombres_usuario"><input type="text" placeholder="Nombres" 
            name="nombres_usuario"></label>
            <label for="apellidos_usuario"><input type="text" placeholder="Apellidos" 
            name="apellidos_usuario"></label> <br>
            <label for="direccion_usuario"><input type="text" placeholder="Direccion" 
            name="direccion_usuario"></label> 
            <label for="telefono_usuario"><input type="text" placeholder="Telefono" 
            name="telefono_usuario"></label> 
            <label for="dni_usuario"><input type="text" placeholder="DNI" 
            name="dni_usuario"></label> 

            <label for="sexo_usuario">Sexo:
                <select name="sexo_usuario" id="sexo_usuario">
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                </select>
            </label><br>

            <label for="rol_usuario">Rol:
                <select name="opciones_rol" id="opciones_rol">
                    <?php foreach($lista_roles as $roles){ ?>
                        <option value="<?php echo $roles['id_rol']; ?>"><?php echo $roles['rol']; ?></option>
                    <?php } ?>
                </select>
            </label>

            <label for="area_usuario">Area:
                <select name="opciones_area" id="opciones_area">
                    <?php foreach($lista_areas as $area){ ?>
                        <option value="<?php echo $area['id_area']; ?>"><?php echo $area['nombre_area']; ?></option>
                    <?php } ?>
                </select>
            </label>
            <input type="submit" value="Agregar">
        </form>
    </section>

<?php include("../../templates/footer.php") ?>