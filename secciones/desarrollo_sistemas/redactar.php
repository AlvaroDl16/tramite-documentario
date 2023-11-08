

<?php include("../../templates/header_dsi.php"); ?>

<?php
    include("../../bd.php");
    include("../../controllers/secretarias/mostrar_tipos_doc.php");
    include("../../controllers/secretarias/redactar.php");
    include("../../controllers/admin/mostrar_areas.php");
?>

    <section >
        <h1 class="white_mode">enviar nuevo documento area dsi</h1>
        <div class="form__container">
        <h2>Formulario de envio</h2>

            <form method="post" enctype="multipart/form-data">
                <label>Codigo de documento: 
                    <input type="text" name="codigo" required>
                </label>
                
                <label>Remitente: 
                    <input type="text" name="remitente" required>
                </label>

                <label>Asunto: 
                    <input type="text" name="asunto" required>
                </label> <br>

                <label>Archivo: 
                    <input type="file" name="archivo" required>
                </label> 

                <label>Fecha de envio: 
                    <input type="date" name="fecha_envio" required>
                </label><br>

                    <input type="hidden" name="estado" value="pendiente">
                    <input type="hidden" name="area_origen" value="<?php echo $_SESSION['area_cargo']; ?>">

                <label>Tipo de documento 
                    <select name="tipo" required>
                        <option value="">seleccione el tipo de documento</option>
                        <?php foreach($lista_tipos as $tipo){ ?>
                            <option value="<?php echo $tipo['id_tipo']; ?>"><?php echo $tipo['tipo']; ?></option>
                        <?php } ?>
                    </select>
                </label>

                <label>Area de destino 
                    <select name="area_destino" required>
                        <option value="">seleccione el destino</option>
                        <?php foreach($lista_areas as $area){ ?>
                            <option value="<?php echo $area['nombre_area']; ?>"><?php echo $area['nombre_area']; ?></option>
                        <?php } ?>
                    </select>
                </label>
                
                <input type="submit" value="Enviar">
                <a href="<?php echo $ulr_base; ?>secciones/desarrollo_sistemas/index.php">Cancelar</a>
            </form>

        </div>
    </section>

<?php include("../../templates/footer.php"); ?>