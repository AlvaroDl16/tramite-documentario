<?php
$usuario = $_SESSION['usuario'];
$consulta_perfil = $conexion->prepare("SELECT * FROM usuarios
WHERE username='$usuario'");
$consulta_perfil->execute();
$datos_usuario = $consulta_perfil->fetch(PDO::FETCH_LAZY);
?>


<section class="main_perfil">
    
    <article class="perfil_container">
        
    <h1 class="perfil_title white_mode">DATOS GENERALES</h1>
        <div class="basic_data">
            <figure class="user_figure">
                <img 
                src="<?php echo $ulr_base;?>images/<?php echo $_SESSION['foto_us']?>" 
                alt="perfil de usuario"
                class="img_user">
            </figure>

            <div class="user_names">
                <label>Nombres
                    <input type="text" value="<?php echo $datos_usuario['nombres']; ?>">
                </label>
                <label>Apellidos
                    <input type="text" value="<?php echo $datos_usuario['apellidos']; ?>" >
                </label>
            </div>
        </div>

        <div class="others_data">
            <label>Usuario
                <input type="text" value="<?php echo $datos_usuario['username']; ?>">
            </label>
            <label>Contraseña
                <input type="text" value="<?php echo $datos_usuario['password']; ?>">
            </label>
            <label>Direccion
                <input type="text" value="<?php echo $datos_usuario['direccion']; ?>">
            </label>
            <label>Telefono
                <input type="text" value="<?php echo $datos_usuario['telefono']; ?>">
            </label>
            <label>DNI
                <input type="text" value="<?php echo $datos_usuario['dni']; ?>">
            </label>
        </div>
        
        <div class="perfil_btns">
            <a href="#" id="activar_edicion">Editar</a>
        </div>
    </article>

    <article class="perfil_container editar_user">
    <h2 class="perfil_title white_mode">MODIFICA TU PERFIL A TU GUSTO</h2>
        <div class="basic_data">

            <div class="user_names">
                <label>Nombres
                    <input type="text" value="<?php echo $datos_usuario['nombres']; ?>">
                </label>
                <label>Apellidos
                    <input type="text" value="<?php echo $datos_usuario['apellidos']; ?>" >
                </label>
            </div>
        </div>

        <div class="others_data">
            <label>Usuario
                <input type="text" value="<?php echo $datos_usuario['username']; ?>">
            </label>
            <label>Contraseña
                <input type="text" value="<?php echo $datos_usuario['password']; ?>">
            </label>
            <label>Direccion
                <input type="text" value="<?php echo $datos_usuario['direccion']; ?>">
            </label>
            <label>Telefono
                <input type="text" value="<?php echo $datos_usuario['telefono']; ?>">
            </label>
            <label>DNI
                <input type="text" value="<?php echo $datos_usuario['dni']; ?>">
            </label>
        </div>
        
        <div class="perfil_btns">
            <a href="#">Cancelar</a>
            <a href="#">Actualizar</a>
        </div>
    </article>

</section>