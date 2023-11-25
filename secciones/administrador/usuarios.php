<?php 
    include("../../controllers/admin/leer_usuarios.php");
    include("../../templates/header.php");
?>

    <section>
        <a href="<?php echo $ulr_base; ?>secciones/administrador/crear_usuario.php">Crear nuevo usuario</a>
        <table id="tabla_id">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Usuario</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Dirección</th>
                    <th>Genero</th>
                    <th>Rol</th>
                    <th>Area</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach($lista_usuarios as $registro){ ?>
                    <tr>
                        <td><?php echo $registro['id_usuario']; ?></td>
                        <td><?php echo $registro['username']; ?></td>
                        <td><?php echo $registro['nombres']; ?></td>
                        <td><?php echo $registro['apellidos']; ?></td>
                        <td><?php echo $registro['direccion']; ?></td>
                        <td><?php echo $registro['sexo']; ?></td>
                        <td><?php echo $registro['rol']; ?></td>
                        <td><?php echo $registro['nombre_area']; ?></td>
                        <td>
                            <a href="<?php echo $ulr_base; ?>secciones/administrador/editar_usuario.php?txtID=<?php echo $registro['id_usuario']; ?>">
                            EDITAR</a> 
                            | 
                            <a href="javascript:borrar_usuario(<?php echo $registro['id_usuario']; ?>)">
                            ELIMINAR</a>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </section>

<?php include("../../templates/footer.php") ?>