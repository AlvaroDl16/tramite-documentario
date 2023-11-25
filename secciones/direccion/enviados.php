<?php 
    include("../../templates/header_direccion.php");
    include("../../controllers/secretarias/mostrar_enviados.php");
?>

<section class="container_mains">

<h1 class="white_mode">Documentos enviados</h1>
<br>
<div>
<a class="cta" href="<?php echo $ulr_base; ?>secciones/direccion/redactar.php">Redactar nuevo</a>
</div><br>

<table class="table_enviados" id="tabla_id">
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
                <?php echo $ulr_base; ?>secciones/direccion/editar_enviados.php?txtID=<?php echo $registro['id_doc']; ?>">
                <i class="fa-regular fa-pen-to-square"></i>
                </a>| 
                <a class="ctas cta_eliminar" href="javascript:borrar(<?php echo $registro['id_doc']; ?>)">
                <i class="fa-solid fa-trash"></i>
                </a>
            </td>
        </tr>
        <?php } ?>

    </tbody>
</table>

</section>

<?php include("../../templates/footer.php"); ?>