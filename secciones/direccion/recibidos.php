<?php include("../../templates/header_direccion.php"); ?>

<?php
    include("../../bd.php");
    $area_destino = $_SESSION['area_cargo'];
    $consulta = $conexion->prepare("SELECT * FROM documentos
    WHERE area_destino='$area_destino'");
    $consulta->execute();
    $lista_areas = $consulta->fetchAll(PDO::FETCH_ASSOC);

?>

    <section>
        <h1>docs recibidos area direccion</h1>

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
                    <th>Area de origen</th>
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
                    <td><?php echo $registro['area_origen']; ?></td>
                    <td>Aceptar | 
                        <a href="<?php echo $ulr_base; ?>controllers/secretarias/rechazar.php?txtID=<?php echo $registro['id_doc']; ?>">
                            Rechazar
                        </a>
                    </td>
                </tr>
                <?php } ?>

            </tbody>
        </table>

    </section>

<?php include("../../templates/footer.php"); ?>