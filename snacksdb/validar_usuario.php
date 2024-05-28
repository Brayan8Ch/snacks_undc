<?php
include 'conexion.php';

// Recibir los datos enviados desde Android
$username_usuario = $_POST['username'];
$contraseña_usuario = $_POST['password'];

// Preparar la sentencia SQL con los valores recibidos
$sentencia = $conexion->prepare("SELECT * FROM usuario WHERE username_usuario = ? AND contraseña_usuario = ?");
$sentencia->bind_param('ss', $username_usuario, $contraseña_usuario);
$sentencia->execute();

// Obtener el resultado
$resultado = $sentencia->get_result();
if ($fila = $resultado->fetch_assoc()) {
    // Si el usuario es válido, enviar la información en formato JSON
    echo json_encode($fila, JSON_UNESCAPED_UNICODE);
} else {
    // Si no se encuentra coincidencia, enviar una respuesta vacía
    echo "";
}

// Cerrar la conexión
$sentencia->close();
$conexion->close();
?>