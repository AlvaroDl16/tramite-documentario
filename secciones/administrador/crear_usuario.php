<?php 
    include("../../controllers/admin/crear_usuario.php");
?>

<?php include("../../templates/header.php"); ?>

    <section>
        <form method="post">
            <h3>Datos del usuario</h3>
            <label for="xuser"><input type="text" placeholder="Usuario" 
            name="xuser" required></label>
            <label for="pass"><input type="text" placeholder="Contraseña" 
            name="pass" required></label>
            <label for="nombres_usuario"><input type="text" placeholder="Nombres" 
            name="nombres_usuario" required></label>
            <label for="apellidos_usuario"><input type="text" placeholder="Apellidos" 
            name="apellidos_usuario" required></label> <br>
            <label for="direccion_usuario"><input type="text" placeholder="Direccion" 
            name="direccion_usuario" required></label> 
            <label for="telefono_usuario"><input type="text" placeholder="Telefono" 
            name="telefono_usuario" required></label> 
            <label for="dni_usuario"><input type="text" placeholder="DNI" 
            name="dni_usuario" required></label> 

            <label for="sexo_usuario">Genero:
                <select name="sexo_usuario" id="sexo_usuario" required>
                        <option value="">Seleccione genero...</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                        <option value="F">39 tipos de gay</option>
                </select>
            </label><br>

            <label for="rol_usuario">Rol:
                <select name="opciones_rol" id="opciones_rol" required>
                    <option value="">Seleccione un rol...</option>
                    <?php foreach($lista_roles as $roles){ ?>
                        <option value="<?php echo $roles['id_rol']; ?>"><?php echo $roles['rol']; ?></option>
                    <?php } ?>
                </select>
            </label>

            <label for="area_usuario">Area:
                <select name="opciones_area" id="opciones_area" required>
                    <option value="">Seleccione area...</option>
                    <?php foreach($lista_areas as $area){ ?>
                        <option value="<?php echo $area['id_area']; ?>"><?php echo $area['nombre_area']; ?></option>
                    <?php } ?>
                </select>
            </label>
            <input type="submit" value="Agregar">
            <a href="<?php echo $ulr_base; ?>secciones/administrador/usuarios.php">Cancelar</a>
        </form>
    </section>

<?php include("../../templates/footer.php") ?>