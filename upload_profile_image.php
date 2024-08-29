<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['id'])) {
    echo json_encode(['success' => false, 'message' => 'No se ha iniciado sesión']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profileImage'])) {
    $userId = $_SESSION['id'];
    $targetDir = "uploads/";
    $fileName = basename($_FILES["profileImage"]["name"]);
    $targetFilePath = $targetDir . $userId . "_" . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Permitir ciertos formatos de archivo
    $allowTypes = array('jpg','png','jpeg','gif');
    if (in_array($fileType, $allowTypes)) {
        // Subir archivo al servidor
        if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $targetFilePath)) {
            // Insertar información de imagen en la base de datos
            $sql = "UPDATE Usuarios SET imagenPerfil = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $targetFilePath, $userId);
            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'Imagen subida con éxito', 'imagePath' => $targetFilePath]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error al actualizar la base de datos']);
            }
            $stmt->close();
        } else {
            echo json_encode(['success' => false, 'message' => 'Lo siento, hubo un error al subir tu archivo.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No se recibió ningún archivo']);
}

$conn->close();
?>