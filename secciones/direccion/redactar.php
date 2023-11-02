<?php include("../../templates/header_direccion.php"); ?>

    <section >
        <h1 class="white_mode">enviar nuevo documento area direccion</h1>
        <h2>Formulario de envio</h2>
        <form action="" method="post">
            <label for="codigo">Codigo de documento: <input type="text" name="codigo" id="codigo"></label>
            <label for="remitente">Remitente: <input type="text" name="remitente" id="remitente"></label>
            <label for="asunto">Asunto: <input type="text" name="asunto" id="asunto"></label> <br>
            <label for="archivo">Archivo: <input type="file"></label> 
            <label for="fecha">Fecha de envio: <input type="date" name="fecha" id="fecha"></label><br>

            <label for="tipo">Tipo de documento <select name="tipo" id="tipo">
                <option value="">seleccione el tipo de documento</option>
                <option value="1">Solicitud</option>
                <option value="2">Carta</option>
                <option value="3">Informe</option>
            </select></label>

            <label for="area">Area de destino <select name="area" id="area">
                <option value="">seleccione el destino</option>
                <option value="1">Direccion</option>
                <option value="2">Unidad didactica</option>
                <option value="3">Secretaria academica</option>
            </select></label>
            <input type="submit" value="Enviar">
        </form>
    </section>

<?php include("../../templates/footer.php"); ?>