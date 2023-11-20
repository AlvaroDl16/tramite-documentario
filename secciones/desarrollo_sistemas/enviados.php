<?php include("../../templates/header_dsi.php"); ?>

<?php
    include("../../bd.php");
    $area_origen = $_SESSION['area_cargo'];
    $consulta = $conexion->prepare("SELECT * FROM documentos, tipo_documento
    WHERE area_origen='$area_origen' AND documentos.id_tipo=tipo_documento.id_tipo
    ORDER BY documentos.id_doc DESC");
    $consulta->execute();
    $lista_areas = $consulta->fetchAll(PDO::FETCH_ASSOC);

?>

    <section class="container_mains">

        <h1 class="white_mode">Documentos enviados</h1>
<br>
    <div>
        <a class="cta" href="<?php echo $ulr_base; ?>secciones/desarrollo_sistemas/redactar.php">Redactar nuevo</a>
    </div><br>

        <table class="table_enviados">
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
                    <th>Destino</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach($lista_areas as $registro){ ?>
                <tr class="white_mode">
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
                        <a class="ctas cta_editar" href="
                        <?php echo $ulr_base; ?>secciones/desarrollo_sistemas/editar_enviados.php?txtID=<?php echo $registro['id_doc']; ?>">
                        <i class="fa-regular fa-pen-to-square"></i>
                        </a>| 
                        <a class="ctas cta_eliminar" href="<?php echo $ulr_base; ?>controllers/secretarias/eliminar_enviados.php?txtID=<?php echo $registro['id_doc']; ?>">
                        <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php } ?>

            </tbody>
        </table>

    </section>

<?php include("../../templates/footer.php"); ?>