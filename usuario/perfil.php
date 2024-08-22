<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./styleUser.css">

</head>
<body>

    <header>
        <?php include 'headerUser.php'; ?>
    </header>

    <div class="d-flex">
        <div class="sidebar col-md-3">
            <div class="text-center mb-4">
                <img src="fotoperfil.webp" class="rounded-circle mb-2" alt="User" id="userpic">
                <h4>Nombre de Usuario aquí</h4>
                <p>Tipo de Usuario aquí</p>
            </div>
            <div class="mb-3">
                <strong>Numero de Cedula:</strong>
                <p>Agregar...</p>
            </div>
            <div class="mb-3">
                <strong>E-mail de contacto:</strong>
                <p>Agregar...</p>
            </div>
            <div class="mb-3">
                <strong>Telefono:</strong>
                <p>Agregar...</p>
            </div>
            <div class="mb-3">
                <strong>Alumnos bajo tu supervision:</strong>
                <p>Agregar...</p>
            </div>
            <!-- <button class="btn btn-outline-primary btn-block">Editar Perfil</button> -->
        </div>

        <div class="main-content col-md-9">
            <nav class="nav nav-tabs">
                <a class="nav-item nav-link active" data-toggle="tab" href="#Vista_General">Vista General</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#Documentos">Documentos</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#Familia">Familia</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#Editar_Perfil">Editar Perfil</a>
            </nav>
            <div class="tab-content mt-4">
                <div class="tab-pane fade show active" id="Vista_General">
                    <!--<div class="card">
                        <div class="card-body">
                            <h5>Notificaciones sin leer</h5>
                            <p>Número de notificaciones sin leer</p>
                            <button class="btn btn-success">Ver últimas notificaciones</button>
                        </div>
                    </div>-->
                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID de Matrícula</th>
                                            <th>Estado de Matrícula</th>
                                            <th>Enviada</th>
                                            <th>Última Actualización</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#123</td>
                                            <td>Pendiente</td>
                                            <td>Febrero 24, 2024</td>
                                            <td>Febrero 25, 2024</td>
                                            <td>
                                                <a href="solicitudVistaUsuario.php" class="btn btn-view">Ver detalles de solicitud</a>
                                                <button type="button" class="btn btn-danger">Cancelar Solicitud</button>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="Documentos">Los documentos subidos se verían aquí...</div>

                <div class="tab-pane fade" id="Familia">Personas registradas bajo su nombre...</div>

                <div class="tab-pane fade" id="Editar_Perfil">
                    <h2>Detalles del Perfil</h2>
                    <p>Editar Perfil</p>
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName">Nombre</label>
                                    <input type="text" class="form-control" id="firstName"
                                        placeholder="Ingresa tu nombre">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastName">Apellidos</label>
                                    <input type="text" class="form-control" id="lastName"
                                        placeholder="Ingresa tus apellidos">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input type="email" class="form-control" id="email"
                                placeholder="Ingresa tu correo electrónico">
                        </div>
                        <div class="form-group">
                            <label for="title">Teléfono</label>
                            <input type="text" class="form-control" id="title"
                                placeholder="Ingresa tu número de teléfono personal">
                        </div>
                        <div style="text-align: center; margin-top: 20px;">
                            <button type="submit" class="btn btn-update">Actualizar</button>
                        </div>

                    </form>
                    <a href="#" class="btn btn-danger mt-3">Solicitud de cierre de cuenta</a>
                </div>
            </div>
        </div>
    </div>
    </div>

    <footer>
        <?php include 'footerUser.php'; ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>