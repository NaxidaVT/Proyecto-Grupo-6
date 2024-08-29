<header>
    <nav>
        <a href="index.php">Home</a>
        <?php if (isLoggedIn()): ?>
            <a href="<?php echo isAdmin() ? 'dashboard_admin.php' : 'dashboard_student.php'; ?>">Dashboard</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="index.php">Login</a>
        <?php endif; ?>
    </nav>
</header>
