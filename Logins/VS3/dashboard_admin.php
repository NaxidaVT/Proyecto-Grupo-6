<?php
include('session.php');

if (!isAdmin()) {
    redirect('dashboard_student.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include('header.php'); ?>
    <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
    <p>You have administrative access.</p>
    <a href="logout.php">Logout</a>
    <?php include('footer.php'); ?>
</body>
</html>
