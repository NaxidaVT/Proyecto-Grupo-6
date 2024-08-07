<?php

$host = 'localhost';
$db = 'sistema_matricula';
$user = 'root';  // usuario MySQL
$pass = '';  // contraseña MySQL


$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

