<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Matrícula en Línea</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./styleAdmin.css">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./styleAdmin.css">
</head>

<body>
    <header>
        <?php include 'headerAdmin.php'; ?>
    </header>

    <div class="container mt-5">
        <!-- Tabla de Usuarios -->
        <div class="card">
            <div class="card-header">
                Lista de Usuarios
            </div>

            <div class="card-body">
                <div class="search-bar-container">
                    <input class="form-control search-bar" id="busquedadCedula" type="text" placeholder="Buscar por cédula">
                    <button class="btn btn-search">Buscar</button>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <span>Usuarios Registrados</span>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="usersTable">
                        <thead>
                            <tr>
                                <th>Cédula</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Correo Electrónico</th>
                                <th>Teléfono</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>12345678</td>
                                <td>Juan</td>
                                <td>Solis</td>
                                <td>juan@gmail.com</td>
                                <td>123-1234</td>
                                <td>
                                    <button class="btn btn-warning btn-edit" data-toggle="modal"
                                        data-target="#editUserModal" data-id="1">
                                        <i class="fas fa-pencil-alt" style="color: white;"></i>
                                    </button>
                                    <button class="btn btn-danger btn-delete" data-id="1">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Editar Usuario -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="editUserForm">
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
                        <label for="password">Contraseña (dejar en blanco si no se cambia)</label>
                        <input type="password" class="form-control" id="password" placeholder="Introduce una nueva contraseña si deseas cambiarla">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                 <button type="button" class="btn btn-close" data-dismiss="modal">Cerrar</button>
                 <button type="button" class="btn btn-add" id="saveUser">Guardar</button>
            </div>
        </div>
    </div>
</div>


    <footer>
        <?php include 'footerAdmin.php'; ?>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
