<?php 
    include("../../templates/header_secretaria_academica.php");
    include("../../controllers/secretarias/mostrar_enviados.php");
?>

    <section>
        <h1>ver docs enviados secretaria academica</h1>
        <a href="<?php echo $ulr_base; ?>secciones/secretaria_academica/redactar.php">Redactar nuevo</a>
       

        <table border="1" id="tabla_id">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Codigo</th>
                    <th>Remitente</th>
                    <th>Asunto</th>
                    <th>Archivo</th>
                    <th>Fecha_envio</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Area de destino</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach($lista_areas as $registro){ ?>
                <tr>
                    <td><?php echo $registro['id_doc']; ?></td>
                    <td><?php echo $registro['codigo']; ?></td>
                    <td><?php echo $registro['remitente']; ?></td>
                    <td><?php echo $registro['asunto']; ?></td>
                    <td><?php echo $registro['archivo']; ?></td>
                    <td><?php echo $registro['fecha_envio']; ?></td>
                    <td><?php echo $registro['tipo']; ?></td>
                    <td><?php echo $registro['estado']; ?></td>
                    <td><?php echo $registro['area_destino']; ?></td>
                    <td>
                        <a href="<?php echo $ulr_base; ?>secciones/secretaria_academica/editar_enviados.php?txtID=<?php echo $registro['id_doc']; ?>">
                            Editar
                        </a> | 
                        <a href="javascript:borrar(<?php echo $registro['id_doc']; ?>)">
                            Eliminar
                        </a>
                    </td>
                </tr>
                <?php } ?>

            </tbody>
        </table>

    </section>

<?php include("../../templates/footer.php"); ?>