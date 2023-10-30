<?php

$servidor = "localhost";
$dataBase = "gestion_documentos";
$usuario = "root";
$contraseña = "";

try {
    $conexion = new PDO("mysql:host=$servidor; dbname=$dataBase",$usuario,$contraseña);
} catch (Exception $ex) {
    echo $ex->getMessage();
}

?>