<?php
session_start();
include 'db_connect.php';

// Habilitar la visualización de errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Registrar intento de inicio de sesión
    file_put_contents('login_attempts.log', date('Y-m-d H:i:s') . " - Intento de inicio de sesión para: $email\n", FILE_APPEND);

    $sql = "SELECT id, email, password FROM Usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id'];
            file_put_contents('login_attempts.log', date('Y-m-d H:i:s') . " - Inicio de sesión exitoso para: $email\n", FILE_APPEND);
            header("Location: perfil-adm.php");
            exit();
        } else {
            $error = "Contraseña incorrecta";
        }
    } else {
        $error = "Usuario no encontrado";
    }

    if (isset($error)) {
        $_SESSION['error'] = $error;
        file_put_contents('login_attempts.log', date('Y-m-d H:i:s') . " - Error de inicio de sesión para $email: $error\n", FILE_APPEND);
        header("Location: logIn-adm.php");
        exit();
    }
} else {
    header("Location: logIn-adm.php");
    exit();
}
?>