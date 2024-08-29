<?php
include('db.php');
include('functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = validate_input($_POST['username']);
    $password = hash_password($_POST['password']);

    $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, 'student')");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        $success = "Registration successful! You can now log in.";
    } else {
        $error = "Username already taken.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Estudiante</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include('header.php'); ?>
    <h2>Registro de Estudiante</h2>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
    <?php if(isset($success)) echo "<p class='success'>$success</p>"; ?>
    <form action="register.php" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>
    <?php include('footer.php'); ?>
</body>
</html>
