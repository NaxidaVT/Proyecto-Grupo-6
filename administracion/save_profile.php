<?php
include 'db_connect.php';

header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $parent_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : null;
    $first_name = $_POST['nombre'];
    $last_name = $_POST['apellidos'];
    $cedula = $_POST['cedula'];
    $email = $_POST['correo'];
    $phone_number = $_POST['telefono'];

    if ($parent_id) {
        // Actualizar perfil existente
        $sql = "UPDATE sist_mat.parents SET first_name = ?, last_name = ?, cedula = ?, email = ?, phone_number = ? WHERE parent_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $first_name, $last_name, $cedula, $email, $phone_number, $parent_id);
    } else {
        // Insertar nuevo perfil
        $sql = "INSERT INTO sist_mat.parents (first_name, last_name, cedula, email, phone_number) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $first_name, $last_name, $cedula, $email, $phone_number);
    }

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = 'Perfil guardado exitosamente';
    } else {
        $response['message'] = 'Error al guardar el perfil: ' . $conn->error;
    }
} else {
    $response['message'] = 'Método de solicitud no válido';
}

echo json_encode($response);
$conn->close();
?>