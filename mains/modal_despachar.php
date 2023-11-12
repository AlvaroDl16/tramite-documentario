
<?php
    include("../../bd.php");
    $consulta_area = $conexion->prepare("SELECT * FROM areas_administrativas");
    $consulta_area->execute();
    $lista_areas = $consulta_area->fetchAll(PDO::FETCH_ASSOC);
    ?>
<div class="modal__container">
<section class="modal_despachar">
    
    <div>
        <h2>Despachar documento</h2>
    </div>
    <div>
        <form action="<?php echo $ulr_base;?>/controllers/secretarias/despachar.php?" method="post">
        <label>Area a despachar 
            <select name="area_despacho" required>
                <option value="">seleccione area</option>
                <?php foreach($lista_areas as $area){ ?>
                    <option value="<?php echo $area['nombre_area']; ?>"><?php echo $area['nombre_area']; ?></option>
                <?php } ?>
            </select>
        </label>
        <label>Id:
            <input type="text" name="txtID" readOnly placeholder="Id" value="<?php echo $registro['id_doc']; ?>">
        </label>
        <button type="submit">Despachar</button><button id="cancelar_modal">Cancelar</button>
        </form>
    </div>
</section>
</div>