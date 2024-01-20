<?php include("../../templates/header_dsi.php"); ?>

<h1 class="main_enviados_title white_mode">docs recibidos area dsi</h1>
    <section class="container_mains">
    
        <?php include("../../mains/main_recibidos.php"); ?>

    </section>

    <?php 
        include("../../mains/modal_despachar.php"); 
        include("../../mains/modal_rechazar.php"); 
    ?>

<?php include("../../templates/footer.php"); ?>