<?php
session_start();
if (isset($_SESSION['id'])) {
    header("Location: perfil-adm.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio de Sesión</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <header>
        <?php include 'headerLog.php'; ?>
    </header>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="row login-container">
        <div class="col-md-6 left-box">
            <img src="https://images.unsplash.com/photo-1535905496755-26ae35d0ae54?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Library Image" class="img-fluid">
            <div class="overlay-text">
                <p>Inicia sesión para continuar</p>
                <p>En el nuevo sistema virtual tu experiencia mejora!</p>
            </div>
        </div>

        <div class="col-md-6 right-box">
            <div class="card-body">
                <h3 class="card-title">Iniciar Sesión</h3>
                <div id="loginError" class="alert alert-danger" style="display: none;">Contraseña incorrecta</div>
                <form id="loginForm" method="POST" action="process_login.php">
    <div class="form-group">
        <label for="email">Correo Electrónico</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Ingresar</button>
</form>
                <div class="mt-3 text-center">
                    <a href="recuperarContrasena.php">¿Olvidaste tu contraseña?</a>
                </div>
            </div>
        </div>
    </div>
</div>

    <footer>
        <?php include 'footer-template.php'; ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="admscript.js"></script>
</body>

</html>