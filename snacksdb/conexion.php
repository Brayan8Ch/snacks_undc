<?php
$hostname = "localhost";
$database = "snacksdb";
$username = "root";
$password = "";

// Crear la conexión
$conexion = new mysqli($hostname, $username, $password, $database);

// Verificar la conexión
if ($conexion->connect_errno) {
    echo "Error de conexión";
    exit();
}
?>