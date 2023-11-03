<?php 
    
    include("../../bd.php");

    $consulta = $conexion->prepare("SELECT * FROM usuarios 
    INNER JOIN roles 
    ON usuarios.id_rol=roles.id_rol");
    $consulta->execute();
    $lista_usuarios = $consulta->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include("../../templates/header.php");?>

    <section>
        <a href="<?php echo $ulr_base; ?>secciones/administrador/crear_usuario.php">Crear nuevo usuario</a>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Usuario</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Rol</th>
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
                        <td><?php echo $registro['rol']; ?></td>
                        <td>
                            <a href="<?php echo $ulr_base; ?>secciones/administrador/editar_usuario.php?txtID=<?php echo $registro['id_usuario']; ?>">
                            EDITAR</a> 
                            | 
                            <a href="<?php echo $ulr_base; ?>controllers/admin/eliminar_usuario.php?txtID=<?php echo $registro['id_usuario']; ?>">
                            ELIMINAR</a>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </section>

<?php include("../../templates/footer.php") ?>