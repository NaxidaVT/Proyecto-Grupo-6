<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio de Sesión</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
</head>
<header>
        <?php include '../header-template.php'; ?>
    </header>
<body>
    <!----LogIn inicia----->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row login-container">
            <!----Caja izquierda Inicia------>
            <div class="col-md-6 d-flex justify-content-center align-items-center flex-column left-box">
                <div class="featured-image mb-3">
                    <img src="https://images.unsplash.com/photo-1535905496755-26ae35d0ae54?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class="img-fluid">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">
                    Inicia sesion para continuar</p>
                <small class="text-white text-wrap text-center"
                    style="width: 17rem;font-family: 'Courier New', Courier, monospace;">En el nuevo sistema virtual tu experiencia mejora!</small>
            </div>
            <!----Caja izquierda termina----->

            <!----Caja derecha Inicia------>
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Iniciar Sesión</h3>
                        <form>
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" placeholder="Introduce tu correo">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password"
                                    placeholder="Introduce tu contraseña">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                        </form>
                        <div class="mt-3 text-center">
                            <a href="RecuperarContrasena.html">¿Olvidaste tu contraseña?</a>
                        </div>
                        <div class="mt-3 text-center">
                            <a href="CrearUsuario.html">Crear una cuenta nueva</a>
                        </div>
                    </div>
                </div>
            </div>
            <!----Caja derecha Termina----->
        </div>
    </div>
    <!----LogIn termina----->

    <footer>
        <?php include '../footer-template.php'; ?>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
