<?php
session_start();
include 'db_connect.php';

$userId = $_SESSION['id'];
$currentDate = date('Y-m-d');

$sql = "SELECT * FROM eventos WHERE usuarioId = ? AND fechaEvento >= ? ORDER BY fechaEvento ASC LIMIT 5";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $userId, $currentDate);
$stmt->execute();
$result = $stmt->get_result();

$events = [];
while ($row = $result->fetch_assoc()) {
    $events[] = [
        'title' => $row['titulo'],
        'start' => $row['fechaEvento']
    ];
}

echo json_encode($events);

$stmt->close();
$conn->close();
?>
