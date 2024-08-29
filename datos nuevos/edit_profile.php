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

$profileId = $_POST['profile_id'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$cedula = $_POST['cedula'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$estudiantes = json_decode($_POST['estudiantes'], true); // Decodificar el JSON

// Actualizar el perfil del padre
$sql = "UPDATE parents SET cedula='$cedula', first_name='$nombre', last_name='$apellidos', email='$correo', phone_number='$telefono' WHERE parent_id=$profileId";
$conn->query($sql);

// Actualizar los estudiantes
foreach ($estudiantes as $estudiante) {
    $cedulaEstudiante = $estudiante['cedula'];
    $nombreEstudiante = $estudiante['nombre'];
    $apellidosEstudiante = $estudiante['apellidos'];
    $studentId = $estudiante['student_id']; // Asegúrate de enviar el ID del estudiante

    $sqlEstudiante = "UPDATE students SET cedula='$cedulaEstudiante', first_name='$nombreEstudiante', last_name='$apellidosEstudiante' WHERE student_id=$studentId";
    $conn->query($sqlEstudiante);
}

$conn->close();
echo json_encode(['status' => 'success']);
?>
