<?php
include 'db_connect.php'; // Asegúrate de que este archivo contiene la conexión a tu base de datos

// Obtener todos los usuarios
$sql = "SELECT id, email, password FROM Usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $email = $row['email'];
        $password = $row['password'];

        // Verifica si la contraseña ya está hasheada
        if (!password_get_info($password)['algo']) {
            // La contraseña no está hasheada, así que la hasheamos
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Actualiza la contraseña en la base de datos
            $update_sql = "UPDATE Usuarios SET password = ? WHERE id = ?";
            $stmt = $conn->prepare($update_sql);
            $stmt->bind_param("si", $hashed_password, $id);
            $stmt->execute();

            echo "Contraseña actualizada para el usuario con email: $email\n";
        } else {
            echo "La contraseña ya está hasheada para el usuario con email: $email\n";
        }
    }
} else {
    echo "No se encontraron usuarios en la base de datos.";
}

$conn->close();
?>