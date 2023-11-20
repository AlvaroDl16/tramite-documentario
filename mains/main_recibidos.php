<?php
    include("../../bd.php");
    $area_destino = $_SESSION['area_cargo'];
    $consulta = $conexion->prepare("SELECT * FROM documentos, tipo_documento
    WHERE area_destino='$area_destino' AND documentos.id_tipo=tipo_documento.id_tipo");
    $consulta->execute();
    $lista_areas = $consulta->fetchAll(PDO::FETCH_ASSOC);

?>


        <table border="1">
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
                    <th>Origen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach($lista_areas as $registro){ ?>
                    
                <?php if ($registro['estado'] == "pendiente" || $registro['estado'] == "En proceso") { ?>

                    <tr>
                        <td class="doc_id"><?php echo $registro['id_doc']; ?></td>
                        <td><?php echo $registro['codigo']; ?></td>
                        <td><?php echo $registro['remitente']; ?></td>
                        <td><?php echo $registro['asunto']; ?></td>
                        <td><?php echo $registro['archivo']; ?></td>
                        <td><?php echo $registro['fecha_envio']; ?></td>
                        <td><?php echo $registro['tipo']; ?></td>
                        <td>
                            <?php
                            if($registro['estado']=="En proceso"){
                                echo "pendiente";
                            }else{
                                echo $registro['estado']; 
                            }
                             ?>
                        </td>
                        <td><?php echo $registro['area_origen']; ?></td>
                        <td>
                            <a href="<?php echo $ulr_base; ?>documents/<?php echo $registro['archivo']; ?>"
                                target="_blank">
                                <i class="fa-regular fa-eye"></i>
                            </a> 
                            <a href="<?php echo $ulr_base; ?>controllers/secretarias/aceptar.php?txtID=<?php echo $registro['id_doc']; ?>">
                                <i class="fa-solid fa-check"></i>
                            </a>  
                            <a href="#" class="modal_despacho" id="<?php echo $registro['id_doc']; ?>">
                                <i class="fa-regular fa-share-from-square"></i>
                            </a>
                            <a href="#" id="<?php echo $registro['id_doc']; ?>" class="modal_rechazo">
                                <i class="fa-solid fa-x"></i>
                            </a>
                        </td>
                    </tr>

                <?php } ?>

                <?php } ?>

                

            </tbody>
        </table>