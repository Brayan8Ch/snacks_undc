<?php 
include ("conexion.php");
$username = $_POST['username_usuario'];
$password = $_POST['password_usuario'];

$sentencia = $conexion->prepare('SELECT * FROM WHERE username = ? and password = ?');
$sentencia -> bind-param ('ss', $username, $password);
$sentencia -> execute();

$resultado = $sentencia -> get_result();
if ($fila = $resultado -> fetch_assoc()){
    echo json_decode($fila,JSON_UNESCAPED_UNICODE);
}
$sentencia -> close ();
$conexion -> close ();
?>