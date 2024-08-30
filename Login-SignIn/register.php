<?php
// Configuración de la base de datos
$host = 'localhost'; // Cambia esto según tu configuración
$dbname = 'sist_mat';
$username = 'root'; // Cambia esto según tu configuración
$password = ''; // Cambia esto según tu configuración

// Crear una conexión a la base de datos
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$cedula = $_POST['cedula'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encriptar contraseña

// Preparar la consulta SQL
$sql = "INSERT INTO parents (cedula, first_name, last_name, email, phone_number, password, role) VALUES (?, ?, ?, ?, ?, ?, 'user')";

// Preparar la sentencia
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

// Asignar valores a los parámetros
$stmt->bind_param('ssssss', $cedula, $first_name, $last_name, $email, $phone, $password);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Registro exitoso. <a href='logIn.php'>Iniciar sesión</a>";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
