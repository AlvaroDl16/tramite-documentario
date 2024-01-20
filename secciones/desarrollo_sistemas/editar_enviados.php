<?php 
    include("../../templates/header_dsi.php"); 
    include_once("../../bd.php");
    include("../../controllers/secretarias/mostrar_tipos_doc.php");
    include("../../controllers/admin/mostrar_areas.php");
    // hacemos la consulta para darles los valores a los inputs
    if (isset($_GET['txtID'])) {
        $txtID=$_GET['txtID'];

        $consulta = $conexion->prepare("SELECT * FROM documentos WHERE id_doc=:id_doc");
        $consulta->bindParam(":id_doc", $txtID);
        $consulta->execute();
        $lista = $consulta->fetch(PDO::FETCH_LAZY);
    }
?>

    <section >
        <h1 class="white_mode">editar documento area dsi</h1>
        <div class="form__container">
        
            <?php include("../../mains/main_editar_enviados.php"); ?>

                <a href="<?php echo $ulr_base; ?>secciones/desarrollo_sistemas/enviados.php">Cancelar</a>
            </form>

        </div>
    </section>

<?php include("../../templates/footer.php"); ?>