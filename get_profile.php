<?php
$servername = "localhost"; // Cambia esto si es necesario
$username = "root"; // Cambia esto si es necesario
$password = ""; // Cambia esto si es necesario
$dbname = "sist_mat"; // Cambia esto si es necesario

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$profileId = $_GET['id'];

// Cargar datos del perfil
$sql = "SELECT * FROM parents WHERE parent_id = $profileId";
$result = $conn->query($sql);
$parent = $result->fetch_assoc();

// Cargar estudiantes asociados
$sqlEstudiantes = "SELECT * FROM students WHERE parent_id = $profileId";
$resultEstudiantes = $conn->query($sqlEstudiantes);
$estudiantes = [];

while ($row = $resultEstudiantes->fetch_assoc()) {
    $estudiantes[] = $row;
}

$response = [
    'nombre' => $parent['first_name'],
    'apellidos' => $parent['last_name'],
    'cedula' => $parent['cedula'],
    'correo' => $parent['email'],
    'telefono' => $parent['phone_number'],
    'estudiantes' => $estudiantes
];

$conn->close();
echo json_encode($response);
?>
