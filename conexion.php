<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "test";

$conexion = new mysqli($server, $user, $pass, $db);

if ($conexion->connect_errno) { 
    die("Conexión fallida: " . $conexion->connect_error);
} else {
    echo "Conectado"; // Esta línea tenía un error de sintaxis, faltaba un punto y coma al final
}

?>

