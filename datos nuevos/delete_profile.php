<?php
include 'db_connect.php';

header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM sist_mat.parents WHERE parent_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = 'Perfil eliminado exitosamente';
    } else {
        $response['message'] = 'Error al eliminar el perfil: ' . $conn->error;
    }
} else {
    $response['message'] = 'ID no proporcionado';
}

echo json_encode($response);
$conn->close();
?>