

<?php include("../../templates/header_unidad_academica.php"); ?>

<?php
    include("../../bd.php");
    include("../../controllers/secretarias/mostrar_tipos_doc.php");
    include("../../controllers/admin/mostrar_areas.php");

    include("../../controllers/secretarias/editar_enviados.php");
?>

    <section >
        <h1 class="white_mode">editar documento area unidad academica</h1>
        <div class="form__container">
        
            <?php include("../../mains/main_editar_enviados.php"); ?>

                <a href="<?php echo $ulr_base; ?>secciones/unidad_academica/enviados.php">Cancelar</a>
            </form>

        </div>
    </section>

<?php include("../../templates/footer.php"); ?>