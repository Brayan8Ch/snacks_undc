<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('conexion.php');

    // Verificar si las claves existen en $_POST
    if (isset($_POST['username_usuario']) && isset($_POST['password_usuario'])) {
        $username = $_POST['username_usuario'];
        $password = $_POST['password_usuario'];

        // Escapar los valores para prevenir inyecciones SQL
        $username = $mysql->real_escape_string($username);
        $password = $mysql->real_escape_string($password);

        // Consulta para verificar las credenciales
        $query = "SELECT * FROM usuario WHERE username_usuario = '$username' AND password_usuario = '$password'";
        $result = $mysql->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                echo json_encode(array("success" => true, "message" => "Login successful"));
            } else {
                echo json_encode(array("success" => false, "message" => "Invalid username or password"));
            }
            $result->close();
        } else {
            echo json_encode(array("success" => false, "message" => "Error executing query: " . $mysql->error));
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Missing username or password"));
    }

    $mysql->close();
} else {
    echo json_encode(array("success" => false, "message" => "Invalid request method"));
}
?>
