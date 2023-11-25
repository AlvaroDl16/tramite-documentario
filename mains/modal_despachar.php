<?php
    include_once("../../bd.php");
    $consulta_area = $conexion->prepare("SELECT * FROM areas_administrativas");
    $consulta_area->execute();
    $lista_areas = $consulta_area->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="modal__container">
<section class="modal_despachar">
    
    <div>
        <h2 class="modal_title white_mode">Despachar documento</h2>
    </div>
    <div>
        <form action="<?php echo $ulr_base;?>controllers/secretarias/despachar.php?"
         method="post" class="form_modal">
        <div>
        <label class="areas_container white_mode"><div>Despachar a:</div>
            <div>
            <select class="select_areas white_mode" name="area_despacho" required>
                <option  value="">seleccione area...</option>
                <?php foreach($lista_areas as $area){
                        if($area['nombre_area']!=$_SESSION['area_cargo']){ 
                ?>
                    <option value="<?php echo $area['nombre_area']; ?>"><?php echo $area['nombre_area']; ?></option>
                <?php }  } ?>
            </select>
            </div>
        </label>
        </div>
        <label>
            <input type="text" name="txtID" readOnly placeholder="Id" id="input_id" hidden>
        </label>
        <div class="buttons_modal">
            <button class="btn_despacho" type="submit">Despachar</button>
            <span class="btn_cancelar white_mode" id="cancelar_modal_despacho">Cancelar</span>
        </div>
        </form>
        <div>
            </div>
    </div>
</section>
</div>
