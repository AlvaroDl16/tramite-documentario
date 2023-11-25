<div class="redactar__container container_mains">
    <figure class="figure_container">
        <img class="figure_img" src="<?php echo $ulr_base; ?>images/send_document.svg" alt="">
    </figure>

    <form class="form_redactar" action="<?php echo $ulr_base; ?>controllers/secretarias/redactar.php" method="post" enctype="multipart/form-data">
    <h2 class="white_mode">Redacción de documentos</h2>
    <div class="inputs_container">
            
        <div class="input_item">
            <div>
                <label class="white_mode" class="white_mode" for="xcodigo">Código</label>
                <input type="text" name="codigo" id="xcodigo" class="inputs" required>
            </div>

            <div>
                <label for="xremitente" class="white_mode">Remitente</label>
                <input type="text" name="remitente" id="xremitente" class="inputs" required>
            </div>
        </div>
        
        <div>
            <div>
                <label class="white_mode" for="xasunto">Asunto</label> 
            </div>
            <div>
                <input type="text" name="asunto" id="xasunto" class="inputs" required>
            </div>
        </div>

        <div class="input_item">
            <div>
                <label class="white_mode" for="xarchivo" >Subir archivo</label> 
                <input type="file" id="xarchivo" name="archivo" class="file_input inputs" required>
            </div>

            <div>
                <label class="white_mode" for="xfecha">Fecha</label>
                <input type="date" id="xfecha" name="fecha_envio" class="inputs" required>
            </div>
        </div>

            <input type="hidden" name="estado" value="pendiente">
            <input type="hidden" name="area_origen" value="<?php echo $_SESSION['area_cargo']; ?>">

        <div>
            <div>
                <label class="white_mode" for="xtipo">Tipo</label>
            </div>

            <div>
                <select name="tipo" id="xtipo" class="inputs select_areas" required>
                    <option class="white_mode" value="">seleccione el tipo de documento</option>
                    <?php foreach($lista_tipos as $tipo){ ?>
                        <option value="<?php echo $tipo['id_tipo']; ?>"><?php echo $tipo['tipo']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div>
            <div>
                <label class="white_mode" for="xdestino">Destino</label>
            </div> 

            <div>
                <select name="area_destino" id="xdestino" class="inputs select_areas" required>
                    <option value="">seleccione el destino</option>
                    <?php foreach($lista_areas as $area){ ?>
                        <?php if($area['nombre_area']!=$_SESSION['area_cargo']){ ?>
                        <option value="<?php echo $area['nombre_area']; ?>"><?php echo $area['nombre_area']; ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="btns">
        <input class="btn_despacho" type="submit" value="Enviar">