<?php
// anuncio_api.php
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 0);

include 'db_connect.php';

function getAnnouncements($conn) {
    $sql = "SELECT * FROM announcements ORDER BY date DESC";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    if ($action === 'add' || $action === 'edit') {
        $title = $_POST['titulo'] ?? '';
        $date = $_POST['fecha'] ?? '';
        $description = $_POST['descripcion'] ?? '';
        $id = $_POST['id'] ?? null;

        if ($action === 'add') {
            $stmt = $conn->prepare("INSERT INTO announcements (title, date, description) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $title, $date, $description);
        } else {
            $stmt = $conn->prepare("UPDATE announcements SET title = ?, date = ?, description = ? WHERE announcement_id = ?");
            $stmt->bind_param("sssi", $title, $date, $description, $id);
        }

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => $stmt->error]);
        }
    } elseif ($action === 'delete') {
        $id = $_POST['id'] ?? 0;
        $stmt = $conn->prepare("DELETE FROM announcements WHERE announcement_id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => $stmt->error]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Acción no válida']);
    }
} else {
    $announcements = getAnnouncements($conn);
    echo json_encode(['status' => 'success', 'data' => $announcements]);
}