<?php include("../../templates/header_direccion.php"); ?>

<?php
    include("../../bd.php");
    $area_origen = $_SESSION['area_cargo'];
    $consulta = $conexion->prepare("SELECT * FROM documentos
    WHERE area_origen='$area_origen'");
    $consulta->execute();
    $lista_areas = $consulta->fetchAll(PDO::FETCH_ASSOC);

?>

    <section>
        <h1>ver docs enviados direccion</h1>
        <a href="<?php echo $ulr_base; ?>secciones/direccion/redactar.php">Redactar nuevo</a>
       

        <table border="1">
            <thead>
                <tr>
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
                    <td><?php echo $registro['codigo']; ?></td>
                    <td><?php echo $registro['remitente']; ?></td>
                    <td><?php echo $registro['asunto']; ?></td>
                    <td><?php echo $registro['archivo']; ?></td>
                    <td><?php echo $registro['fecha_envio']; ?></td>
                    <td><?php echo $registro['id_tipo']; ?></td>
                    <td><?php echo $registro['estado']; ?></td>
                    <td><?php echo $registro['area_destino']; ?></td>
                    <td>
                        Editar | Eliminar
                    </td>
                </tr>
                <?php } ?>

            </tbody>
        </table>

    </section>

<?php include("../../templates/footer.php"); ?>