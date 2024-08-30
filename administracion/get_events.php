<?php
session_start();
include 'db_connect.php';

$usuarioId = $_SESSION['id']; // Asumiendo que tienes el ID del usuario en la sesión

$sql = "SELECT id, titulo, descripcion, fechaEvento FROM eventos WHERE usuarioId = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuarioId);
$stmt->execute();
$result = $stmt->get_result();

$events = [];
while ($row = $result->fetch_assoc()) {
    $events[] = [
        'id' => $row['id'],
        'title' => $row['titulo'],
        'start' => $row['fechaEvento'],
        'description' => $row['descripcion']
    ];
}

echo json_encode($events);

$stmt->close();
$conn->close();