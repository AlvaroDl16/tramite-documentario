<?php include("../../templates/header.php"); ?>

    <section>
        <h1>registrar usuario</h1>
        <form action="proceso_envio.php" method="post">
            <input type="text" name="txtnombre" placeholder="ingrese nombre">
            <input type="text" name="txtapellido" placeholder="ingrese contraseña">
            
            <input type="text" name="rol" placeholder="ingrese rol">
            
            <input type="text" name="area" placeholder="ingrese area">
            <input type="submit" value="enviar">
        </form>
    </section>

<?php include("../../templates/footer.php"); ?>