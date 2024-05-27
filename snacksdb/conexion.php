<?php 
    $mysql = new mysqli(
        "localhost", //servidor 
        "root", //usuario
        "", //contraseña
        "snacks" //database name
    );
    if ($mysql->connect_error) {
        die("Failed to connect". $mysql->connect_error);
    }
    else{
        echo "Se conectó al servidor.";
    }
?>