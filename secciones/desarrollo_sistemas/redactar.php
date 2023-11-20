

<?php include("../../templates/header_dsi.php"); ?>

<?php
    include("../../bd.php");
    include("../../controllers/secretarias/mostrar_tipos_doc.php");
    include("../../controllers/secretarias/redactar.php");
    include("../../controllers/admin/mostrar_areas.php");
?>

    <section >
        
        
            <?php include("../../mains/main_redactar.php"); ?>

                    <a class="cta" href="<?php echo $ulr_base; ?>secciones/desarrollo_sistemas/index.php">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </section>

<?php include("../../templates/footer.php"); ?>