<h2>Formulario de Edicion</h2>

            <form action="<?php echo $ulr_base?>controllers/secretarias/editar_enviados.php" method="post" enctype="multipart/form-data">
                <label>
                    <input type="text" name="txtID" hidden readOnly placeholder="Id" value="<?php echo $txtID;?>">
                </label>

                <label>Codigo de documento: 
                    <input type="text" name="codigo" 
                    value="<?php echo $lista['codigo']?>" required>
                </label>
                
                <label>Remitente: 
                    <input type="text" name="remitente"
                    value="<?php echo $lista['remitente']?>" required>
                </label>

                <label>Asunto: 
                    <input type="text" name="asunto"
                    value="<?php echo $lista['asunto']?>" required>
                </label> <br>

                <label>Archivo: 
                    <a href="<?php echo $ulr_base?>documents/<?php echo $lista['archivo']?>"
                        target="_blank">"<?php echo $lista['archivo']?>"</a> 
                    <input type="file" name="archivo" >
                </label> 

                <label>Fecha de envio: 
                    <input type="date" name="fecha_envio"
                    value="<?php echo $lista['fecha_envio']?>" required>
                </label><br>

                    <input type="hidden" name="estado" value="pendiente">
                    <input type="hidden" name="area_origen" value="<?php echo $_SESSION['area_cargo']; ?>">

                <label>Tipo de documento 
                    <select name="tipo" required>
                        <option value="">seleccione el tipo de documento</option>
                        <?php foreach($lista_tipos as $tipo){ ?>
                            <option <?php echo ($lista['id_tipo']==$tipo['id_tipo'])?"selected":""; ?>
                            value="<?php echo $tipo['id_tipo']; ?>"><?php echo $tipo['tipo']; ?></option>
                        <?php } ?>
                    </select>
                </label>

                <label>Area de destino 
                    <select name="area_destino" required>
                        <option value="">seleccione el destino</option>
                        <?php foreach($lista_areas as $area){ ?>
                            <option <?php echo ($lista['area_destino']==$area['nombre_area'])?"selected":""; ?>
                            value="<?php echo $area['nombre_area']; ?>"><?php echo $area['nombre_area']; ?></option>
                        <?php } ?>
                    </select>
                </label>
                
                <input type="submit" value="Enviar">