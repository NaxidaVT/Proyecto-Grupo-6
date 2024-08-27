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
        <?php include 'headerLog.php'; ?>
    </header>
<body>
    <!----LogIn inicia----->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row login-container">
            <!----Caja izquierda Inicia------>
            <div class="col-md-6 d-flex justify-content-center align-items-center flex-column left-box">
                <div class="featured-image mb-3">
                    <img src="https://images.pexels.com/photos/3646172/pexels-photo-3646172.jpeg?auto=compress&cs=tinysrgb&w=600"
                        class="img-fluid">
                </div>
                <p class="text-white fs-5" style="font-family: 'Courier New', Courier, monospace; font-weight: 500;">
    Inicia sesión para continuar
</p>
                <small class="text-white text-wrap text-center"
                    style="width: 17rem;font-family: 'Courier New', Courier, monospace;">En el nuevo sistema virtual tu experiencia mejora!</small>
            </div>
            <!----Caja izquierda termina----->

            <!----Caja derecha Inicia------>
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Crear Usuario</h3>
                        <form>
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" placeholder="Introduce tu nombre" required>
                    </div>
                    <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" placeholder="Ingresa tus apellidos">
                        </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" placeholder="Introduce tu correo" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input type="tel" class="form-control" id="phone" placeholder="Introduce tu teléfono" required>
                    </div>
                    <div class="form-group">
                        <label for="cedula">Cédula</label>
                        <input type="number" class="form-control" id="cedula" placeholder="Introduce tu cédula" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" placeholder="Introduce tu contraseña" required>
                    </div>
                    <button style="display: block; margin: 0 auto; width: calc(100% - 30px);" type="submit" class="btn btn-register">Registrar</button>
                </form>
                <div class="mt-3 text-center">
                    <a style="color: #000;" href="logIn.php">¿Ya tienes una cuenta? Inicia sesión</a>
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
