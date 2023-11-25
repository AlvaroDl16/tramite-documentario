<?php
include("../ruta.php");
session_start();
session_destroy();
header("Location:".$ruta_base."login.php");
