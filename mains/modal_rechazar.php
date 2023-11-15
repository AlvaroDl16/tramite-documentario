<div class="modal__container_rechazar">
    <section class="modal__rechazar">
        <h2>Rechazar documento</h2>
        <form action="<?php echo $ulr_base;?>controllers/secretarias/rechazar.php?" method="post">
            <label>Motivo:
                <textarea name="comentario_rechazar" 
                cols="40" rows="5" placeholder="Escribe tu motivo aqui...">
                </textarea>
            </label>

            <label>Id:
            <input type="text" name="txtID" readOnly placeholder="Id" id="input_id_rechazar">
            </label>
            
            <button type="submit">Aceptar</button>

        </form>
            <button id="cancelar_modal_rechazo">Cancelar</button>
    </section>
</div>