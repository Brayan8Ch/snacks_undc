<?php 
    $hostname = "localhost";
    $database = "snacksdb";
    $username = "root";
    $password = "";

    $mysql = new mysqli($hostname, $username, $password, $database);

    if ($mysql->connect_error) {
        die("Failed to connect: " . $mysql->connect_error);
    } else {
        echo "Se conectó al servidor.";
    }
?>
