
<?php
    include("../../bd.php");
    $area = $_SESSION['area_cargo'];
    $consulta = $conexion->prepare("SELECT *, count(*) AS pendientes FROM documentos 
    WHERE area_destino='$area' AND estado='pendiente'");
    $consulta->execute();
    $num_pendientes = $consulta->fetch(PDO::FETCH_LAZY);
?>