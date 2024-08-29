<?php
session_start();
include 'db_connect.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Usuario no autenticado']);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conn, $_POST['nombre']) : '';
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($conn, $_POST['apellidos']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $telefono = isset($_POST['telefono']) ? mysqli_real_escape_string($conn, $_POST['telefono']) : '';
    $userId = $_SESSION['user_id']; // Usar el ID de usuario de la sesión

    if (empty($nombre) || empty($apellidos) || empty($email) || empty($telefono)) {
        echo json_encode(['success' => false, 'message' => 'Todos los campos son obligatorios.']);
        exit;
    }

    $sql = "UPDATE Usuarios SET nombre = ?, apellidos = ?, email = ?, telefono = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        echo json_encode(['success' => false, 'message' => 'Error en la preparación de la consulta.']);
        exit;
    }

    $stmt->bind_param("ssssi", $nombre, $apellidos, $email, $telefono, $userId);

    $response = array();
    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = "Perfil actualizado exitosamente.";
    } else {
        $response['success'] = false;
        $response['message'] = "Error al actualizar el perfil.";
        error_log("Error al actualizar el perfil: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();

    echo json_encode($response);
} else {
    echo json_encode(['success' => false, 'message' => 'Método de solicitud no permitido.']);
}
?>