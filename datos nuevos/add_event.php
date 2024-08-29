<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuarioId = $_SESSION['id']; // Asumiendo que tienes el ID del usuario en la sesión
    $titulo = $_POST['title'];
    $descripcion = $_POST['description'];
    $fechaEvento = $_POST['date'];

    $sql = "INSERT INTO eventos (usuarioId, titulo, descripcion, fechaEvento) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $usuarioId, $titulo, $descripcion, $fechaEvento);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Evento agregado con éxito']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al agregar el evento: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}