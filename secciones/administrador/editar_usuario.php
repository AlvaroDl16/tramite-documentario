<?php 
    include("../../controllers/admin/editar_usuario.php");
    include("../../templates/header.php");
?>

    <section>
        <form method="post" enctype="multipart/form-data">
            <h3>Datos del usuario</h3>
            <label>Id:
                <input type="text" name="txtID" readOnly placeholder="Id" value="<?php echo $txtID;?>">
            </label>

            <label>
                <input type="text" placeholder="Usuario" 
                name="xuser" required value="<?php echo $lista['username'];?>">
            </label>

            <label>
                <input type="text" placeholder="Contraseña" 
                name="pass" required value="<?php echo $lista['password'];?>">
            </label>

            <label>
                <input type="text" placeholder="Nombres" 
                name="nombres_usuario" required value="<?php echo $lista['nombres'];?>">
            </label>

            <label>
                <input type="text" placeholder="Apellidos" 
                name="apellidos_usuario" required value="<?php echo $lista['apellidos'];?>">
            </label> <br>

            <label>
                <input type="text" placeholder="Direccion" 
                name="direccion_usuario" required value="<?php echo $lista['direccion'];?>">
            </label> 

            <label>
                <input type="text" placeholder="Telefono" 
                name="telefono_usuario" required value="<?php echo $lista['telefono'];?>">
            </label> 

            <label>
                <input type="text" placeholder="DNI" 
                name="dni_usuario" required value="<?php echo $lista['dni'];?>">
            </label> 

            <label for="sexo_usuario">Genero:
                "<?php echo $lista['sexo'] ?>"
                <select name="sexo_usuario" id="sexo_usuario" required>
                        <option  value="">Seleccione genero...</option>
                        <option  value="M">Masculino</option>
                        <option  value="F">Femenino</option>
                        <option  value="F">39 tipos de gay</option>
                </select>
            </label><br>

            <label for="rol_usuario">Rol:
                "<?php echo $lista['id_rol'] ?>"
                <select name="opciones_rol" id="opciones_rol" required>
                    <option  value="">Seleccione un rol...</option>
                    <?php foreach($lista_roles as $roles){ ?>
                        <option <?php echo ($lista['id_rol']==$roles['id_rol'])?"selected":""; ?> value="<?php echo $roles['id_rol']; ?>"><?php echo $roles['rol']; ?></option>
                    <?php } ?>
                </select>
            </label>

            <label for="area_usuario">Area:
                "<?php echo $lista['id_area']; ?>"
                <select name="opciones_area" id="opciones_area" required>
                    <option value="">Seleccione area...</option>
                    <?php foreach($lista_areas as $area){ ?>
                        <option <?php echo ($lista['id_area']==$area['id_area'])?"selected":""; ?> value="<?php echo $area['id_area']; ?>"><?php echo $area['nombre_area']; ?></option>
                    <?php } ?>
                </select>
            </label>

            <label>Foto:
                <img src="<?php echo $ulr_base."images/".$lista['foto'];?>" 
                width="80px">
                <input type="file" name="foto" >
            </label>

            <input type="submit" value="Actualizar">
            <a href="<?php echo $ulr_base; ?>secciones/administrador/usuarios.php">Cancelar</a>
        </form>
    </section>


<?php include("../../templates/footer.php") ?>