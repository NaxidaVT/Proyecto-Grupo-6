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


$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$cedula = $_POST['cedula'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$estudiantes = json_decode($_POST['estudiantes'], true); // Decodificar el JSON

// Guardar el perfil del padre
$sql = "INSERT INTO parents (cedula, first_name, last_name, email, phone_number, password, role) VALUES ('$cedula', '$nombre', '$apellidos', '$correo', '$telefono', 'hashed_password', 'user')";
$conn->query($sql);
$parent_id = $conn->insert_id; // Obtener el ID del padre guardado

// Guardar los estudiantes
foreach ($estudiantes as $estudiante) {
    $cedulaEstudiante = $estudiante['cedula'];
    $nombreEstudiante = $estudiante['nombre'];
    $apellidosEstudiante = $estudiante['apellidos'];

    $sqlEstudiante = "INSERT INTO students (cedula, first_name, last_name, parent_id) VALUES ('$cedulaEstudiante', '$nombreEstudiante', '$apellidosEstudiante', '$parent_id')";
    $conn->query($sqlEstudiante);
}

$conn->close();
echo json_encode(['status' => 'success']);
?>

