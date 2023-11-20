<div class="modal__container_rechazar">
    <section class="modal__rechazar">
        <h2 class="modal_title white_mode">Rechazar documento</h2>
        <form action="<?php echo $ulr_base;?>controllers/secretarias/rechazar.php?" 
        method="post" class="form_modal">
            <label class="white_mode">Motivo:
                <textarea class="select_areas white_mode" name="comentario_rechazar" 
                cols="40" rows="5" 
                placeholder="Escribe tu motivo aqui..." required>
                </textarea>
            </label>

            <label>
            <input type="text" name="txtID" readOnly placeholder="Id" 
            id="input_id_rechazar" hidden>
            </label>
            
            <button class="btn_despacho" type="submit">Aceptar</button>

        </form>
        <div class="cancelar_container">  
            <button class="btn_cancelar2 btn_cancelar white_mode" id="cancelar_modal_rechazo">Cancelar</button>
        </div>  
    </section>
</div>