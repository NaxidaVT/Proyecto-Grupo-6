<?php
include_once 'components/index_navbar.php';
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de matrícula</title>
</head>

<body>

    <div class="container mt-5">

        <h1 class="text-center">Bienvenido a matrículas escolares</h1>
        <div class="row mt-5">
            <div class="col-md-6">
                <h2>Iniciar sesión</h2>
                <form action="index.php?action=login" method="post">
                    <div class="mb-3">
                        <input type="email" name="email" id="email" class="form-control" required placeholder="Escriba su correo">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" id="password" class="form-control" required placeholder="Escriba su contraseña">
                    </div>
                    <button type="submit" class="btn btn-secondary btn-login">Iniciar sesión</button>
                </form>
            </div>
            <div class="col-md-6">
                <h2>Registrarse</h2>
                <form action="index.php?action=register" method="post">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Escriba su nombre completo">
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" id="email" class="form-control" required placeholder="Escriba su correo">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" id="password" class="form-control" required placeholder="Escriba su contraseña">
                    </div>
                    <button type="submit" class="btn btn-secondary btn-registro">Registrarse</button>
                </form>
            </div>
        </div>
    </div>

    <?php include_once 'components/footer.php'; ?>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>