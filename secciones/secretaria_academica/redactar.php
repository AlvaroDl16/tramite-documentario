

<?php include("../../templates/header_secretaria_academica.php"); ?>

<?php
    include("../../bd.php");
    include("../../controllers/secretarias/mostrar_tipos_doc.php");
    include("../../controllers/secretarias/redactar.php");
    include("../../controllers/admin/mostrar_areas.php");
?>

<section >
        
            <?php include("../../mains/main_redactar.php"); ?>

                <a href="<?php echo $ulr_base; ?>secciones/secretaria_academica/index.php">Cancelar</a>
            </form>

        </div>
    </section>

<?php include("../../templates/footer.php"); ?>