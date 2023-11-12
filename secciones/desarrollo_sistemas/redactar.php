

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
        
            <?php include("../../mains/main_redactar.php"); ?>

                <a href="<?php echo $ulr_base; ?>secciones/desarrollo_sistemas/index.php">Cancelar</a>
            </form>

        </div>
    </section>

<?php include("../../templates/footer.php"); ?>